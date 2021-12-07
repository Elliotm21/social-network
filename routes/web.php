<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/posts');
});

// Posts
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts', [PostController::class, 'store'])->name('posts.store');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Comments
Route::post('posts/{post}', [CommentController::class, 'store'])->name('comments.store');

// Logging out
Route::get('users/index', [UserController::class, 'index'])->name('users.index');
Route::post('logout', [UserController::class, 'logout'])->name('logout');

// Image uploading
Route::get('image-upload', [ ImageUploadController::class, 'imageUpload' ])->name('image.upload');
Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post');

// Navbar
Route::get('home', [FrontController::class, 'home'])->name('home');
Route::get('products', [FrontController::class, 'products'])->name('products.index');
Route::get('about-us', [FrontController::class, 'aboutUs'])->name('about.us');

Route::get('posts1', [PostController::class, 'page']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';