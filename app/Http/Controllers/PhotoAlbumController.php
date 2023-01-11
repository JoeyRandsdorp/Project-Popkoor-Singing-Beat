<?php

namespace App\Http\Controllers;

use App\Models\PhotoAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotoAlbumController extends Controller
{
    public static function getPhotos($id)
    {
        $photos = DB::table('photos')->where('photo_album_id', '=', $id)->get();
        return $photos;
    }

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
        $photos = $this->getPhotos($id);
        return view('photo_album_details', ['photoAlbum' => $photoAlbum], ['photos' => $photos]);
    }
}
