<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductsCate;
use App\Models\Gallery;

class Products extends BaseModel
{
    use MultiLanguage;
    protected $table = 'products';
    protected $multilingual = ['title', 'expert', 'description', 'meta_title', 'meta_description', 'meta_keywords'];
    protected $fillable = [
        'title',
        'slug',
        'image',
        'user_id',
        'expert',
        'description',
        'is_published',
        'meta_title',
        'meta_description', 
        'meta_keywords',
        'price'
    ];

    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(ProductsToCate::class, 'products_id', 'id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'product_id', 'id');
    }

    public function achievements()
    {
        return $this->belongsToMany(Achievements::class, 'product_achievements')->withTimestamps();
    }

    public function comment(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
