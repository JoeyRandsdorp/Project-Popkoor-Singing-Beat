@extends('layouts.app')

@section('title', 'Maak een nieuwe afspeellijst')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/playlists">< Terug</a>
            <br><br>
            <h1>Maak een playlist</h1>
            <form action="{{route('playlists.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title" class="form-label">Titel</label>
                    <input id="title"
                           type="text"
                           name="title"
                           class="@error('title') is-invalid @enderror form-control"
                           value="{{old('title')}}"/>
                    @error('title')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <input type="submit" value="Maak afspeellijst">
                </div>
            </form>
        </div>
    </div>
@endsection
