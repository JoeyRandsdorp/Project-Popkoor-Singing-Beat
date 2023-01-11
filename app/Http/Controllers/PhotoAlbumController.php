<?php

namespace App\Http\Controllers;

use App\Models\PhotoAlbum;
use Illuminate\Http\Request;

class PhotoAlbumController extends Controller
{
    public function index()
    {
        $photoAlbums = PhotoAlbum::query()
            ->orderByRaw('date DESC')
            ->get();
        return view('photo_albums', ['photoAlbums' => $photoAlbums]);
    }

    public function show($id)
    {
        $photoAlbum = PhotoAlbum::find($id);
        return view('photo_album_details', ['photoAlbum' => $photoAlbum]);
    }
}
