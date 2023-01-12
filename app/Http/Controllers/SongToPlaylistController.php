<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlaylistSong;
use App\Models\Playlist;
use Illuminate\Support\Facades\DB;

class SongToPlaylistController extends Controller
{
    public function create()
    {
        $user_id = auth()->user()?->id;

        $playlists = DB::table('playlists')
            ->where('user_id', '=', $user_id)
            ->orderByRaw('title ASC')
            ->get();

        if(count($playlists) < 1){
            return view('playlists.create');
        } else {
            return view('playlist_song.create', ['playlists' => $playlists]);
        }
    }

    public function store(Request $request)
    {
        PlaylistSong::create([
            'playlist_id' => $request['playlist_id'],
            'song_id' => $request['song_id']
        ]);

        $user_id = auth()->user()?->id;
        $playlists = DB::table('playlists')
            ->where('user_id', '=', $user_id)
            ->orderByRaw('title ASC')
            ->get();
        return view('playlists.playlists', ['playlists' => $playlists]);
    }

    public function destroy($playlist_id, $song_id)
    {
        $songOutPlaylist = PlaylistSong::where('playlist_id', $playlist_id)->where('song_id', $song_id);

        $songOutPlaylist->delete();

        $user_id = auth()->user()?->id;

        $playlists = DB::table('playlists')
            ->where('user_id', '=', $user_id)
            ->orderByRaw('title ASC')
            ->get();
        return view('playlists.playlists', ['playlists' => $playlists]);
    }
}
