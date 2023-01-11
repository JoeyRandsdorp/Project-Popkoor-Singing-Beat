@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('archive.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title" class="form-label">Titel</label>
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
                    <label for="description" class="form-label">Omschrijving</label>
                    <textarea id="description"
                              name="description"
                              class="@error('description') is-invalid @enderror form-control">{{old('description')}}</textarea>
                    @error('description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <div>
                        <label for="date" class="form-label">Datum</label>
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
                <div>
                    <label for="pdf" class="form-label">PDF-bestand</label>
                    <input id="pdf"
                           type="file"
                           name="pdf"
                           class="@error('pdf') is-invalid @enderror form-control"
                           value="{{old('pdf')}}"/>
                    @error('pdf')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br><br>
                <div>
                    <input type="submit" value="Voeg toe aan het archief">
                </div>
            </form>
        </div>
    </div>
@endsection
