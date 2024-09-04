<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;
   protected $table="operators";

    protected $fillable = ['user_id','image', 'balance', 'commissions', 'identifiant', 'status','location'];

    public function transactions()
    {
        return $this->hasMany(TransacOperator::class);
    }

    public function clients()
    {
        return $this->hasMany(OperatorClient::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
