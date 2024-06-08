<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use carbon\Carbon;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'referral_code',
        'referrer_code',
        'balance',
        'daily_percent',
        'daily_percent_updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_code', 'referral_code');
    }

    // Relationship to get all users referred by the current user
    public function referrals()
    {
        return $this->hasMany(User::class, 'referrer_code', 'referral_code');
    }
    public function transactions()
    {
        
        return $this->hasMany(Transaction::class, 'user_id');

    }
    public function updateDailyPercent($newPercent)
    {
        $today = Carbon::today();

        if (!$this->daily_percent_updated_at || $this->daily_percent_updated_at->lt($today)) {
            $this->daily_percent = 0;
            $this->daily_percent_updated_at = $today;
        }
        $this->daily_percent += $newPercent;
        $this->save();
    }
}
