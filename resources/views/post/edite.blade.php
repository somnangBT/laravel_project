@extends('layout.app')

@section('content')
<div id="pageLoader" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.9); z-index: 9999; text-align: center;">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <p>Loading...</p>
    </div>
</div>

<div class="container mt-5" style="display: none;" id="formContainer">
    <h2 class="text-center mb-4">Edit Post</h2>
     <form action="{{ route('posts.update', $post->id) }}" method="POST" class="shadow p-4 rounded bg-light" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required value="{{ $post->name }}">
        </div>
        <div class="mb-3">
            <label for="member_id" class="form-label">Member ID:</label>
            <input type="number" id="member_id" name="member_id" class="form-control" value="{{ $post->member_id }}" placeholder="Enter Member ID">
        </div>
        <!-- Title Field -->
        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" id="title" name="title" class="form-control" required value="{{ $post->title }}">
        </div>

        <!-- Content Field -->
        <div class="mb-3">
            <label for="content" class="form-label">Content:</label>
            <textarea id="content" name="content" rows="4" class="form-control" required>{{ $post->content }}</textarea>
        </div>

        <!-- Category Field -->
        <div class="mb-3">
            <label for="category" class="form-label">មុខដំណែង:</label>
            <select id="category" name="category" class="form-select" required>
                <option value="" disabled selected>ជ្រើសរើស មុខដំណែង</option>
                <option value="ភិក្ខុ" {{ old('category') == 'ភិក្ខុ' ? 'selected' : '' }}>ភិក្ខុ</option>
                <option value="សាមណេរ" {{ old('category') == 'Entertainment' ? 'selected' : '' }}>សាមណេរ</option>
                <option value="អនុគណ" {{ old('category') == 'Sports' ? 'selected' : '' }}>អនុគណ</option>
                <option value="ចៅអធិការ" {{ old('category') == 'Health' ? 'selected' : '' }}>ចៅអធិការ</option>
            </select>
            @error('category')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <!-- Province Field -->
        <!-- filepath: c:\xampp\htdocs\week1\resources\views\post\edite.blade.php -->
        <div class="mb-3">
            <label for="province" class="form-label">ខេត្ត:</label>
            <select id="province" name="province" class="form-select" required>
                <option value="" disabled>ជ្រើសរើស​ ខេត្ត</option>
                <option value="ភ្នំពេញ (Phnom Penh) - Capital city" {{ $post->province == 'ភ្នំពេញ (Phnom Penh) - Capital city' ? 'selected' : '' }}>ភ្នំពេញ (Phnom Penh) - Capital city</option>
                <option value="បាត់ដំបង (Battambang)" {{ $post->province == 'បាត់ដំបង (Battambang)' ? 'selected' : '' }}>បាត់ដំបង (Battambang)</option>
                <option value="កំពង់ចាម (Kampong Cham)" {{ $post->province == 'កំពង់ចាម (Kampong Cham)' ? 'selected' : '' }}>កំពង់ចាម (Kampong Cham)</option>
                <option value="កំពង់ឆ្នាំង (Kampong Chhnang)" {{ $post->province == 'កំពង់ឆ្នាំង (Kampong Chhnang)' ? 'selected' : '' }}>កំពង់ឆ្នាំង (Kampong Chhnang)</option>
                <option value="កំពង់ស្ពឺ (Kampong Speu)" {{ $post->province == 'កំពង់ស្ពឺ (Kampong Speu)' ? 'selected' : '' }}>កំពង់ស្ពឺ (Kampong Speu)</option>
                <option value="កំពង់ធំ (Kampong Thom)" {{ $post->province == 'កំពង់ធំ (Kampong Thom)' ? 'selected' : '' }}>កំពង់ធំ (Kampong Thom)</option>
                <option value="កំពត (Kampot)" {{ $post->province == 'កំពត (Kampot)' ? 'selected' : '' }}>កំពត (Kampot)</option>
                <option value="កណ្តាល (Kandal)" {{ $post->province == 'កណ្តាល (Kandal)' ? 'selected' : '' }}>កណ្តាល (Kandal)</option>
                <option value="កែប (Kep)" {{ $post->province == 'កែប (Kep)' ? 'selected' : '' }}>កែប (Kep)</option>
                <option value="ក្រចេះ (Kratié)" {{ $post->province == 'ក្រចេះ (Kratié)' ? 'selected' : '' }}>ក្រចេះ (Kratié)</option>
                <option value="មណ្ឌលគីរ (Mondulkiri)" {{ $post->province == 'មណ្ឌលគីរ (Mondulkiri)' ? 'selected' : '' }}>មណ្ឌលគីរ (Mondulkiri)</option>
                <option value="ឧត្តមានជ័យ (Oddar Meanchey)" {{ $post->province == 'ឧត្តមានជ័យ (Oddar Meanchey)' ? 'selected' : '' }}>ឧត្តមានជ័យ (Oddar Meanchey)</option>
                <option value="ប៉ៃលិន (Pailin)" {{ $post->province == 'ប៉ៃលិន (Pailin)' ? 'selected' : '' }}>ប៉ៃលិន (Pailin)</option>
                <option value="បន្ទាយមានជ័យ (Banteay Meanchey)" {{ $post->province == 'បន្ទាយមានជ័យ (Banteay Meanchey)' ? 'selected' : '' }}>បន្ទាយមានជ័យ (Banteay Meanchey)</option>
                <option value="ព្រះវិហារ (Preah Vihear)" {{ $post->province == 'ព្រះវិហារ (Preah Vihear)' ? 'selected' : '' }}>ព្រះវិហារ (Preah Vihear)</option>
            </select>
            @error('province')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <!-- Image Upload Field -->
        <div class="mb-3">
            <label for="image" class="form-label">Upload New Image:</label>
            <input type="file" id="image" name="image" class="form-control" onchange="previewImage(event)">
            @if($post->image)
                <div class="mt-3" id="currentImageContainer">
                    <p>Current Image:</p>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" width="100">
                </div>
            @endif
            <div class="mt-3" id="newImagePreview" style="display: none;">
                <p>New Image Preview:</p>
                <img id="preview" src="#" alt="New Image Preview" width="100">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

<script>
    // Show the loader for 1 second, then hide it and show the form
    window.addEventListener('load', function () {
        const loader = document.getElementById('pageLoader');
        const formContainer = document.getElementById('formContainer');
        setTimeout(() => {
            loader.style.display = 'none'; // Hide the loader
            formContainer.style.display = 'block'; // Show the form
        }, 1000); // 1000ms = 1 second
    });

    // Preview the new image
    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        if (file) {
            reader.onload = function(e) {
                const preview = document.getElementById('preview');
                const previewContainer = document.getElementById('newImagePreview');
                const currentImageContainer = document.getElementById('currentImageContainer');

                // Set the new image preview
                preview.src = e.target.result;
                previewContainer.style.display = 'block'; // Show the preview container

                // Hide the current image container
                if (currentImageContainer) {
                    currentImageContainer.style.display = 'none';
                }
            };

            reader.readAsDataURL(file); // Read the file as a data URL
        }
    }
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection