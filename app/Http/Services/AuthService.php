<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;
use App\Http\Repositories\ReferralRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    protected $userRepository;
    protected $referralRepository;
   
    
    public function __construct(UserRepository $userRepository,ReferralRepository $referralRepository)
    {
        $this->userRepository = $userRepository;
        $this->referralRepository = $referralRepository;
        // $Sender=new \App\Mail\SendResetCode(null);
    }
    public function usersWithoutPassword()
    {
        // Récupérer les utilisateurs dont le mot de passe est nul ou vide
        $usersWithoutPassword = User::whereNull('password')
                                    ->orWhere('password', '')
                                    ->get();

      return $usersWithoutPassword;
    }
    public function usersWithPassword()
    {
        // Récupérer les utilisateurs qui ont un mot de passe
        $usersWithPassword = User::whereNotNull('password')
                                 ->where('password', '!=', '')
                                 ->get();
    
        return $usersWithPassword;
    }
    
    public function userDepth(): int
    {
    
        $user=Auth::user();
       // dd($user->referralsWithinFiveLevels()->get());
        return $this->calculateDepth($user, 0);
    }
    
    private function calculateDepth( $user, int $currentLevel): int
    {
        if ($currentLevel >= 5) {
            return $currentLevel;
        }
    
        $referrals = $user->referrals;
        if ($referrals->isEmpty()) {
            return $currentLevel;
        }
    
        $maxDepth = $currentLevel;
        foreach ($referrals as $referral) {
            $depth = $this->calculateDepth($referral, $currentLevel + 1);
            if ($depth > $maxDepth) {
                $maxDepth = $depth;
            }
        }
    
        return $maxDepth;
    }
    
    public function getUsersWithinFiveLevels(): Collection
    {
        $user=Auth::user();
        $users = new Collection();
         $this->addUsersWithinLevels($user, 0, $users);
        return $users;
    }
    public function completeUsers():Collection{
            $count=0;
            $user=Auth::user();
            $tableau = collect();
            $tableau->push($user);
            $users=$this->getUsersWithinFiveLevels();
            foreach($users as $use){
                if($use){
                    $tableau->push($use);
                }
            }
           
            return $tableau;
        }
       
        public function generateColor($objects) {
            $colors = [];
            $numColors=$objects->count();
            if($numColors>360)
            {
                $numColors=360;
            }
            $hueIncrement = 360 / $numColors; // Incremental step for the hue value
        
            for ($i = 0; $i < $numColors; $i++) {
                $hue = ($i * $hueIncrement) % 360;
                $colorHex = $this->hsvToHex($hue, 1, 1); // Full saturation and value
        
                // Assure l'unicité
                $isUnique = true;
                foreach ($colors as $color) {
                    if ($color['color'] === $colorHex) {
                        $isUnique = false;
                        break;
                    }
                }
                
        
                if ($isUnique) {
                    $colors[] = [
                        'key' => $objects[$i]->id,
                        'color' => $colorHex
                    ];
                } else {
                    // Si la couleur n'est pas unique, on ajuste légèrement la teinte
                    $i=$i-2;
                    $hueIncrement /= 4;
                }
            }
        
            return $colors;
        }
        
        public function hsvToHex($h, $s, $v) {
            $h = $h / 60;
            $c = $v * $s;
            $x = $c * (1 - abs(fmod($h, 2) - 1));
            $m = $v - $c;
            
            if ($h >= 0 && $h < 1) {
                $r = $c;
                $g = $x;
                $b = 0;
            } else if ($h >= 1 && $h < 2) {
                $r = $x;
                $g = $c;
                $b = 0;
            } else if ($h >= 2 && $h < 3) {
                $r = 0;
                $g = $c;
                $b = $x;
            } else if ($h >= 3 && $h < 4) {
                $r = 0;
                $g = $x;
                $b = $c;
            } else if ($h >= 4 && $h < 5) {
                $r = $x;
                $g = 0;
                $b = $c;
            } else {
                $r = $c;
                $g = 0;
                $b = $x;
            }
        
            $r = dechex(($r + $m) * 255);
            $g = dechex(($g + $m) * 255);
            $b = dechex(($b + $m) * 255);
        
            return '#' . str_pad($r, 2, '0', STR_PAD_LEFT) . str_pad($g, 2, '0', STR_PAD_LEFT) . str_pad($b, 2, '0', STR_PAD_LEFT);
        }
        
       
        
        
        // // Exemple d'utilisation
        // $colors = generateColor(10);
        // print_r($colors);
        

    private function addUsersWithinLevels(User $user, int $currentLevel, Collection $users)
    {
        if ($currentLevel >= 5) {
            return;
        }

        $referrals = $user->referrals;
        foreach ($referrals as $referral) {
            $users->push($referral);
            $this->addUsersWithinLevels($referral, $currentLevel + 1, $users);
        }
    }

    // public function getTotalReferrals(User $user): int
    // {
    //     return $this->calculateReferralCount($user->id);
    // }

    // public function calculateReferralCount($user_id): int
    // {
    //     $count = 0;

    //     $directReferrals = User::where('referrer_id', $user_id)->pluck('id')->toArray();
    //     $count += count($directReferrals);

    //     foreach ($directReferrals as $referralId) {
    //         $count += $this->calculateReferralCount($referralId);
    //     }

    //     return $count;
    // }
    // public function getUsersWithinFiveLevels() {
    //     $users = [];
    //     $depth = 0;
    //     $user = Auth::user();
    //     // dd($user);
    //     while ($user->invitant && $depth < 5) {
    //         $referrer = User::where('referral_code', $user->invitant)->first();
          
    //         if ($referrer) {
    //             $users[] = $referrer;
    //             $user = $referrer;
    //             $depth++;
    //         } else {
    //             break;
    //         }
    //     }
    //     // $user=Auth::user();
    //     // return $this->getTotalReferrals($user->id);

    //        return collect($users); 
    // }
     // Function to get total referrals count
    
 
     // Recursive function to calculate referral count
     
    
    public function post_update(array $data){
        $email=$data['email'];
        if ($this->verifyPasswordAndConfirmPassword($data['password'], $data['confirm'])) {
            $data['password'] = $this->hashAndVerifyPassword($data['password']);
            $user=$this->userRepository->getByEmail($email);
            if($user){
                $user->password=$data['password'];
                $user->save();
                return redirect()->route('dashboard')->with('success','Mot de passe modifié  avec success.');
            }
        }else{
            redirect()->back()->with('error','les mots de passe ne correspondent pas.');
        }
    }
    public function post_sign_up(array $data)
    {
        $data['referral_code'] = $this->AttributeCode();
        if ($this->isValidPassword($data['password'])) {
            if ($this->verifyPasswordAndConfirmPassword($data['password'], $data['confirm'])) {
                $data['password'] = $this->hashAndVerifyPassword($data['password']);
                $oldUser = $this->userRepository->getByEmail($data['email']);
                if (isset($oldUser)) {
                    return redirect()->back()->with('error', 'an account is already create with this email');

                } else {
                   $user= $this->userRepository->create($data);
                   $datar=array();
                   $referrer=$this->userRepository->getByReferralCode($user->invitant);
                   if(isset($referrer))
                   {
            
                    $datar['user_id']=$user->id;
                    $datar['referrer_id']=$referrer->id;
                   }else {
                    $datar['user_id']=$user->id;
                    $datar['referrer_id']=null;
                   }
                   $this->referralRepository->create($datar);
                    
                    return redirect()->route('login')->with('success', 'Your account is created with success');

                }

            } else {
                return redirect()->back()->with('error', 'password and confirmation password do not match');
            }
        } else {
            return redirect()->back()->with('error', 'min password 8');

        }
    }
    public function email(array $data) {
        $email = $data['email'];
    
        // Check if the email exists in the repository
        if (!$this->userRepository->verifyEmail($email)) {
            return redirect()->back()->with('warning', 'Aucun compte associé à cet email');
        }
    
        // Generate the reset code
        $code = $this->Attribute();
        $data['token'] = $code;
    
        // Store the reset token in the repository
        $this->userRepository->reset($data);
    
        // Send the reset code via email
        try {
            Mail::to($email)
            ->send(new \App\Mail\SendResetCode($code));
        } catch (\Exception $e) {
            // Handle mail sending failure
            return redirect()->back()->with('error', 'Erreur lors de l\'envoi de l\'email. Veuillez réessayer plus tard.');
        }
    
       
        return redirect()->route('code-reset')->with('email', $email);
    }
    
    public function codeVerification(array $data){
      $email=$data['email'];
      $token=$data['code'];
   if($this->userRepository->isToken($token)){
    return redirect()->route('password-reset')->with('email',$email);
   }
   return redirect()->route('reset-password')
   ->with('warning','Code expiré, regénérez un autre.')
    ->with('email',$email);
    }
    public function reset(array $data){
        $email=$data['email'];
        $user=$this->userRepository->getByEmail($email);
        if ($this->verifyPasswordAndConfirmPassword($data['password'], $data['confirm'])) {
            $data['password'] = $this->hashAndVerifyPassword($data['password']);
            $user->password=$data['password'];
            $user->save();
            return redirect()->route('login')->with('success','Réinitialisation éffectuée avec success');
        }
        else{
            return redirect()->back()
            ->with('error','les mots de passe ne correspondent pas..')
            ->with('email',$email);
        }
    }
public function usersCurrentMonthCount(){
return $this->userRepository->usersRegisteredCurrentMonth()->count();
}
    public function post_login(array $data)
    {
       
       $user = $this->userRepository->getByEmail($data['email']);
       if (isset($user)) {
          if ($this->verifyPassword($data['password'], $user->password)) {
             Auth::login($user);
             return redirect()->route('dashboard');
          } else {
             return redirect()->back()->with('error', 'Verify your password and try again');
          }
       } else {
          return redirect()->back()->with('error', 'Verify your identity and try again');
       }
       
    }
 

    function hashAndVerifyPassword($password)
    {

        if ($this->isValidPassword($password)) {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            return $hashedPassword;
        } else {
            return false;
        }
    }
    public function verifyPassword($pass, $hash)
    {
        return password_verify($pass, $hash);
    }

    function isValidPassword($password)
    {
        if (strlen($password) >= 8) {
            return true;
        } else {
            return false;
        }
    }
    public function verifyPasswordAndConfirmPassword($password, $confirmPassword)
    {
        if (isset($password) && isset($confirmPassword)) {
            if ($password !== $confirmPassword) {
                return false;
            }
            return true;
        }
        return false;
    }
    public function all(){
        return $this->userRepository->all();
    }
    function generateReferralCode()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $referralCode = '';
        for ($i = 0; $i < 8; $i++) {
            $randomIndex = mt_rand(0, strlen($characters) - 1);
            $referralCode .= $characters[$randomIndex];
        }

        return $referralCode;
    }
    public function AttributeCode()
    {
        $referralCode = null;

        do {
            $referralCode = $this->generateReferralCode();
            $existingUser = $this->userRepository->getByReferralCode($referralCode);
        } while ($existingUser);

        return $referralCode;
    }
    public function Attribute(){
        $code=null;
        do {
            $code = $this->geneResetCode();
            $existingCode = $this->userRepository->getToken($code);
        } while ($existingCode);

        return $code;

    }
    public function geneResetCode(){
        return  rand(100000, 999999);
    }

}
