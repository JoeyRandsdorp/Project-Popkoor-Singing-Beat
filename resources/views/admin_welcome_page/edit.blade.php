@extends('layouts.app')

@section('title', 'Welkomstpagina bewerken')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/welcome">< Terug</a>
            <br><br>
            <h1>Bewerk de inhoud van de welkomstpagina</h1>
            <h4>Upload alleen een nieuwe foto als je deze wilt vervangen/toevoegen</h4>
            <form action="{{route('welcome.update', $welcomePage->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div>
                    <label for="title" class="form-label">Titel op de welkomstpagina</label>
                    <input id="title"
                           type="text"
                           name="title"
                           class="@error('title') is-invalid @enderror form-control"
                           value="{{$welcomePage->title}}"/>
                    @error('title')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="description" class="form-label">Tekst op de welkomstpagina</label>
                    <input id="description"
                           type="text"
                           name="description"
                           class="@error('description') is-invalid @enderror form-control"
                           value="{{$welcomePage->description}}"/>
                    @error('description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="image" class="form-label">Afbeelding toevoegen voor op de welkomstpagina</label>
                    <input id="image"
                           type="file"
                           name="image"
                           class="@error('image') is-invalid @enderror form-control"
                           value="{{$welcomePage->image}}"/>
                    @error('image')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <input type="submit" value="Bewerk welkomstpagina">
                </div>
            </form>
        </div>
    </div>
@endsection
