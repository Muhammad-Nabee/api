<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
 use Tymon\JWTAuth\Contracts\JWTSubject;
 use App\Models\Booking;

class User extends Authenticatable implements JWTSubject 
{
    
    use HasApiTokens, HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $casts = ['uuid'=>'string','email_verified_at' => 'datetime',];
    protected $fillable = [
        'uuid',
        'first_name',
        'last_name',
        'email',
        'status',
        'password',
        'Dob',
        'gender',
        'contact_number',
        'cnic',
    ];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'id';
        public $incrementing=false; 
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
   

    public function getJWTIdentifier()
    {
        
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function bookings() {
        return $this->hasMany(Booking::class, 'user_id');
    }
}
