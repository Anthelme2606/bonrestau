<?php
namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;

class CouponRepository {

    public function create(array $data) {
        return Coupon::create($data);
    }

    public function all() {
        
        return Coupon::all();
    }

    // Update a coupon by ID
    public function update($id, array $data) {
        $coupon = Coupon::find($id);
        if ($coupon) {
            
            $coupon->update($data);
            return $coupon;
        }
        return null;
    }
    public function getByCode($code){
        return Coupon::where('code',$code)->first();
    }
    public function getByPrice($price){
        return Coupon::where('price',$price)->first();
    }
    public function couponUps(){
        $bons_up=Coupon::recenserBonsMisAJour();
        return $bons_up->count();
    }
    public function qteT(){
        return Coupon::totalQuantite();
        
    }
   

}