@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Post</h2>
    <form action="{{ url('post/update', $post->id) }}" method="POST" class="shadow p-4 rounded bg-light" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required value="{{ $post->name }}">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" id="title" name="title" class="form-control" required value="{{ $post->title }}">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content:</label>
            <textarea id="content" name="content" rows="4" class="form-control" required>{{ $post->content }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Upload New Image:</label>
            <input type="file" id="image" name="image" class="form-control">
            @if($post->image)
                <div class="mt-3">
                    <p>Current Image:</p>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" width="100">
                </div>
            @endif
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection