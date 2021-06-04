<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Admins;

class Post extends BaseModel
{
    // 
    
    use MultiLanguage;
    protected $multilingual = ['title', 'expert', 'description', 'meta_title', 'meta_description', 'meta_keywords'];
    protected $fillable = ['address', 'youtube_link', 'categories_id', 'title', 'slug', 'image', 'user_id', 'expert', 'description', 'is_published', 'meta_title', 'meta_description', 'meta_keywords', 'post_type'];

    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'id');
    }

    public function categories()
    {
        //return $this->belongsToMany(Categories::class, 'post_categories')->withTimestamps();
        return $this->belongsTo(Categories::class, 'categories_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(Admins::class, 'user_id', 'id');
    }

    public function comment(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
