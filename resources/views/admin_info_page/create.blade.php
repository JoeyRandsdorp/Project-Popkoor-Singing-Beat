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
                <br>
                <div>
                    <label for="description" class="form-label">Tekst op de informatiepagina *</label>
                    <textarea id="description"
                              name="description"
                              class="@error('description') is-invalid @enderror form-control">{{old('description')}}</textarea>
                    @error('description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
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
        <div class="col-md-2">
            <div>
                <h2>Hulpmiddelen voor het schrijven van de tekst:</h2>
                <div>
                    <h4>Dikgedrukt:</h4>
                    <p>Tekst tussen twee * * wordt <i>schuingedrukt</i>: *schuingedrukt* = <i>schuingedrukt</i></p>
                </div>
                <div>
                    <h4>Schuingedrukt:</h4>
                    <p>Tekst tussen twee ** ** wordt <b>dikgedrukt</b>: **dikgedrukt** = <b>dikgedrukt</b></p>
                </div>
                <div>
                    <h4>Linkjes:</h4>
                    <p>
                        Om een <a href="#">link in de tekst</a> te zetten schrijf de link tussen [ ] en daarachter tussen
                        ( ) de url: [link in de tekst](http://url.com/) = <a href="#">link in de tekst</a>
                    </p>
                </div>
                <div>
                    <h4>Kopjes:</h4>
                    Om <b style="font-size: 20px">een kopje</b> te maken gebruik je twee # # en hoe meer #'s er worden gebruikt,
                    hoe kleiner het kopje wordt (één # is kop 1, twee #'s is kop 2, enz.): #Een kopje# =
                    <b style="font-size: 20px">Een kopje</b>
                </div>
                <br>
                <div>
                    <h4>Lijsten:</h4>
                    <p>
                        Om een lijst te maken type je gewoon
                    </p>
                    <p>
                        1. Voorbeeld,
                    </p>
                    <p>
                        2. Voorbeeld 2, etc.
                    </p>
                    <p>
                        Voor een lijst zonder nummers gebruik je
                    </p>
                    <p>
                        * Voorbeeld,
                    </p>
                    <p>
                        * Voorbeeld 2, etc.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
