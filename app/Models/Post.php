<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function main_image()
    {
        return $this->hasOne(Image::class, 'post_id', 'id')->where('type', 'main_photo');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'post_id', 'id')->where('type', 'images_photo');
    }
}
