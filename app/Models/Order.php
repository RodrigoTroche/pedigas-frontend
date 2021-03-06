<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_method_id',
        'shipping_address_id',
        'user_raw_data',
        'address_raw_data',
        'code',
        'hash',
        'amount',
        'comments',
        'shipping_type',
        'schedule'
    ];

    public function address()
    {
        return $this->belongsTo('App\Models\Address', 'shipping_address_id', 'id');
    }
}