<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\TransactionService;
class TransactionController extends Controller
{
    //
    protected $trans;
    public function __construct(TransactionService $trans)
    {
        $this->trans=$trans;
    }
    public function store(Request $request){
        $request->validate([
            'user_code' => 'required|string',
            'coupon_code' => 'required|string',
           'amount' => 'required|string',
            'percent' => 'required|string',

        ]);
        
        return $this->trans->create($request->all());
    }
}
