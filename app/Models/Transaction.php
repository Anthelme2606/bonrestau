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
        
        return $this->hasMany(Coupon::class, 'id');
    }
    public function bon(){
        
        return $this->belongsTo(Coupon::class, 'coupon_id','id');
    }
    public function user(){
        
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
