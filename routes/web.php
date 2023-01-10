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
Route::resource('/repertoire', \App\Http\Controllers\RepertoireController::class);
Route::get('/calendar', [\App\Http\Controllers\CalendarController::class, 'index']);

//Member access only
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('/posts', \App\Http\Controllers\PostController::class)->middleware('auth');
Route::resource('/comments', \App\Http\Controllers\CommentController::class)->middleware('auth');
Route::resource('/songs', \App\Http\Controllers\MusicController::class)->middleware('auth');
Route::resource('/playlists', \App\Http\Controllers\PlaylistController::class)->middleware('auth');
Route::resource('/playlist_song', \App\Http\Controllers\SongToPlaylistController::class)->middleware('auth');
Route::match(["get", "delete"], '/playlist_song/{playlist_id}/{song_id}', [\App\Http\Controllers\SongToPlaylistController::class, 'destroy'])->name('delete-song-playlist')->middleware('auth');

//Members with post_role
Route::resource('/admin/posts', \App\Http\Controllers\AdminPostController::class)->middleware('post_role')->middleware('admin');

//Admin access only
Route::resource('/admin/users', \App\Http\Controllers\AdminUsersController::class)->middleware('admin');
Route::resource('/admin/songs', \App\Http\Controllers\AdminMusicController::class)->middleware('admin');
Route::resource('/admin/voice_parts', \App\Http\Controllers\VoicePartController::class)->middleware('admin');
Route::resource('/admin/welcome', \App\Http\Controllers\AdminWelcomePageController::class)->middleware('admin');
Route::resource('/admin/info', \App\Http\Controllers\AdminInfoPageController::class)->middleware('admin');
Route::resource('/admin/repertoire', \App\Http\Controllers\AdminRepertoireController::class)->middleware('admin');
Route::resource('/admin/calendar', \App\Http\Controllers\AdminCalendarController::class)->middleware('admin');

//Routes for login
Auth::routes();
