<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BonController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\LinkController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//GET
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [AuthController::class,'dashboard'])->name('dashboard');
    Route::get('/bons', [BonController::class,'create'])->name('bon-create')->middleware('admin');
    Route::get('/bons-ravitaillement', [BonController::class,'ravitailler'])->name('bon-ravitailler')->middleware('admin');
    Route::get('/comptes.actifs', [AuthController::class,'account_actif'])->name('account-actif')->middleware('admin');

});
//reset
Route::get('/modify-password-get',[AuthController::class,'get_update'])->name('get_update')
->middleware('auth');
Route::get('/reset-password',[AuthController::class,'reset'])->name('reset-password');
Route::get('/password/verification', [AuthController::class,'password'])->name('password-reset');
Route::get('/code/verification', [AuthController::class,'code'])->name('code-reset');
Route::get('/generate',[CodeController::class,'index'])->name('generate')->middleware('auth');
Route::get('/', [AuthController::class,'index'])->name('home');
Route::get('/coming-soon', [AuthController::class,'coming'])->name('coming-soon')
->middleware('auth');
Route::get('/settings', [AuthController::class,'settings'])->name('settings')->middleware('auth');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');
Route::get('/parrains', [AuthController::class,'all'])->name('parrains');
Route::get('/login', [AuthController::class,'login'])->name('login')->middleware('guest');
Route::get('/trans-create', [TransactionController::class,'index'])->name('trans-create');
Route::get('/sign-up', [AuthController::class,'sign_up'])->name('sign-up');
//POST
Route::post('/modify-password',[AuthController::class,'post_update'])->name('post_update');
Route::post('/generate-link', [LinkController::class,'createLink'])->name('generate-link');
Route::post('/code/envoyer', [AuthController::class,'emailCode'])->name('email.code');
Route::post('/password/envoyer', [AuthController::class,'postPassword'])->name('password.reset');
Route::post('/password-reset', [AuthController::class,'email'])->name('password.email');
Route::post('/login', [AuthController::class,'post_login'])->name('post_login');
Route::post('/sign-up', [AuthController::class,'post_sign_up'])->name('post_sign_up');
Route::post('/bons', [BonController::class,'store'])->name('bon-store');
Route::post('/trans-store', [TransactionController::class,'store'])->name('trans-store');
Route::post('/bon-update', [BonController::class,'update'])->name('bon-update');
Route::post('/bon-ravitaillement', [BonController::class,'ravita'])->name('bon-ravita');

