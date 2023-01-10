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
Route::get('/', [\App\Http\Controllers\WelcomePageController::class, 'index']);
Route::get('/info', [\App\Http\Controllers\InfoPageController::class, 'index']);

//Member access only
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('/posts', \App\Http\Controllers\PostController::class)->middleware('auth');
Route::resource('/comments', \App\Http\Controllers\CommentController::class)->middleware('auth');
Route::resource('/songs', \App\Http\Controllers\MusicController::class)->middleware('auth');
Route::resource('/playlists', \App\Http\Controllers\PlaylistController::class)->middleware('auth');
Route::resource('/playlist_song', \App\Http\Controllers\SongToPlaylistController::class)->middleware('auth');
Route::match(["get", "delete"], '/playlist_song/{playlist_id}/{song_id}', [\App\Http\Controllers\SongToPlaylistController::class, 'destroy'])->name('delete-song-playlist')->middleware('auth');

//People who can post access only
Route::resource('/admin/posts', \App\Http\Controllers\AdminPostController::class)->middleware('post_role')->middleware('admin');

//Admin access only
Route::resource('/admin/users', \App\Http\Controllers\AdminUsersController::class)->middleware('admin');
Route::resource('/admin/songs', \App\Http\Controllers\AdminMusicController::class)->middleware('admin');
Route::resource('/admin/voice_parts', \App\Http\Controllers\VoicePartController::class)->middleware('admin');
Route::resource('/admin/welcome', \App\Http\Controllers\AdminWelcomePageController::class)->middleware('admin');
Route::resource('/admin/info', \App\Http\Controllers\AdminInfoPageController::class)->middleware('auth');

//Routes for login, register
Auth::routes();
