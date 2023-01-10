@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('introduction.update', $introduction->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div>
                    <label for="name" class="form-label">Naam</label>
                    <input id="name"
                           type="text"
                           name="name"
                           class="@error('name') is-invalid @enderror form-control"
                           value="{{$introduction->name}}"/>
                    @error('name')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="function" class="form-label">Functie in het popkoor</label>
                    <input id="function"
                           type="text"
                           name="function"
                           class="@error('function') is-invalid @enderror form-control"
                           value="{{$introduction->function}}"/>
                    @error('function')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="introduction" class="form-label">Introductietekst</label>
                    <input id="introduction"
                           type="text"
                           name="introduction"
                           class="@error('introduction') is-invalid @enderror form-control"
                           value="{{$introduction->introduction}}"/>
                    @error('introduction')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="image" class="form-label">Foto</label>
                    <input id="image"
                           type="file"
                           name="image"
                           class="@error('image') is-invalid @enderror form-control"
                           value="{{$introduction->image}}"/>
                    @error('image')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br><br>
                <div>
                    <input type="submit" value="Bewerk introductie">
                </div>
            </form>
        </div>
    </div>
@endsection
