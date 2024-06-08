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
       $coupon=$this->coupon->getByCode($data['coupon_code']);
       $data['user_id']=$user->id;
       $data['coupon_id']=$coupon->id;
       $this->distributeGains($user,$data['amount'],$data['percent']);
       $this->trans->create($data);
       return redirect()->back()->with('success','Bon is validated with sucess');
    }

    public function all() {
        
        
    }
    function distributeGains($user, $amount, $xp) {
        $referrers = [];
        $currentReferrer = $user->referrer; 
    
        
        for ($i = 0; $i < 5 && $currentReferrer; $i++) {
            $referrers[] = $currentReferrer;
            $currentReferrer = $currentReferrer->referrer; 
        }
    
        $n = count($referrers);
        if ($n > 0) {
            $gainPerReferrer = ($xp / $n) * $amount / 100;
    
            foreach ($referrers as $referrer) {
                if ($referrer) { 
                    $referrer->balance += $gainPerReferrer;
                    $referrer->updateDailyPercent($xp/$n);
                }
            }
        }
    }
    
}