@extends('layout.app')

@section('content')
<div class="container mt-5 text-center">
    <h2 class="mb-4">Scan this QR Code to View Post Details</h2>

    <div class="text-center">
        <!-- Display the QR code as an image -->
        <img src="{{ $qrCodeDataUri }}" alt="QR Code" />
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('post.index') }}" class="btn btn-primary">Back to Posts</a>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection
