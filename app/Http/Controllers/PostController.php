<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
//use Illuminate\Http\StorePostRequest;
//use App\Validation\StorePostRequest;
use App\Models\Post;
use Auth;
use App\Http\Controllers\ImageController;


class PostController extends Controller
{

    public function index()
    {
       $posts = Post::where('user_id', Auth::user()->id)->get();
       
       return $posts;
    }

    /**
     * Show the form for creating the resource.
     */
    public function create()
    {
        return view('post/post_create');
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        $image = new ImageController;
        $image->downloadMainImage($request->image, $post->id);

        $images = new ImageController;
        $images->downloadImages($request->images, $post->id);

        return redirect()->route('home')->with('success', 'Create post success');
        
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
