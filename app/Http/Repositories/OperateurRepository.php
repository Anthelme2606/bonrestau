<?php
namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Models\Operator;
use App\Models\OperatorClient;
use App\Models\TransacOperator;
use App\Models\Caisse;
use Illuminate\Support\Facades\Auth;

class OperateurRepository {

    public function create(array $data) {
        return Operator::create($data);
    }
    public function caisse(array $data){
        return Caisse::create($data);
    }
    public function createClient(array $data) {
        return OperatorClient::create($data);
    }
    public function createTransaction(array $data) {
        return TransacOperator::create($data);
    }
    public function transactions(){
        return TransacOperator::all(); 
    }
    public function transaction($id){
        return TransacOperator::find($id); 
    }

    public function operateurs() {
        return Operator::all();
    }
    public function update($id,array $data) {
        $oper=$this->getById($id);
        return $oper->update($data);
    }
    public function getById( $id) {
        return Operator::find($id);
    }
    public function getByIdentifiant($ide) {
        return Operator::where('identifiant', $ide)->firstOrFail();
    }
    

}