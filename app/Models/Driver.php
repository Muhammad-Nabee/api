<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = "drivers";
    protected $casts=['id' => 'string'];
    protected $fillable = [
        'dr_name',
        'dr_join',
        'dr_mobile',
        'dr_licence',
        'dr_licence_valid',
        'dr_address',
        'dr_photo',
        'dr_available',

    ];
}
