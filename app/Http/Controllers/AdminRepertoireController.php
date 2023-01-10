<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use App\Models\RepertoireSong;

class AdminRepertoireController extends Controller
{
    public function index()
    {
        $songs = RepertoireSong::query()
            ->orderByRaw('title ASC')
            ->get();

        return view('admin_repertoire.repertoire', ['songs' => $songs]);
    }

    public function create()
    {
        return view('admin_repertoire.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required', 'string', 'max:255',
            'artist' => 'required', 'string', 'max:255',
            'song' => File::types(['mp3']),
            'image' => File::types(['gif', 'GIF', 'jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG'])
        ]);

        if(request()->file('song') === null){
            $song = null;
        } else {
            $song = request()->file('song')->store('repertoire_songs');
        }

        if(request()->file('image') === null){
            $image = null;
        } else {
            $image = request()->file('image')->store('repertoire_images');
        }

        RepertoireSong::create([
            'title' => $request['title'],
            'artist' => $request['artist'],
            'song' => $song,
            'image' => $image,
            'date' => $request['date'],
            'visibility' => $request['visibility']
        ]);

        return redirect()->route('repertoire.index');
    }

    public function show($id)
    {
        $song = RepertoireSong::find($id);
        return view('admin_repertoire.details', ['song' => $song]);
    }

    public function edit($id)
    {
        $song = RepertoireSong::find($id);
        return view('admin_repertoire.edit', compact('song'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required', 'string', 'max:255',
            'artist' => 'required', 'string', 'max:255',
            'song' => File::types(['mp3']),
            'image' => File::types(['gif', 'GIF', 'jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG'])
        ]);

        $song = RepertoireSong::find($id);

        $song->title = $request->get('title');
        $song->artist = $request->get('artist');
        $song->visibility = $request->get('visibility');

        if(request()->file('song') === null){
            if(request()->file('image') === null){
                $song->save();
                return redirect()->route('repertoire.index');
            } else {
                $image = request()->file('image')->store('repertoire_images');
                $song->image = $image;

                $song->save();
                return redirect()->route('repertoire.index');
            }
        } else {
            $new_song = request()->file('song')->store('repertoire_songs');
            $song->song = $new_song;
            if(request()->file('image') !== null) {

                $image = request()->file('image')->store('repertoire_images');
                $song->image = $image;

            }
            $song->save();
            return redirect()->route('repertoire.index');
        }
    }

    public function destroy($id)
    {
        $song = RepertoireSong::find($id);
        $song->delete();
        return redirect()->route('repertoire.index');
    }
}
