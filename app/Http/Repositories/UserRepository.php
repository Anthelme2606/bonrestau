<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\Auth;

class UserRepository {

    public function create(array $data) {
        return User::create($data);
    }
    public function reset(array $data)
{
   // dd($data);
    $this->isEmpty($data['email']);
    $data['created_at'] = now();
    return PasswordResetToken::create($data);
}


    public function find($id) {
        return User::find($id);
    }
    function update_balance($id, $balance) {
        
        $user = $this->find($id);
    
       
        return $user->update(['balance' => $balance]);
    }
    
    public function isEmpty($email)
    {
        $token=PasswordResetToken::where('email',$email)->first();
       // dd($token);
        if($token){
            $token->delete();
        }
    }
    public function isToken($code)
    {
        $token=PasswordResetToken::where('token',$code)->first();
        if($token){
            return true;
        }
        return false;
    }
    public function verifyEmail($email)
    {
        $user=$this->getByEmail($email);
        if(!$user)
        {
           return false;
        }
        return true;

    }
    public function getToken($code){
        return PasswordResetToken::where('token',$code)->first();
        

    }
    public function usersRegisteredCurrentMonth()
    {
        $users = User::getUsersRegisteredCurrentMonth();
        return $users;
    }

    public function getByEmail($eamil) {
        return User::where('email',$eamil)->first();
    }

    public function getByPhone($phone) {
        return User::where('phone',$phone)->first();
    }

    
    public function getByReferralCode($refer) {
        return User::where('referral_code',$refer)->first();
    }

    // Read all users with optional pagination
    public function all() {
        
        return User::all();
    }

    // Update a user by ID
    public function update($id, array $data) {
        $user = User::find($id);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

    // Delete a user by ID
    public function delete($id) {
        $user = User::find($id);
        if ($user) {
            return $user->delete();
        }
        return false;
    }

    // Authenticate user (additional method)
    public function authenticate($credentials) {
        if (Auth::attempt($credentials)) {
            return Auth::user();
        }
        return null;
    }
}
