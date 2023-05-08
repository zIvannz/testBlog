@extends('app.app')
@section('content')
    <div class="title-page">
        <h3>Create post</h3>
    </div>
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" required\></textarea>
        </div>
        <div>
            <label for="image">Main image </label>
            <input type="file" name="image" id="image" accept="image/png, image/jpeg" required>
        </div>

        <div>
            <label for="images">Images</label>
            <input type="file" name="images[]" id="images" accept="image/png, image/jpeg" multiple required>
        </div>

        <button type="submit">Create post</button>
    </form>
@endsection