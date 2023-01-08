@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{$playlist->title}}</h1>
                </div>
                <div class="card-body">
                    <br>
                    <div>
                        <a href="{{route('playlists.edit', $playlist->id)}}" class="btn btn-success">Bewerken</a>
                    </div>
                    <br>
                    <div>
                        <form action="{{route('playlists.destroy', $playlist->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Verwijder playlist</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
