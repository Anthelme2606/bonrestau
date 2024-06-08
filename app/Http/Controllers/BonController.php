<?php

namespace App\Http\Controllers;
use App\Http\Services\CouponService;
use Illuminate\Http\Request;

class BonController extends Controller
{
    protected $couponService;
    public function __construct(CouponService $couponService){
        $this->couponService=$couponService;

    }
    public function create(){
         return view('coupons.create');
    }
    public function store(Request $request){
        $request->validate([
            'price' => 'required|integer',
            'date' => 'required|date',
        ]);
        
       return $this->couponService->create($request->all());
   }
   public function getAll()
   {
    $coupons= $this->couponService->list();
    return view('coupons.list',compact('coupons'));
   }
}
