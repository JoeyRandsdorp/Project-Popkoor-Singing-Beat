@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/songs">< Terug</a>
            <br><br>
            <h1>Bewerk het muzieknummer {{$song->title}}</h1>
            <h4>Kies alleen bestanden die je wilt vervangen/toevoegen</h4>
            <form action="{{route('songs.update', $song->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div>
                    <label for="title" class="form-label">Titel</label>
                    <input id="title"
                           type="text"
                           name="title"
                           class="@error('title') is-invalid @enderror form-control"
                           value="{{$song->title}}"/>
                    @error('title')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="artist" class="form-label">Artiest</label>
                    <input id="artist"
                           type="text"
                           name="artist"
                           class="@error('artist') is-invalid @enderror form-control"
                           value="{{$song->artist}}"/>
                    @error('artist')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="full_song" class="form-label">Volledige nummer</label>
                    <input id="full_song"
                           type="file"
                           name="full_song"
                           class="@error('full_song') is-invalid @enderror form-control"
                           value="{{$song->full_song}}"/>
                    @error('full_song')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="image" class="form-label">Afbeelding</label>
                    <input id="image"
                           type="file"
                           name="image"
                           class="@error('image') is-invalid @enderror form-control"
                           value="{{$song->image}}"/>
                    @error('image')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="lyrics" class="form-label">Songtekst</label>
                    <input id="lyrics"
                           type="file"
                           name="lyrics"
                           class="@error('lyrics') is-invalid @enderror form-control"
                           value="{{$song->lyrics}}"/>
                    @error('lyrics')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="translation" class="form-label">Vertaling songtekst</label>
                    <input id="translation"
                           type="file"
                           name="translation"
                           class="@error('translation') is-invalid @enderror form-control"
                           value="{{$song->translation}}"/>
                    @error('translation')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="sheet_music" class="form-label">Bladmuziek</label>
                    <input id="sheet_music"
                           type="file"
                           name="sheet_music"
                           class="@error('sheet_music') is-invalid @enderror form-control"
                           value="{{$song->sheet_music}}"/>
                    @error('sheet_music')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="visibility" class="form-label">Zichtbaarheid aanpassen</label>
                    <div class="col-md-6">
                        <input id="visibility" type="hidden" name="visibility" value="0">
                        @if ($song->visibility === 0)
                            <input id="visibility" type="checkbox" name="visibility" value="1">
                        @else
                            <input id="visibility" type="checkbox" name="visibility" value="1" checked>
                        @endif
                    </div>
                </div>
                <div>
                    <input type="submit" value="Wijzigingen opslaan">
                </div>
            </form>
        </div>
    </div>
@endsection
