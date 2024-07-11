<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'token',
        'email',
        'created_at'
    ];
    protected $primaryKey = 'email'; 
    public $incrementing = false; 
    protected $keyType = 'string';
}
