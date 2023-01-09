@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Jouw playlists</h1>
            <div>
                <table class="table-bordered" style="width: 100%">
                    <tr>
                        <th>Titel</th>
                        <th>Details</th>
                    </tr>
                    @foreach($playlists as $playlist)
                        <tr>
                            <td>{{$playlist->title}}</td>
                            <td><a href="{{route('playlists.show', $playlist->id)}}">Details</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
