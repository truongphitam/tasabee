<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class Message extends BaseModel
{
    //
    use MultiLanguage;
    protected $multilingual = ['title', 'position', 'description'];
    protected $fillable = ['title', 'position', 'description', 'user_id'];
}
