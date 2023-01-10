<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;
use App\Models\Song;

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
            'lyrics' => File::types(['pdf', 'PDF']),
            'translation' => File::types(['pdf', 'PDF']),
            'sheet_music' => File::types(['pdf', 'PDF']),
            'full_song' => 'required', File::types(['mp3']),
            'image' => 'required', File::types(['gif', 'GIF', 'jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG'])
        ]);

        if(request()->file('lyrics') === null){
            $lyrics = null;
        } else {
            $lyrics = request()->file('lyrics')->store('lyrics');
        }

        if(request()->file('translation') === null){
            $translation = null;
        } else {
            $translation = request()->file('translation')->store('translations');
        }

        if(request()->file('sheet_music') === null){
            $sheet_music = null;
        } else {
            $sheet_music = request()->file('sheet_music')->store('sheet_music');
        }

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
            'date' => $request['date'],
            'visibility' => $request['visibility']
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
            'artist' => 'required', 'string', 'max:255',
            'lyrics' => File::types(['pdf', 'PDF']),
            'translation' => File::types(['pdf', 'PDF']),
            'sheet_music' => File::types(['pdf', 'PDF']),
            'full_song' => File::types(['mp3']),
            'image' => File::types(['gif', 'GIF', 'jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG'])
        ]);

        $song = Song::find($id);

        $song->title = $request->get('title');
        $song->artist = $request->get('artist');
        $song->visibility = $request->get('visibility');

        if(request()->file('lyrics') === null){
            if(request()->file('translation') === null){
                if(request()->file('sheet_music') === null){
                    if(request()->file('full_song') === null){
                        if(request()->file('image') === null){
                            $song->save();
                            return redirect()->route('songs.index');
                        } else {
                            $image = request()->file('image')->store('images');
                            $song->image = $image;

                            $song->save();
                            return redirect()->route('songs.index');
                        }
                    } else {
                        if(request()->file('image') === null){
                            $full_song = request()->file('full_song')->store('full_songs');
                            $song->full_song = $full_song;

                            $song->save();
                            return redirect()->route('songs.index');
                        } else {
                            $full_song = request()->file('full_song')->store('full_songs');
                            $song->full_song = $full_song;

                            $image = request()->file('image')->store('images');
                            $song->image = $image;

                            $song->save();
                            return redirect()->route('songs.index');
                        }
                    }
                } else {
                    if(request()->file('full_song') === null){
                        if(request()->file('image') === null){
                            $sheet_music = request()->file('sheet_music')->store('sheet_music');
                            $song->sheet_music = $sheet_music;

                            $song->save();
                            return redirect()->route('songs.index');
                        } else {
                            $sheet_music = request()->file('sheet_music')->store('sheet_music');
                            $song->sheet_music = $sheet_music;

                            $image = request()->file('image')->store('images');
                            $song->image = $image;

                            $song->save();
                            return redirect()->route('songs.index');
                        }
                    } else {
                        if(request()->file('image') === null){
                            $sheet_music = request()->file('sheet_music')->store('sheet_music');
                            $song->sheet_music = $sheet_music;

                            $full_song = request()->file('full_song')->store('full_songs');
                            $song->full_song = $full_song;

                            $song->save();
                            return redirect()->route('songs.index');
                        } else {
                            $sheet_music = request()->file('sheet_music')->store('sheet_music');
                            $song->sheet_music = $sheet_music;

                            $full_song = request()->file('full_song')->store('full_songs');
                            $song->full_song = $full_song;

                            $image = request()->file('image')->store('images');
                            $song->image = $image;

                            $song->save();
                            return redirect()->route('songs.index');
                        }
                    }
                }
            } else {
                if(request()->file('sheet_music') === null){
                    if(request()->file('full_song') === null){
                        if(request()->file('image') === null){
                            $translation = request()->file('translation')->store('translations');
                            $song->translation = $translation;

                            $song->save();
                            return redirect()->route('songs.index');
                        } else {
                            $translation = request()->file('translation')->store('translations');
                            $song->translation = $translation;

                            $image = request()->file('image')->store('images');
                            $song->image = $image;

                            $song->save();
                            return redirect()->route('songs.index');
                        }
                    } else {
                        if(request()->file('image') === null){
                            $translation = request()->file('translation')->store('translations');
                            $song->translation = $translation;

                            $full_song = request()->file('full_song')->store('full_songs');
                            $song->full_song = $full_song;

                            $song->save();
                            return redirect()->route('songs.index');
                        } else {
                            $translation = request()->file('translation')->store('translations');
                            $song->translation = $translation;

                            $full_song = request()->file('full_song')->store('full_songs');
                            $song->full_song = $full_song;

                            $image = request()->file('image')->store('images');
                            $song->image = $image;

                            $song->save();
                            return redirect()->route('songs.index');
                        }
                    }
                } else {
                    if(request()->file('full_song') === null){
                        if(request()->file('image') === null){
                            $translation = request()->file('translation')->store('translations');
                            $song->translation = $translation;

                            $sheet_music = request()->file('sheet_music')->store('sheet_music');
                            $song->sheet_music = $sheet_music;

                            $song->save();
                            return redirect()->route('songs.index');
                        } else {
                            $translation = request()->file('translation')->store('translations');
                            $song->translation = $translation;

                            $sheet_music = request()->file('sheet_music')->store('sheet_music');
                            $song->sheet_music = $sheet_music;

                            $image = request()->file('image')->store('images');
                            $song->image = $image;

                            $song->save();
                            return redirect()->route('songs.index');
                        }
                    } else {
                        if(request()->file('image') === null){
                            $translation = request()->file('translation')->store('translations');
                            $song->translation = $translation;

                            $sheet_music = request()->file('sheet_music')->store('sheet_music');
                            $song->sheet_music = $sheet_music;

                            $full_song = request()->file('full_song')->store('full_songs');
                            $song->full_song = $full_song;

                            $song->save();
                            return redirect()->route('songs.index');
                        } else {
                            $translation = request()->file('translation')->store('translations');
                            $song->translation = $translation;

                            $sheet_music = request()->file('sheet_music')->store('sheet_music');
                            $song->sheet_music = $sheet_music;

                            $full_song = request()->file('full_song')->store('full_songs');
                            $song->full_song = $full_song;

                            $image = request()->file('image')->store('images');
                            $song->image = $image;

                            $song->save();
                            return redirect()->route('songs.index');
                        }
                    }
                }
            }
        } else {
            if(request()->file('translation') === null){
                if(request()->file('sheet_music') === null){
                    if(request()->file('full_song') === null){
                        if(request()->file('image') === null){
                            $lyrics = request()->file('lyrics')->store('lyrics');
                            $song->lyrics = $lyrics;

                            $song->save();
                            return redirect()->route('songs.index');
                        } else {
                            $lyrics = request()->file('lyrics')->store('lyrics');
                            $song->lyrics = $lyrics;

                            $image = request()->file('image')->store('images');
                            $song->image = $image;

                            $song->save();
                            return redirect()->route('songs.index');
                        }
                    } else {
                        if(request()->file('image') === null){
                            $lyrics = request()->file('lyrics')->store('lyrics');
                            $song->lyrics = $lyrics;

                            $full_song = request()->file('full_song')->store('full_songs');
                            $song->full_song = $full_song;

                            $song->save();
                            return redirect()->route('songs.index');
                        } else {
                            $lyrics = request()->file('lyrics')->store('lyrics');
                            $song->lyrics = $lyrics;

                            $full_song = request()->file('full_song')->store('full_songs');
                            $song->full_song = $full_song;

                            $image = request()->file('image')->store('images');
                            $song->image = $image;

                            $song->save();
                            return redirect()->route('songs.index');
                        }
                    }
                } else {
                    if(request()->file('full_song') === null){
                        if(request()->file('image') === null){
                            $lyrics = request()->file('lyrics')->store('lyrics');
                            $song->lyrics = $lyrics;

                            $sheet_music = request()->file('sheet_music')->store('sheet_music');
                            $song->sheet_music = $sheet_music;

                            $song->save();
                            return redirect()->route('songs.index');
                        } else {
                            $lyrics = request()->file('lyrics')->store('lyrics');
                            $song->lyrics = $lyrics;

                            $sheet_music = request()->file('sheet_music')->store('sheet_music');
                            $song->sheet_music = $sheet_music;

                            $image = request()->file('image')->store('images');
                            $song->image = $image;

                            $song->save();
                            return redirect()->route('songs.index');
                        }
                    } else {
                        if(request()->file('image') === null){
                            $lyrics = request()->file('lyrics')->store('lyrics');
                            $song->lyrics = $lyrics;

                            $sheet_music = request()->file('sheet_music')->store('sheet_music');
                            $song->sheet_music = $sheet_music;

                            $full_song = request()->file('full_song')->store('full_songs');
                            $song->full_song = $full_song;

                            $song->save();
                            return redirect()->route('songs.index');
                        } else {
                            $lyrics = request()->file('lyrics')->store('lyrics');
                            $song->lyrics = $lyrics;

                            $sheet_music = request()->file('sheet_music')->store('sheet_music');
                            $song->sheet_music = $sheet_music;

                            $full_song = request()->file('full_song')->store('full_songs');
                            $song->full_song = $full_song;

                            $image = request()->file('image')->store('images');
                            $song->image = $image;

                            $song->save();
                            return redirect()->route('songs.index');
                        }
                    }
                }
            } else {
                if(request()->file('sheet_music') === null){
                    if(request()->file('full_song') === null){
                        if(request()->file('image') === null){
                            $lyrics = request()->file('lyrics')->store('lyrics');
                            $song->lyrics = $lyrics;

                            $translation = request()->file('translation')->store('translations');
                            $song->translation = $translation;

                            $song->save();
                            return redirect()->route('songs.index');
                        } else {
                            $lyrics = request()->file('lyrics')->store('lyrics');
                            $song->lyrics = $lyrics;

                            $translation = request()->file('translation')->store('translations');
                            $song->translation = $translation;

                            $image = request()->file('image')->store('images');
                            $song->image = $image;

                            $song->save();
                            return redirect()->route('songs.index');
                        }
                    } else {
                        if(request()->file('image') === null){
                            $lyrics = request()->file('lyrics')->store('lyrics');
                            $song->lyrics = $lyrics;

                            $translation = request()->file('translation')->store('translations');
                            $song->translation = $translation;

                            $full_song = request()->file('full_song')->store('full_songs');
                            $song->full_song = $full_song;

                            $song->save();
                            return redirect()->route('songs.index');
                        } else {
                            $lyrics = request()->file('lyrics')->store('lyrics');
                            $song->lyrics = $lyrics;

                            $translation = request()->file('translation')->store('translations');
                            $song->translation = $translation;

                            $full_song = request()->file('full_song')->store('full_songs');
                            $song->full_song = $full_song;

                            $image = request()->file('image')->store('images');
                            $song->image = $image;

                            $song->save();
                            return redirect()->route('songs.index');
                        }
                    }
                } else {
                    if(request()->file('full_song') === null){
                        if(request()->file('image') === null){
                            $lyrics = request()->file('lyrics')->store('lyrics');
                            $song->lyrics = $lyrics;

                            $translation = request()->file('translation')->store('translations');
                            $song->translation = $translation;

                            $sheet_music = request()->file('sheet_music')->store('sheet_music');
                            $song->sheet_music = $sheet_music;

                            $song->save();
                            return redirect()->route('songs.index');
                        } else {
                            $lyrics = request()->file('lyrics')->store('lyrics');
                            $song->lyrics = $lyrics;

                            $translation = request()->file('translation')->store('translations');
                            $song->translation = $translation;

                            $sheet_music = request()->file('sheet_music')->store('sheet_music');
                            $song->sheet_music = $sheet_music;

                            $image = request()->file('image')->store('images');
                            $song->image = $image;

                            $song->save();
                            return redirect()->route('songs.index');
                        }
                    } else {
                        if(request()->file('image') === null){
                            $lyrics = request()->file('lyrics')->store('lyrics');
                            $song->lyrics = $lyrics;

                            $translation = request()->file('translation')->store('translations');
                            $song->translation = $translation;

                            $sheet_music = request()->file('sheet_music')->store('sheet_music');
                            $song->sheet_music = $sheet_music;

                            $full_song = request()->file('full_song')->store('full_songs');
                            $song->full_song = $full_song;

                            $song->save();
                            return redirect()->route('songs.index');
                        } else {
                            $lyrics = request()->file('lyrics')->store('lyrics');
                            $song->lyrics = $lyrics;

                            $translation = request()->file('translation')->store('translations');
                            $song->translation = $translation;

                            $sheet_music = request()->file('sheet_music')->store('sheet_music');
                            $song->sheet_music = $sheet_music;

                            $full_song = request()->file('full_song')->store('full_songs');
                            $song->full_song = $full_song;

                            $image = request()->file('image')->store('images');
                            $song->image = $image;

                            $song->save();
                            return redirect()->route('songs.index');
                        }
                    }
                }
            }
        }
    }

    public function destroy($id)
    {
        $song = Song::find($id);
        $song->delete();
        return redirect()->route('songs.index');
    }
}
