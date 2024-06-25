<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coupon;
use carbon\Carbon;
class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'coupon_id',
        'amount',
        'quantite',
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
    
    public static function qteV()
    {
       
        return self::sum('quantite');
       
    }
    public static function ventesMoisCourant()
    {
        $ventes= self::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
                   ->sum('amount');
        // dd($ventes);
        return $ventes;
    }
    public static function BonsMoisCourant()
    {
       return self::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
                   ->sum('quantite');
        
    }
}
