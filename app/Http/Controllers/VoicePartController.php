<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use App\Models\VoicePart;

class VoicePartController extends Controller
{
    public function create()
    {
        $voice_parts = VoicePart::all();
        return view('admin_songs.voice_part');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required', 'string', 'max:255',
            'sound' => 'required', File::types(['mp3', 'wav', 'aac', 'ogg', 'aiff', 'flac'])
        ]);

        $sound = request()->file('sound')->store('voice_parts');

        VoicePart::create([
            'song_id' => $request['song_id'],
            'title' => $request['title'],
            'sound' => $sound
        ]);

        return redirect()->route('songs.index');
    }

    public function destroy($id)
    {
        $voice_part = VoicePart::find($id);
        $voice_part->delete();
        return redirect()->route('songs.index');
    }
}
