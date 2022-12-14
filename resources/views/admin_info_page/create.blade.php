@extends('layouts.app')

@section('title', 'Maak inhoud voor de informatiepagina')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/info">< Terug</a>
            <br><br>
            <h1>Maak nieuwe inhoud voor de informatiepagina</h1>
            <h4>* = verplicht</h4>
            <form action="{{route('info.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title" class="form-label">Titel op de informatiepagina *</label>
                    <input id="title"
                           type="text"
                           name="title"
                           class="@error('title') is-invalid @enderror form-control"
                           value="{{old('title')}}"/>
                    @error('title')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="description" class="form-label">Tekst op de informatiepagina *</label>
                    <textarea id="description"
                              name="description"
                              class="@error('description') is-invalid @enderror form-control">{{old('description')}}</textarea>
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
                           value="{{old('image')}}"/>
                    @error('image')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <input type="submit" value="Plaats op de informatiepagina">
                </div>
            </form>
        </div>
    </div>
@endsection
