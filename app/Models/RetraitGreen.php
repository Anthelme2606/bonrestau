<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetraitGreen extends Model
{
    use HasFactory;
    protected $table = 'retraits_green';
    protected $fillable = [
        'id',
        'user_id',
        'valeur',
        'description'
    ];
}
