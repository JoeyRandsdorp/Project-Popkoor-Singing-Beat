@extends('layouts.app')

@section('title', 'Informatiepagina bewerken')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/info">< Terug</a>
            <br><br>
            <h1>Bewerk de inhoud van de Informatiepagina</h1>
            <h4>Upload alleen een nieuwe foto als je deze wilt vervangen/toevoegen</h4>
            <form action="{{route('info.update', $infoPage->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div>
                    <label for="title" class="form-label">Titel op de informatiepagina</label>
                    <input id="title"
                           type="text"
                           name="title"
                           class="@error('title') is-invalid @enderror form-control"
                           value="{{$infoPage->title}}"/>
                    @error('title')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="description" class="form-label">Tekst op de informatiepagina</label>
                    <input id="description"
                           type="text"
                           name="description"
                           class="@error('description') is-invalid @enderror form-control"
                           value="{{$infoPage->description}}"/>
                    @error('description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="image" class="form-label">Afbeelding toevoegen voor op de informatiepagina</label>
                    <input id="image"
                           type="file"
                           name="image"
                           class="@error('image') is-invalid @enderror form-control"
                           value="{{$infoPage->image}}"/>
                    @error('image')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <input type="submit" value="Bewerk informatiepagina">
                </div>
            </form>
        </div>
    </div>
@endsection
