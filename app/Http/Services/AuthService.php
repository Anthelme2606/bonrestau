<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;
use App\Http\Repositories\ReferralRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthService
{
    protected $userRepository;
    protected $referralRepository;
    public function __construct(UserRepository $userRepository,ReferralRepository $referralRepository)
    {
        $this->userRepository = $userRepository;
        $this->referralRepository = $referralRepository;
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

}
