<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\User;

class Booking extends Model
{
    use HasFactory;
    protected $casts=['id' => 'string'];
    protected $fillable = [
        'uuid',
        'name',
        
        'father_name',
        'status',
        'email',
        'cnic',
        'address',
        'gender',
        'car_name',
        'service',
        'date_in',
        'date_out',

    ];
    public function user() {  
         return $this->belongsTo('User');
    }
}
