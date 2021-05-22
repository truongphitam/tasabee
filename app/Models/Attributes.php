<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class Attributes extends BaseModel
{
    //
    use MultiLanguage;
    protected $multilingual = ['title'];
    protected $fillable = ['title', 'slug', 'image', 'parent_id', 'user_id', 'value'];
}
