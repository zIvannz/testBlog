<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Auth;
 

class ImageController extends Controller
{
    public function downloadMainImage($image, $post_id)
    {
            $path = $image->store('posts/' . Auth::user()->id . '/images', 'public');
            
            $image = new Image();
            $image->post_id = $post_id;
            $image->path = $path;
            $image->type = 'main_photo';
            $image->save();
    }

    public function downloadImages($images, $post_id)
    {
        foreach ($images as $image) {
            $path = $image->store('posts/' . Auth::user()->id . '/images', 'public');
            
            $image = new Image();
            $image->post_id = $post_id;
            $image->path = $path;
            $image->type = 'images_photo';
            $image->save();
        }
           
    }
}
