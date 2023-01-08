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
                            <th>{{$playlist->title}}</th>
                            <th><a href="{{route('playlists.show', $playlist->id)}}">Details</a></th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
