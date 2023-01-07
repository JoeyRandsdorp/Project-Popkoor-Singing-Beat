<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;
use App\Models\Song;
use App\Models\VoicePart;

class AdminMusicController extends Controller
{
    public function index()
    {
        $songs = Song::query()
            ->orderByRaw('title ASC')
            ->get();
        return view('admin_songs.songs', ['songs' => $songs]);
    }

    public function create()
    {
        $songs = Song::all();
        return view('admin_songs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required', 'string', 'max:255',
            'artist' => 'required', 'string', 'max:255',
            'lyrics' => 'required', File::types(['pdf', 'PDF']),
            'translation' => 'required', File::types(['pdf', 'PDF']),
            'sheet_music' => 'required', File::types(['pdf', 'PDF']),
            'full_song' => 'required', File::types(['mp3', 'wav', 'aac', 'ogg', 'aiff', 'flac']),
            'image' => 'required', File::types(['gif', 'GIF', 'jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG'])
        ]);

        $lyrics = request()->file('lyrics')->store('lyrics');
        $translation = request()->file('translation')->store('translations');
        $sheet_music = request()->file('sheet_music')->store('sheet_music');
        $full_song = request()->file('full_song')->store('full_songs');
        $image = request()->file('image')->store('images');

        Song::create([
            'title' => $request['title'],
            'artist' => $request['artist'],
            'lyrics' => $lyrics,
            'translation' => $translation,
            'sheet_music' => $sheet_music,
            'full_song' => $full_song,
            'image' => $image,
            'date' => $request['date']
        ]);

        return redirect()->route('songs.index');
    }

    public function getVoiceParts($id)
    {
        $voice_parts = DB::table('voice_parts')->where('song_id', '=', $id)->get();
        return $voice_parts;
    }

    public function show($id)
    {
        $song = Song::find($id);
        $voice_parts = $this->getVoiceParts($id);

        return view('admin_songs.details', ['song' => $song], ['voice_parts' => $voice_parts]);
    }

    public function edit($id)
    {
        $song = Song::find($id);
        return view('admin_songs.edit', compact('song'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required', 'string', 'max:255',
            'artist' => 'required', 'string', 'max:255'
        ]);
        $song = Song::find($id);
        $song->title = $request->get('title');
        $song->artist = $request->get('artist');
        $song->save();
        return redirect()->route('songs.index');
    }

    public function destroy($id)
    {
        $song = Song::find($id);
        $song->delete();
        return redirect()->route('songs.index');
    }
}
