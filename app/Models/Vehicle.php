<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicles';
    protected $casts=['id' => 'string'];
    protected $fillable = [
        'uuid',
        'veh_reg',
        'veh_type',
        'chesis_no',
        'status',
        'company',
        'veh_color',
        'veh_reg_date',
        'veh_description',
        'veh_photo',
        'veh_available',

    ];
}
