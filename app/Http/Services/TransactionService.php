<?php
namespace App\Http\Services;
use App\Http\Repositories\TransactionRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\CouponRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class TransactionService {
protected $trans;
protected $coupon;
protected $user;
    public function __construct(
    TransactionRepository $trans,
    UserRepository $userRepository,
    CouponRepository $couponRepository
    ){
        $this->trans=$trans;
        $this->user=$userRepository;
        $this->coupon=$couponRepository;
    }

    public function create(array $data) {
        
       $user= $this->user->getByReferralCode($data['user_code']);
       $coupon=$this->coupon->getByPrice($data['coupon_price']);
       
       if(!$user){
        return redirect()->back()->with('error','Aucun utilisateur avec ce code:'.$data['user_code']);
       }
       $data['user_id']=$user->id;
       $data['coupon_id']=$coupon->id;
       if($coupon && $coupon->quantite>=$data['quantite'])
       {
        $coupon->quantite-=$data['quantite'];
        $coupon->save();
       }else {
        return redirect()->back()->with('error','la quantité voulue est superieure a la quantite disponible');
       }
       
       $data['amount']=$coupon->price;
       
       $this->distributeGains($user,$data['amount'],$data['percent'],$data['quantite']);
       $this->trans->create($data);
       return redirect()->back()->with('success','Bon validé avec succes');
    }

    public function all() {
        
        return $this->trans->all();
    }
    public function qteV() {
       
        $users=$this->getUsersWithinFiveLevels();
        return $this->trans->qteV();
    }
    public function bonBuyInRelation(){
        $count = 0;
        $user = Auth::user();
    
        // Get users within five levels of referrals
        $users = $this->getUsersWithinFiveLevels();
        $trans = $this->trans->all();
        if($users->isNotEmpty() && $trans->isNotEmpty())
       { foreach($users as $user){
            foreach($trans as $tran){
                if($tran && $user){
                   if($tran->user_id===$user->id)
                   {
                    $count+=$tran['quantite'];
                   } 
                }
            }
        }}
        return $count;
    }
    public function UsersWhobuys(){
        $count = 0;
        $user = Auth::user();
    
        // Get users within five levels of referrals
        $users = $this->getUsersWithinFiveLevels();
        $tableau=new Collection();
        
        // Retrieve all transactions (bons)
        $trans = $this->trans->all();
       
        if ($trans->isNotEmpty() && $users->isNotEmpty()) {
            foreach ($trans as $tran) {
                foreach($users as $user){
                   
                    if ($tran && $user && $user->id===$tran->user_id) {
                        if(!$tableau->contains($user->id)){
                          $tableau->push($user->id);
                        }
                       
                    }
                }
                
            }
        }
        $count=$tableau->count();
    
        return $count;
    }
    
    public function ventes() {
        
        return $this->trans->ventes();
    }
    public function getUsersWithinFiveLevels(): Collection
    {
        $user=Auth::user();
        $users = new Collection();
        $this->addUsersWithinLevels($user, 0, $users);
        return $users;
    }

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
    public function fithReferrers($user){
        $count = 0;
        $tableau = collect();
    
        while ($count < 5 && $user->referrer) {
            $user = $user->referrer;
            $tableau->push($user);
            $count++;
        }
    
        return $tableau;
    }
    
    public function distributeGains($user, $amount, $xp, $quantity) {
        
        $gain = $amount * $xp * $quantity / 100;
        $dailyPercent = $xp * $quantity / 100;
    
        $referrers = $this->fithReferrers($user);
        $referrerCount = $referrers->count();
    
        $reste = 0;
        $caisse = 0;
    
        if ($referrerCount > 0) {
            // Calcul du reste et de la caisse
            $reste = 5 - $referrerCount;
            $caisse = $gain * $reste;
    
            // Distribution des gains aux référents
            foreach ($referrers as $referrer) {
                $referrer->balance += $gain;
                $referrer->updateDailyPercent($dailyPercent);
               // $referrer->save(); // Sauvegarde des modifications dans la base de données
            }
        }
    
    }
    public function BonsMoisCourant()
    {
        return  $this->trans->BonsMoisCourant();
    }
    
}