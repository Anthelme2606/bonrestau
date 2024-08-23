<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\TransactionService;
use App\Http\Services\CouponService; 
class TransactionController extends Controller
{
    //
    protected $trans;
    protected $couponService;
    public function __construct(TransactionService $trans,CouponService $couponService)
    {
        $this->couponService=$couponService;
        $this->trans=$trans;
    }
    public function index()
    {
        $coupons= $this->couponService->list();
        return view('admin.valid-bon',compact('coupons'));
    }
    public function retrait()
    {
       
        return view('coupons.retrait');
    }
    public function jetons()
    {
        $jeton= $this->trans->getJeton();
        return view('layouts.jetons',compact('jeton'));
    }
    public function post_jetons(Request $request)
    {
        //dd($request);
       $request->validate([
        'user_id'=>'required|string',
        'valeur'=>'required|string',
        'description'=>'required|string'
       ]);
     return $this->trans->post_jetons($request->all());
    }
    public function store(Request $request){
        $request->validate([
            'user_code' => 'required|string',
            'coupon_price' => 'required|string',
            'quantite' => 'required|string',
            'percent' => 'required|string',

        ]);
        
        return $this->trans->create($request->all());
    }
}
