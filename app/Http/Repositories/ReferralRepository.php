<?php
namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Models\Referral;
use Illuminate\Support\Facades\Auth;

class ReferralRepository {

    public function create(array $data) {
        return Referral::create($data);
    }

}