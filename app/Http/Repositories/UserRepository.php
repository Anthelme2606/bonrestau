<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository {

    public function create(array $data) {
        return User::create($data);
    }

    public function find($id) {
        return User::find($id);
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
