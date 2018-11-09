<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class PostImage extends Model implements HasMedia
{
    use HasMediaTrait;

    public $fillable = [
        'post_id'
    ];
}
