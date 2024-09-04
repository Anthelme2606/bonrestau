<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransacOperator extends Model
{
    use HasFactory;
    protected $table='transac_operators';

    protected $fillable = ['operator_id', 'client_id', 'sommes', 'frais',  'identifiant'];

    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }

    public function client()
    {
        return $this->belongsTo(OperatorClient::class); 
    }
}
