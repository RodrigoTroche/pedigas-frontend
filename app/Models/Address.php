<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'alias',
        'main_address',
        'main_number',
        'phone_number',
        'email',
        'is_department',
        'department',
        'reference',
        'contact',
        'business_name',
        'ruc',
        'user_id',
        'city_id'
    ];

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id', 'id');
    }
}