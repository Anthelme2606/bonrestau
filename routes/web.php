<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BonController;
use App\Http\Controllers\TransactionController;
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

});
Route::get('/', [AuthController::class,'index'])->name('home');
Route::get('/coming-soon', [AuthController::class,'coming'])->name('coming-soon');
Route::get('/settings', [AuthController::class,'settings'])->name('settings');
Route::get('/generer', [AuthController::class,'gen_code'])->name('generate');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');
Route::get('/parrains', [AuthController::class,'all'])->name('parrains');
Route::get('/login', [AuthController::class,'login'])->name('login')->middleware('guest');
Route::get('/trans-create', [TransactionController::class,'index'])->name('trans-create');
Route::get('/sign-up', [AuthController::class,'sign_up'])->name('sign-up')->middleware('guest');
//POST
Route::post('/login', [AuthController::class,'post_login'])->name('post_login');
Route::post('/sign-up', [AuthController::class,'post_sign_up'])->name('post_sign_up');
Route::post('/bons', [BonController::class,'store'])->name('bon-store');
Route::post('/trans-store', [TransactionController::class,'store'])->name('trans-store');
Route::post('/bon-update', [BonController::class,'update'])->name('bon-update');
Route::post('/bon-ravitaillement', [BonController::class,'ravita'])->name('bon-ravita');

