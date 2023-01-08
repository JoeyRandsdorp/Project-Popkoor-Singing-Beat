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
                            <th>{{$song->title}}</th>
                            <th>{{$song->artist}}</th>
                            <th><a href="/songs/{{$song->id}}">Details</a></th>
                            <th><a href="/playlist_song/create?id={{$song->id}}" class="btn btn-success">Voeg toe</a></th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
