@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('songs.update', $song->id)}}" method="post">
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
