<?php
use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::middleware('api')->group(function () {
    Route::get('/posts', [PostController::class, 'index']); // Get all posts
    Route::get('/posts/{id}', [PostController::class, 'show']); // Get a single post
    Route::post('/posts', [PostController::class, 'store']); // Create a new post
    Route::put('/posts/{id}', [PostController::class, 'update']); // Update a post
    Route::delete('/posts/{id}', [PostController::class, 'destroy']); // Delete a post
});