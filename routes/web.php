<?php

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

//All access routes
Route::get('/', function () {
    return view('welcome');
});

//Member access only
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::resource('/comments', \App\Http\Controllers\CommentController::class);

//People who can post access only
Route::resource('/admin/posts', \App\Http\Controllers\AdminPostController::class)->middleware('post_role')->middleware('admin');

//Admin access only
Route::resource('/admin/users', \App\Http\Controllers\AdminUsersController::class)->middleware('admin');
Route::resource('/admin/songs', \App\Http\Controllers\AdminMusicController::class)->middleware('admin');

//Routes for login, register
Auth::routes();
