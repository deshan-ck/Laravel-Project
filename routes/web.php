<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Models\Admin;
use App\Http\Controllers\Admin\DashboardController;
//
use App\Http\Controllers\AuthController;

// Route for logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', [WelcomeController::class, 'index'])->name('Welcome');

Auth::routes();
//WELCOME 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');


//posts


Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{PostId}/show', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/all', [HomeController::class, 'allPosts'])->name('posts.all');
Route::get('/posts/{PostId}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts/{PostId}/update', [PostController::class, 'update'])->name('posts.update');
Route::get('/posts/{PostId}/delete', [PostController::class, 'delete'])->name('posts.delete');

//Admin routes
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('admin')->name('admin.dashboard');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard'); // Replace with your dashboard view file name if it's different
})->middleware(['auth']);

