<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PhotoAlbum;
use App\Models\Photo;

class AdminPhotoAlbumController extends Controller
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
        return view('admin_photo_albums.photo_albums', ['photoAlbums' => $photoAlbums]);
    }

    public function show($id)
    {
        $photoAlbum = PhotoAlbum::find($id);
        $photos = $this->getPhotos($id);

        return view('admin_photo_albums.details', ['photoAlbum' => $photoAlbum], ['photos' => $photos]);
    }

    public function create()
    {
        return view('admin_photo_albums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required', 'string', 'max:255',
            'description' => 'required', 'string', 'max:255',
            'date' => 'required'
        ]);

        PhotoAlbum::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'date' => $request['date']
        ]);

        return redirect()->route('photo_albums.index');
    }

    public function edit($id)
    {
        $photoAlbum = PhotoAlbum::find($id);
        return view('admin_photo_albums.edit', compact('photoAlbum'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required', 'string', 'max:255',
            'description' => 'required', 'string', 'max:255',
            'date' => 'required'
        ]);

        $photoAlbum = PhotoAlbum::find($id);

        $photoAlbum->title = $request->get('title');
        $photoAlbum->description = $request->get('description');
        $photoAlbum->date = $request->get('date');

        $photoAlbum->save();
        return redirect()->route('photo_albums.index');
    }

    public function destroy($id)
    {
        $photoAlbum = PhotoAlbum::find($id);
        $photos = $this->getPhotos($id);

        $photoAlbum->delete();
        $photos->delete();
        return redirect()->route('photo_albums.index');
    }
}
