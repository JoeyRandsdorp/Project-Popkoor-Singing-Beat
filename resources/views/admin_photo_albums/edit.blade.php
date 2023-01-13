@extends('layouts.app')

@section('title', 'Bewerk het fotoalbum: ' . $photoAlbum->title)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/photo_albums/{{$photoAlbum->id}}">< Terug</a>
            <br><br>
            <h1>Bewerk het fotoalbum '{{$photoAlbum->title}}'</h1>
            <form action="{{route('photo_albums.update', $photoAlbum->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div>
                    <label for="date" class="form-label">Datum</label>
                    <input id="date"
                           type="date"
                           name="date"
                           class="@error('date') is-invalid @enderror form-control"
                           value="{{$photoAlbum->date}}"/>
                    @error('date')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="title" class="form-label">Titel</label>
                    <input id="title"
                           type="text"
                           name="title"
                           class="@error('title') is-invalid @enderror form-control"
                           value="{{$photoAlbum->title}}"/>
                    @error('title')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="description" class="form-label">Omschrijving</label>
                    <input id="description"
                           type="text"
                           name="description"
                           class="@error('description') is-invalid @enderror form-control"
                           value="{{$photoAlbum->description}}"/>
                    @error('description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <input type="submit" value="Wijzigingen opslaan">
                </div>
            </form>
        </div>
    </div>
@endsection
