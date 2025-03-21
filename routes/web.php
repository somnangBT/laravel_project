<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
// route::get('home', [PostController::class, 'home']);
Route::get('', function () {
    return view('post/index');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/', function () {
    return view('home');
});
Route::get('/post/index', function () {
    return view('post/index');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('insert', function () {
    return view('insert');
});

// Display Submitted Data (GET request)
Route::get('/post/index', [PostController::class, 'index'])->name('post.index');

// Handle Form Submission (POST request)


// Login Page (if needed)
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('contain', function () {
        return view('contain');
    });
Route::post('/contain', [PostController::class, 'store'])->name('contain');
Route::post('/post', [PostController::class, 'index'])->name('post.index'); // Display posts

 // Handle form submission