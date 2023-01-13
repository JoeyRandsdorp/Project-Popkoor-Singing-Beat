@extends('layouts.app')

@section('title', 'Voeg sponsor toe')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/sponsors">< Terug</a>
            <br><br>
            <h1>Voeg een sponsor toe</h1>
            <h4>* = verplicht</h4>
            <form action="{{route('sponsors.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="name" class="form-label">Naam sponsor *</label>
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
                    <label for="description" class="form-label">Stuk tekst over de sponsor *</label>
                    <textarea id="description"
                              name="description"
                              class="@error('description') is-invalid @enderror form-control">{{old('description')}}</textarea>
                    @error('description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="image" class="form-label">Logo van sponsor *</label>
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
                    <label for="site" class="form-label">Website van sponsor</label>
                    <input id="site"
                           type="text"
                           name="site"
                           class="@error('site') is-invalid @enderror form-control"
                           value="{{old('site')}}"/>
                    @error('site')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <input type="submit" value="Sponsor aanmaken">
                </div>
            </form>
        </div>
    </div>
@endsection
