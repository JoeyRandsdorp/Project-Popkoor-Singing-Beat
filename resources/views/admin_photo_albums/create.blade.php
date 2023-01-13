@extends('layouts.app')

@section('title', 'Maak een nieuw fotoalbum')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/photo_albums">< Terug</a>
            <br><br>
            <h1>Maak een nieuw fotoalbum aan</h1>
            <h4>* = verplicht</h4>
            <form action="{{route('photo_albums.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="date" class="form-label">Datum *</label>
                    <input id="date"
                           type="date"
                           name="date"
                           class="@error('date') is-invalid @enderror form-control"
                           value="{{old('date')}}"/>
                    @error('date')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="title" class="form-label">Titel *</label>
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
                    <label for="description" class="form-label">Omschrijving *</label>
                    <input id="description"
                           type="text"
                           name="description"
                           class="@error('description') is-invalid @enderror form-control"
                           value="{{old('description')}}"/>
                    @error('description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <input type="submit" value="Maak fotoalbum aan">
                </div>
            </form>
        </div>
    </div>
@endsection
