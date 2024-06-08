<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\AuthService; 
use App\Http\Services\CouponService; 
class AuthController extends Controller
{ 
    protected $authService;
    protected $couponService;
    public function __construct(AuthService $authService,CouponService $couponService)
    {
        $this->authService=$authService;
        $this->couponService=$couponService;
    }
    public function index()
    {
      return view('welcome');
    }
    public function dashboard()
    {
      $coupons= $this->couponService->list();
      $clients=$this->authService->all();
      return view('dashboard',compact('coupons','clients'));
    }
    public function settings()
    {
      return view('settings');
    }
    public function login()
    {
      return view('authentification.login');
    }
    public function sign_up()
    {
        
      return view('authentification.sign-up');
    }
    public function post_sign_up(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'phone' => 'string|required',
            'email' => 'string|required|email',
            'password' => 'string|required|min:8',
            'confirm' => 'string|required|same:password',
            'referrer_code' => 'string|nullable',
        ]);

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
