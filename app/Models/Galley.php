<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class Gallery extends BaseModel
{
    //
    use MultiLanguage;
    protected $table = 'galleys';
    protected $multilingual = ['title', 'meta_title', 'meta_description', 'meta_keywords'];
    protected $fillable = ['title', 'image', 'user_id', 'meta_title', 'meta_description', 'meta_keywords'];
}
