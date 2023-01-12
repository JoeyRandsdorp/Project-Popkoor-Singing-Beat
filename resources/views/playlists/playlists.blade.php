@extends('layouts.app')

@section('title', 'Playlists')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Jouw playlists</h1>
            <div>
                <table class="table-bordered" style="width: 100%">
                    <tr>
                        <th>Titel</th>
                        <th>Open playlist</th>
                    </tr>
                    @foreach($playlists as $playlist)
                        <tr>
                            <td>{{$playlist->title}}</td>
                            <td><a href="{{route('playlists.show', $playlist->id)}}" class="btn btn-success">Openen</a></td>
                        </tr>
                    @endforeach
                </table>
                <br>
                <a href="{{route('playlists.create')}}" class="btn btn-success">Maak een nieuwe afspeellijst</a>
            </div>
        </div>
    </div>
@endsection
