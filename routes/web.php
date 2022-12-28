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

//Admin access only
Route::get('posts/create', [\App\Http\Controllers\PostController::class, 'create'])->middleware('admin');
Route::get('posts/edit', [\App\Http\Controllers\PostController::class, 'edit'])->middleware('admin');
Route::get('posts/delete', [\App\Http\Controllers\PostController::class, 'delete'])->middleware('admin');

//Routes for login, register
Auth::routes();
