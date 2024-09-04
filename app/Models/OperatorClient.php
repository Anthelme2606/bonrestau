<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorClient extends Model
{
    use HasFactory;
    protected $table ="operators_clients";

    protected $fillable = ['operator_id', 'transaction_id', 'interaction_date', 'notes','user_id'];

    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }

    public function transaction()
    {
        return $this->belongsTo(TransacOperator::class);
    }
    public function transactions()
    {
        return $this->hasMany(TransacOperator::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
