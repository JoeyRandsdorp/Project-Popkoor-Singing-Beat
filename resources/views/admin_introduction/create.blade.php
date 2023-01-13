@extends('layouts.app')

@section('title', 'Introductie maken')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/introduction">< Terug</a>
            <br><br>
            <h1>Maak een nieuwe introductie</h1>
            <h4>* = verplicht</h4>
            <form action="{{route('introduction.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="name" class="form-label">Naam *</label>
                    <input id="name"
                           type="text"
                           name="name"
                           class="@error('name') is-invalid @enderror form-control"
                           value="{{old('name')}}"/>
                    @error('name')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="function" class="form-label">Functie in het popkoor *</label>
                    <input id="function"
                           type="text"
                           name="function"
                           class="@error('function') is-invalid @enderror form-control"
                           value="{{old('function')}}"/>
                    @error('function')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="introduction" class="form-label">Introductietekst *</label>
                    <textarea id="introduction"
                              name="introduction"
                              class="@error('introduction') is-invalid @enderror form-control">{{old('introduction')}}</textarea>
                    @error('introduction')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="image" class="form-label">Profielfoto *</label>
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
                    <input type="submit" value="Maak introductie">
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
