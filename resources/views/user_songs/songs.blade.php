@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Alle nummers</h1>
            <div>
                <table class="table-bordered" style="width: 100%">
                    <tr>
                        <th>Titel</th>
                        <th>Artiest</th>
                        <th>Details</th>
                        <th>Toevoegen aan afspeellijst</th>
                    </tr>
                    @foreach($songs as $song)
                        <tr>
                            <td>{{$song->title}}</td>
                            <td>{{$song->artist}}</td>
                            <td><a href="/songs/{{$song->id}}">Details</a></td>
                            <td><a href="/playlist_song/create?id={{$song->id}}" class="btn btn-success">Voeg toe</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
