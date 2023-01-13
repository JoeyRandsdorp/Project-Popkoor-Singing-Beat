@extends('layouts.app')

@section('title', 'Voeg toe aan het archief')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/archive">< Terug</a>
            <br><br>
            <h1>Voeg een onderdeel toe aan het archief</h1>
            <h4>* = verplicht</h4>
            <form action="{{route('archive.store')}}" method="post" enctype="multipart/form-data">
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
                    <label for="description" class="form-label">Omschrijving *</label>
                    <textarea id="description"
                              name="description"
                              class="@error('description') is-invalid @enderror form-control">{{old('description')}}</textarea>
                    @error('description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
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
                </div>
                <br>
                <div>
                    <label for="pdf" class="form-label">PDF-bestand *</label>
                    <input id="pdf"
                           type="file"
                           name="pdf"
                           class="@error('pdf') is-invalid @enderror form-control"
                           value="{{old('pdf')}}"/>
                    @error('pdf')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <input type="submit" value="Voeg toe aan het archief">
                </div>
            </form>
        </div>
    </div>
@endsection
