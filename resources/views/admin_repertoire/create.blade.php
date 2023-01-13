@extends('layouts.app')

@section('title', 'Voeg een muzieknummer toe')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/repertoire">< Terug</a>
            <br><br>
            <h1>Voeg een muzieknummer toe aan het bezoekersrepertoire</h1>
            <h4>* = verplicht</h4>
            <form action="{{route('repertoire.store')}}" method="post" enctype="multipart/form-data">
                @csrf
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
                    <label for="artist" class="form-label">Artiest *</label>
                    <input id="artist"
                           type="text"
                           name="artist"
                           class="@error('artist') is-invalid @enderror form-control"
                           value="{{old('artist')}}"/>
                    @error('artist')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="song" class="form-label">Demo van het nummer</label>
                    <input id="song"
                           type="file"
                           name="song"
                           class="@error('song') is-invalid @enderror form-control"
                           value="{{old('song')}}"/>
                    @error('song')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="image" class="form-label">Afbeelding</label>
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
                    <label for="visibility" class="form-label">Zichtbaarheid (aanvinken betekent zichtbaar voor alle gebruikers)</label>
                    <div class="col-md-6">
                        <input id="visibility" type="hidden" name="visibility" value="0">
                        <input id="visibility" type="checkbox" name="visibility" value="1">
                    </div>
                </div>
                <div>
                    <input id="date" type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <br>
                <div>
                    <input type="submit" value="Maak muzieknummer aan">
                </div>
            </form>
        </div>
    </div>
@endsection
