<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProgressController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\SubjectController;
// Example route for admin product page
use App\Http\Controllers\StudentController;
use App\Models\Student;
use App\Models\User;
use Laravel\Prompts\Progress;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
// Home page
Route::get('home', [PostController::class, 'home'])->name('home');
Route::get('/post/index', [PostController::class, 'index'])->name('home.index');
// Route to list all posts
Route::get('/posts', [PostController::class, 'index'])->name('post.index');

// Create post form
// Show the create post form
Route::get('/post/create', function () {
    return view('post.create');  // This is where you will show the form
})->name('post.create');
// Store a new post
Route::post('/post', [PostController::class, 'store'])->name('posts.store');

// Store new post
Route::post('/post/create', [PostController::class, 'store'])->name('posts.store');

// Edit post form
// Show the edit post form
// Show the form to edit a specific post
Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Update the post
Route::put('/post/{post}', [PostController::class, 'update'])->name('posts.update');


// Delete post

Route::delete('/post/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

// List posts (with filters)
Route::get('/post', [PostController::class, 'index'])->name('posts.index');

// QR code for post
Route::get('/post/qrcode/{id}', [PostController::class, 'generateQrCode'])->name('post.qrcode');

// Bulk delete (if you use it)
Route::post('/post/bulk-delete', [PostController::class, 'bulkDelete'])->name('posts.bulkDelete');


Route::get('/post/progress', [PostController::class, 'teacherProgress'])->name('post.progress');
// end Post

// List all students
Route::get('/students', [StudentController::class, 'index'])->name('students.index');


// Show create student form
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

// Store new student
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

Route::get('/students/{student}/dowload-receipt', [ReceiptController::class, 'downloadReceipt'])->name('downloadReceipt');
// Show edit student form
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');

// Update student
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
// Delete student
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/students/progress', [StudentController::class, 'progress'])->name('students.progress');
// Show a single student (optional)
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Profile (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('dashboard');
});
// Route::middleware(['auth','adminMiddleware'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// });
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');    
    Route::get('/admin/progress', [ProgressController::class, 'index'])->name('admin.progress');

});
    Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product');
// Store a new post
require __DIR__ . '/auth.php';
Route::get('classtecher/index', function () {
    return view('classtecher.index');  // This is where you will show the form
})->name('classtecher.index');