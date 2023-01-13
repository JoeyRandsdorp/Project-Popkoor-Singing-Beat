@extends('layouts.app')

@section('title', 'Contactpagina bewerken')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/contact">< Terug</a>
            <br><br>
            <h1>Bewerk de inhoud van de contactpagina</h1>
            <h4>Upload alleen een nieuwe foto als je deze wilt vervangen/toevoegen</h4>
            <form action="{{route('contact.update', $contactPage->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div>
                    <label for="title" class="form-label">Titel op de contactpagina</label>
                    <input id="title"
                           type="text"
                           name="title"
                           class="@error('title') is-invalid @enderror form-control"
                           value="{{$contactPage->title}}"/>
                    @error('title')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="description" class="form-label">Tekst op de contactpagina</label>
                    <input id="description"
                           type="text"
                           name="description"
                           class="@error('description') is-invalid @enderror form-control"
                           value="{{$contactPage->description}}"/>
                    @error('description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="image" class="form-label">Afbeelding toevoegen voor op de contactpagina</label>
                    <input id="image"
                           type="file"
                           name="image"
                           class="@error('image') is-invalid @enderror form-control"
                           value="{{$contactPage->image}}"/>
                    @error('image')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <input type="submit" value="Bewerk contactpagina">
                </div>
            </form>
        </div>
    </div>
@endsection
