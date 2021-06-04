<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $table = 'contacts';
    protected $fillable = ['size', 'name', 'phone', 'email', 'note', 'type', 'products_id', 'utm_source', 'utm_medium', 'utm_campaign'];

    public function product(){
        return $this->belongsTo(Products::class, 'products_id', 'id');
    }
}
