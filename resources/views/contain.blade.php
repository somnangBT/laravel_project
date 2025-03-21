@extends('layout.app')

@section('content')
    <h1>Submitted Posts</h1>

    @if($posts)
        @foreach($posts as $post)
            <div>
                <h2>{{ $post['name'] }}</h2>
                <p><strong>By:</strong> {{ $post['content'] }}</p>
                <p>{{ $post['title'] }}</p>
            </div>
            <hr>
        @endforeach
    @else
        <p>No posts available.</p>
    @endif

    <a href="{{ url('/') }}">Back to Home</a>
@endsection
