<?php

namespace App\Http\Controllers;

use App\Models\RepertoireSong;

class RepertoireController extends Controller
{
    public function index()
    {
        $songs = RepertoireSong::query()
            ->where('visibility', '=', 1)
            ->orderByRaw('title ASC')
            ->get();
        return view('repertoire', ['songs' => $songs]);
    }

    public function show($id)
    {
        $song = RepertoireSong::find($id);

        if($song->visibility !== 1){
            $songs = RepertoireSong::query()
                ->where('visibility', '=', 1)
                ->orderByRaw('title ASC')
                ->get();
            return view('repertoire', ['songs' => $songs]);
        } else {
            return view('repertoire_details', ['song' => $song]);
        }
    }
}
