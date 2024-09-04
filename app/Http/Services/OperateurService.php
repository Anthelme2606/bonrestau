<?php
namespace App\Http\Services;

use App\Http\Repositories\UserRepository;
use App\Http\Repositories\OperateurRepository;
use App\Http\Repositories\ReferralRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class OperateurService
{
protected $operateur;
    public function __construct(OperateurRepository $operateur){
   $this->operateur=$operateur;

    }
    public function update(array $data){
        $data['location']=$data['location'];
        $this->operateur->update($data['id'],$data);
        return redirect()->back()->with('success','Mis à jour effectué avec success');
    }
    public function create(array $data){
        $ide=$this->identifiant();

        $data['identifiant']=$ide;
        $user=Auth::user();
        $data['user_id']=$user->id;
        $data['location']=$data['localite'];
        

     $this->operateur->create($data);
     return redirect()->back()->with('success','Votre demande en attente de validation');
    }
    public function operateurs(){
        return $this->operateur->operateurs();
    }
    public function chargement(array $data){
        $operator = $this->operateur->getByIdentifiant($data['identifiant']);
        if($operator){
         $operator->balance+=$data['valeur'];
         $operator->save();
         return redirect()->back()->with('success',' chargement effectué');
        }else{
            return redirect()->back()->with('error','Aucun compte trouvé');
        }
    }
public function activer(array $data){
    $opera=$this->operateur->getById($data['operateur']);
    if($opera){
    $opera->status='active';
    $opera->save();
    return redirect()->back()->with('success',' activation effectuée');
    }
    return redirect()->back()->with('error','Probleme survenu pendant activation');
}
public function deactiver(array $data){
    $opera=$this->operateur->getById($data['operateur']);
    if($opera){
    $opera->status='inactive';
    $opera->save();
    return redirect()->back()->with('success',' inactivation effectuée');
    }
    return redirect()->back()->with('error','Probleme survenu pendant inactivation');
}
    public function cash(array $data) {
        $user = Auth::user();
    
        // Vérification du solde de l'utilisateur
        if (floatval($user->balance) > floatval($data['sommes'])) {
            $operator = $this->operateur->getByIdentifiant($data['identifiant']);
    
            // Vérification de l'existence de l'opérateur et de son statut
            if (isset($operator) && $operator->status == 'active') {
                if(floatVal($operator->balance) > floatVal($data['sommes']))
                {
                $operator->balance-=$data['sommes'];
               
                // Mise à jour des données nécessaires pour l'opération
                $data['user_id'] = $user->id;
                $data['operator_id'] = $operator->id;
                
                // Création de l'enregistrement de la caisse
                $caisses = [
                    'balance' => $data['sommes'] * 0.005,
                    'nom' => $user->nom,
                    'description' => 'retrait',
                ];
                $this->operateur->caisse($caisses);
    
                // Mise à jour des balances
                $operator->commissions = $data['sommes'] * 0.005;
                $user->balance -= $data['sommes'];
                $user->save();
                $operator->save();
    
                // Ajustement de la somme après déduction des frais
                $data['sommes'] -= $data['sommes'] * 0.01;
    
                // Création du client
                $client = $this->operateur->createClient($data);
    
                if ($client) {
                    // Création de la transaction
                    $trans = [
                        'sommes' => $data['sommes'],
                        'operator_id' => $operator->id,
                        'client_id' => $client->id,
                        'identifiant' => $this->idtr(),
                        'frais' => 1,
                    ];
                    $this->operateur->createTransaction($trans);
    
                    // Retourne un message de succès
                    return redirect()->back()->with('success', 'Retrait effectué avec succès');
                } else {
                    return redirect()->back()->with('error', 'Problème survenu pendant la création du client');
                }
            }else{
                return redirect()->back()->with('error', 'Balance de l\'operateur trop bas');
           
            }
            } else {
                return redirect()->back()->with('error', 'Opérateur en statut inactif ou non reconnu');
            }
        }
    
        return redirect()->back()->with('error', 'Demande non aboutie, solde inférieur à la somme');
    }
    
    public function generate() {
      $valeurs = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
      $length = 6; // Length of the generated string
      $generatedString = '';
      
      for ($i = 0; $i < $length; $i++) {
          $generatedString .= $valeurs[rand(0, strlen($valeurs) - 1)];
      }
      
      return $generatedString;
  }
  public function generatekey() {
    $valeurs = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $length = 9; // Length of the generated string
    $generatedString = '';
    
    for ($i = 0; $i < $length; $i++) {
        $generatedString .= $valeurs[rand(0, strlen($valeurs) - 1)];
    }
    
    return $generatedString;
}
  
  public function identifiant() {
      $ids = $this->operateur->operateurs(); 
      $generate = '';
  
      do {
          $generate = $this->generate();
          $isDuplicate = false;
          
          foreach ($ids as $id) {
              if (isset($id->identifiant) && $id->identifiant === $generate) {
                  $isDuplicate = true;
                  break;
              }
          }
      } while ($isDuplicate);
  
      return $generate;
  }
  public function idtr() {
    $ids = $this->operateur->transactions(); 
    $generate = '';

    do {
        $generate = $this->generatekey();
        $isDuplicate = false;
        
        foreach ($ids as $id) {
            if (isset($id->identifiant) && $id->identifiant === $generate) {
                $isDuplicate = true;
                break;
            }
        }
    } while ($isDuplicate);

    return $generate;
}
  

}