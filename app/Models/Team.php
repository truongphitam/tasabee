<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends BaseModel
{
    //
    protected $table = 'teams';
    protected $fillable = ['image', 'users_id', 'name', 'position', 'facebook', 'google'];
}
