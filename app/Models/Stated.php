<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class Stated extends BaseModel
{
    //
    use MultiLanguage;
    protected $multilingual = ['sub_title', 'title', 'expert', 'description', 'meta_title', 'meta_description', 'meta_keywords'];
    protected $fillable = ['sub_title', 'avatar', 'categories_id', 'title', 'slug', 'image', 'user_id', 'expert', 'description', 'is_published', 'meta_title', 'meta_description', 'meta_keywords', 'post_type'];

    public function post()
    {
        return $this->hasOne(Stated::class, 'id', 'id');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'categories_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(Admins::class, 'user_id', 'id');
    }
}
