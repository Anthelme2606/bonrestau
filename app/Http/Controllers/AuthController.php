<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\AuthService; 
use App\Http\Services\CouponService; 
use App\Http\Services\TransactionService; 
class AuthController extends Controller
{ 
    protected $authService;
    protected $transactionService;
    public $clients;
    protected $couponService;
    public function __construct(AuthService $authService,
    CouponService $couponService,TransactionService $transactionService)
    {
        $this->authService=$authService;
        $this->couponService=$couponService;
        $this->transactionService=$transactionService;
       
    }
    public function index()
    {
      return view('layouts.home');
    }
    public function coming()
    {
      return view('layouts.coming-soon');
    }
    public function dashboard()
    {
      $coupons= $this->couponService->list();
      $qteT= $this->couponService->qteT();
      $bmsc= $this->transactionService->BonsMoisCourant();
      $qteV= $this->transactionService->qteV();
      $trans= $this->transactionService->all();
      $ventes= $this->transactionService->ventes();
      $clients=$this->authService->all();
      $coupons_up=$this->couponService->countUps();
      $counts=$this->authService->usersCurrentMonthCount();
    
      return view('layouts.dashboard',compact('trans','coupons','clients','counts','coupons_up','qteV','qteT','ventes','bmsc'));
    }
    public function settings()
    {
      return view('layouts.settings');
    }
    public function gen_code()
    {
      return view('layouts.generer');
    }
    public function login()
    {
      return view('authentification.login');
    }
    public function sign_up()
    {
       
    
        return view('authentification.sign-up');
    }
    public function reset(){
      return view('authentification.reset');
    }
    public function email(Request $request){
      $request->validate([
        'email'=>'string|required|',
      ]);
      return $this->authService->email($request->all());
    }
    public function password(){
     return view('authentification.password');
    }
    public function postPassword(Request $request){
     // dd($request);
      $request->validate([
        "email"=>"string|email|required",
        "password"=>"string|required",
        "confirm"=>"string|required",
      ]);
      return $this->authService->reset($request->all());
    }
    public function code(){
      return view('authentification.code');
    }
    public function emailCode(Request $request){
      $request->validate([
        "email"=>"string|required|email",
        "code"=>"string|required",
      ]);
      return $this->authService->codeVerification($request->all());
    }
    
    public function post_sign_up(Request $request)
    {
//dd($request);
        $request->validate([
            'nom' => 'string|required',
            'prenom' => 'string|required',
            'pseudo' => 'string|required',
            'date_naissance' => 'string|required',
            'numwhats' => 'string|required',
            'numero_reseau' => 'string|required',
            'region' => 'string|required',
            'commune' => 'string|required',
            'ville' => 'string|required',
            'quartier' => 'string|required',
            'email' => 'string|required|email',
            'password' => 'string|required|min:8',
            'confirm' => 'string|required|same:password',
            'invitant' => 'string|nullable',
            
              'reseau1' => 'string',
            'reseau2' => 'string',
            'perte_info' => 'string',
            'info_exact' => 'string',
           'accept_condition' => 'string',
            'inscription_1' => 'string',
            
        ]);
      //  dd($request);

        return $this->authService->post_sign_up($request->all());
    }
    public function post_login(Request $request)
    {
     
      $request->validate(([
        'email' => 'required|string',
        'password' => 'string|required',
     ]));
     return $this->authService->post_login($request->all());
    }
    public function all(){
      $clients=$this->authService->all();
      return view("clients.list",compact("clients"));
    }
    public function logout(Request $request){
      Auth()->logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect()->route('login')->with('success','You are disconnected.');
  }
}
