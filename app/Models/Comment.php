<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Comment extends Model
{
    //
    protected $table = 'comments';
    public $timestamps = true;

    protected $fillable = ['type', 'users_id', 'post_id', 'name', 'email', 'content'];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
