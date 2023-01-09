<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Playlist;
use App\Models\PlaylistSong;
use App\Models\Song;

class PlaylistController extends Controller
{
    public static function getSongData($id)
    {
        $song = DB::table('songs')
            ->where('id', '=', $id)
            ->first();
        return $song;
    }

    public function index()
    {
        $user_id = auth()->user()?->id;
        $playlists = DB::table('playlists')
            ->where('user_id', '=', $user_id)
            ->orderByRaw('title ASC')
            ->get();
        return view('playlists.playlists', ['playlists' => $playlists]);
    }

    public function create()
    {
        return view('playlists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required', 'string', 'max:255'
        ]);

        $user_id = auth()->user()?->id;

        Playlist::create([
            'title' => $request['title'],
            'user_id' => $user_id
        ]);

        return redirect()->route('playlists.index');
    }

    public function show($id)
    {
        $user_id = auth()->user()?->id;

        $playlist = Playlist::find($id);

        if($user_id !== $playlist->user_id){
            return redirect()->route('playlists.index');
        }
        else {
            $playlist_songs = DB::table('playlist_songs')
                ->where('playlist_id', '=', $id)
                ->get();

            return view('playlists.details', compact('playlist'), ['playlist_songs' => $playlist_songs]);
        }
    }

    public function edit($id)
    {
        $user_id = auth()->user()?->id;

        $playlist = Playlist::find($id);

        if($user_id !== $playlist->user_id){
            return redirect()->route('playlists.index');
        }
        else {
            return view('playlists.edit', compact('playlist'));
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required', 'string', 'max:255'
        ]);

        $user_id = auth()->user()?->id;

        $playlist = Playlist::find($id);

        if($user_id !== $playlist->user_id){
            return redirect()->route('playlists.index');
        }
        else {
            $playlist->title = $request->get('title');
            $playlist->save();
            return redirect()->route('playlists.index');
        }
    }

    public function destroy($id)
    {
        $user_id = auth()->user()?->id;

        $playlist = Playlist::find($id);

        if($user_id !== $playlist->user_id){
            return redirect()->route('playlists.index');
        }
        else {
            $playlist_id = $playlist->id;

            $playlist_songs = PlaylistSong::where('playlist_id', $playlist_id);
            $playlist_songs->delete();

            $playlist->delete();

            return redirect()->route('playlists.index');
        }
    }
}
