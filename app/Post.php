<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $fillable = [
        'title', 'content'
    ];

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }
}
