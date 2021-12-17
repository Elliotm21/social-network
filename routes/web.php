<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

// Post
Route::get('/dashboard', [PostController::class, 'index'])->name('posts.index');
Route::get('/dashboard/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/dashboard', [PostController::class, 'store'])->name('posts.store');
Route::get('/dashboard/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/dashboard/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/dashboard/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/dashboard/{post}/edit', [PostController::class, 'update'])->name('posts.update');

// Comment
Route::post('likes/{post}', [PostController::class, 'like'])->name('posts.like');
Route::post('likes/post/{comment}', [CommentController::class, 'like'])->name('comments.like');
Route::post('/dashboard/{post}', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/dashboard/post/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('/dashboard/post/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::post('/dashboard/post/{comment}/edit', [CommentController::class, 'update'])->name('comments.update');

// User
Route::post('logout', [UserController::class, 'logout'])->name('logout');
Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');

// Image uploading
Route::get('image-upload', [ImageUploadController::class, 'imageUpload'])->name('image.upload');
Route::post('image-upload', [ImageUploadController::class, 'imageUploadPost'])->name('image.upload.post');

// Notifications
// Route::get('send', [NotificationController::class, 'sendNotification'])->name('notification.send');

// API
// Route::post('api', [APIController::class, 'index'])->name('api.index');

require __DIR__.'/auth.php';