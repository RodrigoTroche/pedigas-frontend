<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_street',
        'intersection_street_first',
        'intersection_street_second',
        'main_number',
        'is_department',
        'department',
        'reference',
        'contact',
        'user_id',
        'city_id'
    ];
}