@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{$song->artist}} - {{$song->title}}</h1>
                </div>
                <div class="card-body">
                    <div class="card-image">
                        <img style="width: 50%;" src="{{ asset('storage/'. $song->image) }}" alt="">
                    </div>
                    <br>
                    <div>
                        <audio controls style="width: 100%;">
                            <source src="{{ asset('storage/' . $song->full_song) }}" type="audio/mpeg">
                        </audio>
                    </div>
                    <br>
                    <div>
                        <embed src="{{ asset('storage/' . $song->lyrics) }}">
                    </div>
                    <br>
                    <div>
                        <embed src="{{ asset('storage/' . $song->translation) }}">
                    </div>
                    <br>
                    <div>
                        <embed src="{{ asset('storage/' . $song->sheet_music) }}">
                    </div>
                    <br>
                    <div>
                        <a href="{{route('songs.edit', $song->id)}}" class="btn btn-success">Bewerken</a>
                    </div>
                    <br>
                    <div>
                        <form action="{{route('songs.destroy', $song->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Verwijderen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
