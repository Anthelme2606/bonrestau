<?php

namespace App\Http\Controllers;
use App\Http\Services\CouponService;
use App\Http\Services\TransactionService;
use Illuminate\Http\Request;

class BonController extends Controller
{
    protected $couponService;
    protected $transService;
    public function __construct(CouponService $couponService,
    TransactionService $transService){
        $this->couponService=$couponService;
        $this->transService=$transService;

    }
    public function create(){
        $coupons= $this->couponService->list();
        $transactions=$this->transService->all();
         return view('coupons.create',compact('transactions','coupons'));
    }
    public function store(Request $request){
        $request->validate([
            'price' => 'required|integer',
            'date' => 'required|date',
        ]);
        
       return $this->couponService->create($request->all());
   }
   public function update(Request $request){
    
    $request->validate([
        'id' =>'required|string',
        'price' => 'required|string',
        'date' => 'required|string',
    ]);
    //dd($request);
   return $this->couponService->update($request->all());
}
   public function getAll()
   {
    $coupons= $this->couponService->list();
    return view('coupons.list',compact('coupons'));
   }
}
