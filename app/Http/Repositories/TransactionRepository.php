<?php
namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionRepository {

    public function create(array $data) {
        return Transaction::create($data);
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