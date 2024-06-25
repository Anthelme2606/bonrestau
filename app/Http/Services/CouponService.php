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
    public function countUps(){
        return $this->couponRepository->couponUps();
    }
    public function qteT(){
        return $this->couponRepository->qteT();
    }
    public function ravita(array $data){
        $price=$data['coupon_price'];
        $coupon= $this->couponRepository->getByPrice($price);
        $coupon->quantite+=$data['quantite'];
      
        $coupon->save();
        
       return redirect()->back()->with('success','Bon ravitaillé avec succes');
       

    }
    public function create(array $data)
    {
       
        $data['code']=$this->getCode();
        $coupon=$this->couponRepository->getByPrice($data['price']);
        if(isset($coupon))
        {
            return redirect()->back()->with('error','Bon avec ce prix est déja defini..');  
        }
        $this->couponRepository->create($data);
        return redirect()->back()->with('success','Bon crée avec  succes');

    }
    public function update(array $data)
    {
        $coupon=  $this->couponRepository->update($data['id'],$data);
        if(isset($coupon)){

            return redirect()->back()->with("success","Bon mis à jour avec success");
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