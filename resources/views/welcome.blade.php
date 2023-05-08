@extends('app.app')
@section('content')
    <div class="title-page">
        <h3>Posts</h3>
        <a href="{{ route('post.create') }}">Create post</a>
    </div>
    <div class="items">
        @forelse ($posts as $post)
            <div class="item">
                <div class="item-header">
                    <div style="display: flex; align-items: center;">
                        <h5 id="title-{{ $post->id }}">{{ $post->title }}</h5>
                        @auth
                            @if($post->user_id == auth()->user()->id)
                                <button type="button">Update</button>
                            @endif
                        @endauth
                    </div>
                </div>
                <div class="item-body">
                    <img src="{{asset('storage/' . $post->main_image->path)}}" width="100%">
                    <p id="quote-{{ $post->id }}">{{ $post->description }}</p>
                </div>
            </div>
        @empty
            <p>No posts</p>
        @endforelse
    </div>
@endsection
