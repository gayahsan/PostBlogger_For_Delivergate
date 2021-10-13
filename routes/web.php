<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\postController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//post
Route::post('/posts/store', [postController::class, 'store'])->name('posts.store');
Route::get('/posts/{postId}/show', [postController::class, 'show'])->name('posts.show');
Route::get('/posts/all', [HomeController::class, 'allPosts'])->name('posts.all');
Route::get('/posts/{postId}/edit', [postController::class, 'edit'])->name('posts.edit');
Route::post('/posts/{postId}/update', [postController::class, 'update'])->name('posts.update');
Route::get('/posts/{postId}/delete', [postController::class, 'delete'])->name('posts.delete');






