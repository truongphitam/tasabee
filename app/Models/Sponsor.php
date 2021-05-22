<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MultiLanguage;

class Sponsor extends BaseModel
{
    //
    use MultiLanguage;
    protected $multilingual = ['title'];
    protected $fillable = ['title', 'slug', 'image', 'user_id', 'is_published', 'gallery', 'priority'];

    public function author()
    {
        return $this->belongsTo(Admins::class, 'user_id', 'id');
    } 
}
