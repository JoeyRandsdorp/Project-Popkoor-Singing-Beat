<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use Illuminate\Support\Facades\DB;

class PlaylistController extends Controller
{
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
        $playlist = Playlist::find($id);
        return view('playlists.details', compact('playlist'));
    }

    public function edit($id)
    {
        $playlist = Playlist::find($id);
        return view('playlists.edit', compact('playlist'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required', 'string', 'max:255'
        ]);

        $playlist = Playlist::find($id);
        $playlist->title = $request->get('title');
        $playlist->save();
        return redirect()->route('playlists.index');
    }

    public function destroy($id)
    {
        $playlist = Playlist::find($id);
        $playlist->delete();
        return redirect()->route('playlists.index');
    }
}
