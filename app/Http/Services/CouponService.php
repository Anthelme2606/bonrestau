<?php

namespace App\Http\Services;
use App\Http\Repositories\CouponRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
    function verifieNumber($numeroVerif, $numeroEnregistre) {
       
        $numeroVerif = str_replace(' ', '', $numeroVerif);
        $numeroEnregistre = str_replace(' ', '', $numeroEnregistre);
     if (strlen($numeroVerif) === strlen($numeroEnregistre)) {
            return $numeroVerif === $numeroEnregistre;
        }
    
        if (strlen($numeroVerif) > strlen($numeroEnregistre)) {
            $numeroVerif = substr($numeroVerif, -strlen($numeroEnregistre));
        } elseif (strlen($numeroEnregistre) > strlen($numeroVerif)) {
          
            $numeroEnregistre = substr($numeroEnregistre, -strlen($numeroVerif));
        }
    
      
        return $numeroVerif === $numeroEnregistre;
    }
    public function reseau_number (array $data){
        if(!empty($data['reseau'])){
            $reseau=Auth::user()->numero_reseau;
            if($this->verifieNumber($data['reseau'],$reseau)){
                 Session::put('phone_verified', true);
                 Session::put('phone_verified_timestamp', now());
            return redirect()->route('porte-f')->with('success','Numero verifié avec success');

            }else{
                return redirect()->back()->with('error','Erreur de vérification');
            }
        }
        return redirect()->back();
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