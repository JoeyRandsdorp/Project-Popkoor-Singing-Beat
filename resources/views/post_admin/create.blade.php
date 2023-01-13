@extends('layouts.app')

@section('title', 'Maak een nieuw bericht')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/posts">< Terug</a>
            <br><br>
            <h1>Nieuw bericht maken</h1>
            <h4>* = verplicht</h4>
            <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title" class="form-label">Titel bericht *</label>
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
                    <label for="description" class="form-label">Bijschrift bericht *</label>
                    <textarea id="description"
                              name="description"
                              class="@error('description') is-invalid @enderror form-control">{{old('description')}}</textarea>
                    @error('description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="thumbnail" class="form-label">Afbeelding toevoegen *</label>
                    <input id="thumbnail"
                           type="file"
                           name="thumbnail"
                           class="@error('thumbnail') is-invalid @enderror form-control"
                           value="{{old('thumbnail')}}"/>
                    @error('thumbnail')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="video" class="form-label">Video toevoegen</label>
                    <input id="video"
                           type="file"
                           name="video"
                           class="@error('video') is-invalid @enderror form-control"
                           value="{{old('video')}}"/>
                    @error('video')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="file" class="form-label">Bestand toevoegen</label>
                    <input id="file"
                           type="file"
                           name="file"
                           class="@error('file') is-invalid @enderror form-control"
                           value="{{old('file')}}"/>
                    @error('file')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="comments" class="form-label">Comments aan- of uitzetten</label>

                    <div class="col-md-6">
                        <input id="comments" type="hidden" name="comments" value="0">
                        <input id="comments" type="checkbox" name="comments" value="1">
                    </div>
                </div>
                <br>
                <div>
                    <label for="pinned" class="form-label">Zet bericht bovenaan vast</label>

                    <div class="col-md-6">
                        <input id="pinned" type="hidden" name="pinned" value="0">
                        <input id="pinned" type="checkbox" name="pinned" value="1">
                    </div>
                </div>
                <div>
                    <input id="date" type="hidden" name="date" value="<?php echo date("Y-m-d") ?>">
                </div>
                <div>
                    <input id="user_id" type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                </div>
                <br>
                <div>
                    <input type="submit" value="Plaats bericht">
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
