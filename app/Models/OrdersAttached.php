<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersAttached extends BaseModel
{
    //
    protected $table = 'orders_attacheds';
    protected $fillable = [
        'orders_id',
        'user_id',
        'path',
        'name',
        'mime_type',
        'size'
    ];
}
