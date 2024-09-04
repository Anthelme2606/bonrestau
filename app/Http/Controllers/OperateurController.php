<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\OperateurService;
class OperateurController extends Controller
{
    //
    protected $opera;
    public function __construct(OperateurService $service){
        $this->opera=$service;
    }
    public function create(){
        return view('operateurs.create');
    }
    public function activer(Request $request){
        return $this->opera->activer($request->all());
    }
    public function deactiver(Request $request){
        return $this->opera->deactiver($request->all());
    }
    public function operateurs(){
        $operateurs=$this->opera->operateurs();
        return view('operateurs.list', compact('operateurs'));
    }
    public function post_operateur(Request $request){
        $request->validate([
            'localite'=>'string|required',

        ]);
        return $this->opera->create($request->all());
    }
    public function info(){
        // $operateurs=$this->opera->operateurs();
        return view('operateurs.info');
    }
    public function coin_balance(){
    return view('operateurs.chargement');
    }
    public function chargement(Request $request){
        $request->validate([
            'identifiant'=>'required|string',
            'valeur'=>'string|required',
        ]);
        return $this->opera->chargement($request->all());
        
    }

    public function update_operateur_localite(Request $re){
        $re->validate([
            'location'=>'required|string',
        ]);
        return $this->opera->update($re->all());
    }
    public function cash(Request $request){
   $request->validate([
    'sommes'=>'string|required',
    'identifiant'=>'string|required',
   ]);
   return $this->opera->cash($request->all());
    }
}
