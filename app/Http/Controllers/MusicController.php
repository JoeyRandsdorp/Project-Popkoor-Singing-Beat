<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MusicController extends Controller
{
    public function index()
    {
        $songs = Song::query()
            ->where('visibility', '=', 1)
            ->orderByRaw('title ASC')
            ->get();
        return view('user_songs.songs', ['songs' => $songs]);
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

        if($song->visibility !== 1){
            $songs = Song::query()
                ->where('visibility', '=', 1)
                ->orderByRaw('title ASC')
                ->get();
            return view('user_songs.songs', ['songs' => $songs]);
        } else {
            return view('user_songs.details', ['song' => $song], ['voice_parts' => $voice_parts]);
        }
    }
}
