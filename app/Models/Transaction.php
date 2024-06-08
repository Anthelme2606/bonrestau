<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'coupon_id',
        'amount',
        'percent',
    ];
    public function bons(){
        
        return $this->hasMany(Coupon::class, 'id','coupon_id');
    }
}
