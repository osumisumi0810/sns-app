<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])
    ->middleware(['auth'])
    ->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])
    ->middleware(['auth'])
    ->name('posts.store');

Route::get('/posts', [PostController::class, 'index'])
    ->middleware(['auth'])
    ->name('posts.index');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])
    ->name('posts.destroy');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

Route::get('/users/{user}/posts', [UserController::class, 'posts'])->name('users.posts');

Route::post('/users/{user}/profile-image', [UserController::class, 'updateImage'])
    ->name('users.update_image');


require __DIR__.'/auth.php';
