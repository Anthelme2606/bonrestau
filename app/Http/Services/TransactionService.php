<?php
namespace App\Http\Services;
use App\Http\Repositories\TransactionRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\CouponRepository;
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
        
        return $this->trans->qteV();
    }
    public function ventes() {
        
        return $this->trans->ventes();
    }
    function distributeGains($user, $amount, $xp, $quantity=1) {
        $referrers = [];
        $currentReferrer = $user->referrer; 
    
        
        for ($i = 0; $i < 5 && $currentReferrer; $i++) {
            $referrers[] = $currentReferrer;
            $currentReferrer = $currentReferrer->referrer; 
        }
    
        $n = count($referrers);
       
        if ($n > 0) {
            $gainPerReferrer = ($xp / $n) * $amount * $quantity / 100;
    
            foreach ($referrers as $referrer) {
                if ($referrer) { 
                    $referrer->balance += $gainPerReferrer;
                    $referrer->updateDailyPercent($xp/$n);
                }
            }
        }
    }
    public function BonsMoisCourant()
    {
        return  $this->trans->BonsMoisCourant();
    }
    
}