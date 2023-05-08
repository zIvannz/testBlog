<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class MainController extends Controller
{
    public function home()
    {
        $posts = Post::where('status', 1)->with('main_image')->get();
        
        return view('welcome', compact('posts'));
    }
}
