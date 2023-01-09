@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{$playlist->title}}</h1>
                </div>
                <div class="card-body">
                    <table class="table-bordered" style="width: 100%;">
                        <tr>
                            <th>Titel</th>
                            <th>Artiest</th>
                            <th>Details</th>
                            <th>Verwijderen uit afspeellijst</th>
                        </tr>
                        @foreach($playlist_songs as $playlist_song)
                            <tr>
                                @php
                                    $song = App\Http\Controllers\PlaylistController::getSongData($playlist_song->song_id);
                                @endphp
                                <td>{{$song->title}}</td>
                                <td>{{$song->artist}}</td>
                                <td>
                                    @if(auth()->user()?->admin_role === 1)
                                        <a href="{{route('songs.show', $song->id)}}">Details</a>
                                    @else
                                        <a href="/songs/{{$song->id}}">Details</a>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('delete-song-playlist', ['playlist_id' => $playlist->id, 'song_id' => $song->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Verwijder uit deze afspeellijst</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="card-body">
                    <br>
                    <div>
                        <a href="{{route('playlists.edit', $playlist->id)}}" class="btn btn-success">Afspeellijst bewerken</a>
                    </div>
                    <br>
                    <div>
                        <form action="{{route('playlists.destroy', $playlist->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Afspeellijst verwijderen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
