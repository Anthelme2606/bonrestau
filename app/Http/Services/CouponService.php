<?php

namespace App\Http\Services;
use App\Http\Repositories\CouponRepository;
use Illuminate\Support\Facades\Auth;
class CouponService
{
   
    protected $couponRepository;
    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
        
    }
    public function create(array $data)
    {
       
        $data['code']=$this->getCode();
        $coupon=$this->couponRepository->getByPrice($data['price']);
        if(isset($coupon))
        {
            return redirect()->back()->with('error','Bon with this price is set yet..');  
        }
        $this->couponRepository->create($data);
        return redirect()->back()->with('success','Bon created with success');

    }
    public function update(array $data)
    {
        $coupon=  $this->couponRepository->update($data['id'],$data);
        if(isset($coupon)){

            return redirect()->back()->with("success","Bon updated with success");
        }else{
            
          return redirect()->back()->with("error","An error occur when updating bon..");
        }
    }
    public function list()
    {
        return  $this->couponRepository->all();
    }

    public function generateCode()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $code = '';
        $maxIndex = strlen($characters) - 1;

        for ($i = 0; $i < 6; $i++) {
            $randomIndex = random_int(0, $maxIndex);
            $code .= $characters[$randomIndex];
        }

        return $code;
    }

    public function getCode()
    {
        do {
            $code = $this->generateCode();
            $existingCoupon = $this->couponRepository->getByCode($code);
        } while ($existingCoupon);
       
        return $code;
    }
}