@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('welcome.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title" class="form-label">Titel op de welkomstpagina</label>
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
                    <h2>Hulpmiddelen voor het schrijven van de tekst:</h2>
                    <p>Tekst tussen twee * * wordt <i>schuingedrukt</i>: *schuingedrukt* = <i>schuingedrukt</i></p>
                    <p>Tekst tussen twee ** ** wordt <b>dikgedrukt</b>: **dikgedrukt** = <b>dikgedrukt</b></p>
                    <p>
                        Om een <a href="#">link in de tekst</a> te zetten schrijf de link tussen [ ] en daarachter tussen
                        ( ) de url: [link in de tekst](http://url.com/) = <a href="#">link in de tekst</a>
                    </p>
                    <div>
                        Om <h4>een kopje</h4> te maken gebruik je twee # # en hoe meer #'s er worden gebruikt,
                        hoe kleiner het kopje wordt (één # is kop 1, twee #'s is kop 2, enz.): #Een kopje# = <h4>Een kopje</h4>
                    </div><br>
                    <p>
                        Om een lijst te maken type je gewoon 1. Voorbeeld, 2. Voorbeeld 2, etc.
                        Voor een lijst zonder nummers gebruik je * Voorbeeld, * Voorbeeld 2, etc.
                    </p>
                </div>
                <div>
                    <label for="description" class="form-label">Tekst op de welkomstpagina</label>
                    <textarea id="description"
                              name="description"
                              class="@error('description') is-invalid @enderror form-control">{{old('description')}}</textarea>
                    @error('description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="image" class="form-label">Afbeelding toevoegen voor op de welkomstpagina</label>
                    <input id="image"
                           type="file"
                           name="image"
                           class="@error('image') is-invalid @enderror form-control"
                           value="{{old('image')}}"/>
                    @error('image')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br><br>
                <div>
                    <input type="submit" value="Plaats op de welkomstpagina">
                </div>
            </form>
        </div>
    </div>
@endsection
