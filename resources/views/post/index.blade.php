@extends('layout.app')

@section('content')
<h1>Posts</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Title</th>
            <th>Content</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->name }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ url()->previous() }}">Back to Form</a>

@endsection
