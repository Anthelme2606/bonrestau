<?php
namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\RetraitGreen;
use Illuminate\Support\Facades\Auth;

class TransactionRepository {

    public function create(array $data) {
        return Transaction::create($data);
    }
    public function create_retrait(array $data){
        return RetraitGreen::create($data);
    }

    public function getJeton() {
        $user = Auth::user();
    
        if ($user) { 
            $jeton = RetraitGreen::where('user_id', $user->id)->latest()->first();
            return $jeton;
        }
    
        return null; 
    }
    
    public function getJetons(){
        $user=Auth::user();
        $jetons=RetraitGreen::where('user_id',$user->id)->get();
        return $jetons;

    }
    public function latest_skip() {
        $user = Auth::user();
    
        if ($user) { 
            $jeton = RetraitGreen::where('user_id', $user->id)->latest()->first();
            return $jeton;
        }
    
        return null; 
    }

    public function all() {
        
        return Transaction::all();
    }
    public function qteV(){
        return Transaction::qteV();
        
    }
    public function ventes(){
        return Transaction::ventesMoisCourant();
        
    }
    public function BonsMoisCourant(){
        return Transaction::BonsMoisCourant();
        
    }
}