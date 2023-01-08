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
                        <th>Zichtbaarheid</th>
                        <th>Verwijderen</th>
                    </tr>
                    @foreach($songs as $song)
                        <tr>
                            <th>{{$song->title}}</th>
                            <th>{{$song->artist}}</th>
                            <th><a href="{{route('songs.show', $song->id)}}">Details</a></th>
                            <th><a href="/playlist_song/create?id={{$song->id}}" class="btn btn-success">Voeg toe</a></th>
                            <th>
                                @if($song->visibility === 1)
                                    Zichtbaar
                                @else
                                    Onzichtbaar
                                @endif
                            </th>
                            <th>
                                <form action="{{route('songs.destroy', $song->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Verwijderen</button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
