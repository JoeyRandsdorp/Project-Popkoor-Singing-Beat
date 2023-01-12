@extends('layouts.app')

@section('title', 'Repertoire voor leden')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Repertoire voor leden</h1>
            <a href="{{route('songs.create')}}" class="btn btn-success">Voeg een muzieknummer toe</a>
            <br><br>
            <div>
                <table class="table-bordered" style="width: 100%">
                    <tr>
                        <th>Titel</th>
                        <th>Artiest</th>
                        <th>Details</th>
                        <th>Toevoegen aan afspeellijst</th>
                        <th>Zichtbaarheid</th>
                        <th>Verwijder muzieknummer</th>
                    </tr>
                    @foreach($songs as $song)
                        <tr>
                            <td>{{$song->title}}</td>
                            <td>{{$song->artist}}</td>
                            <td><a href="{{route('songs.show', $song->id)}}" class="btn btn-secondary">Bekijken</a></td>
                            <td><a href="/playlist_song/create?id={{$song->id}}" class="btn btn-success">Voeg toe</a></td>
                            <td>
                                @if($song->visibility === 1)
                                    Zichtbaar
                                @else
                                    Onzichtbaar
                                @endif
                            </td>
                            <td>
                                <form action="{{route('songs.destroy', $song->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Verwijder</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
