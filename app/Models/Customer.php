<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'uuid',
        'first_name',
        'last_name',
        'status',
        'email',
        'password',
        'Dob',
        'gender',
        'contact_number',
        'cnic',
    ];
    protected $primaryKey = 'uuid';
        public $incrementing=false; 
    protected $hidden = [
        'password',
    ];
}
