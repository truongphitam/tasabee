<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersDetail extends Model
{
    protected $table = 'orders_details';
    protected $fillable = [
        'user_id',
        'orders_id',
        'price',
        'products_id',
        'quantity',
        'item_unit',
        'packing_method',
        'sub_total'
    ];

    public function products()
    {
        return $this->hasOne(Products::class, 'id', 'products_id');
    } 
}
