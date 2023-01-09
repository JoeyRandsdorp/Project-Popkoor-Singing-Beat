@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('playlist_song.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="playlist_id">Kies een playlist:</label>
                    <select name="playlist_id">
                        @foreach($playlists as $playlist)
                            <option id="playlist_id" value="{{$playlist->id}}">{{$playlist->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    @php
                    $song_id = $_GET['id'];
                    @endphp
                    <input id="song_id" type="hidden" name="song_id" value="{{$song_id}}">
                </div>
                <br><br>
                <div>
                    <input type="submit" value="Voeg muzieknummer toe">
                </div>
            </form>
        </div>
    </div>
@endsection
