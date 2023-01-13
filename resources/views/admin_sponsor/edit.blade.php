@extends('layouts.app')

@section('title', 'Bewerk: ' . $sponsor->name)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/sponsors/{{$sponsor->id}}">< Terug</a>
            <br><br>
            <h1>Bewerk {{$sponsor->name}}</h1>
            <h4>Kies alleen een foto als je die wilt vervangen</h4>
            <form action="{{route('sponsors.update', $sponsor->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div>
                    <label for="name" class="form-label">Naam sponsor</label>
                    <input id="name"
                           type="text"
                           name="name"
                           class="@error('name') is-invalid @enderror form-control"
                           value="{{$sponsor->name}}"
                           required autocomplete="name" autofocus/>
                    @error('name')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="description" class="form-label">Stuk tekst over de sponsor</label>
                    <textarea id="description"
                              name="description"
                              class="@error('description') is-invalid @enderror form-control">{{$sponsor->description}}</textarea>
                    @error('description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="image" class="form-label">Logo van sponsor</label>
                    <input id="image"
                           type="file"
                           name="image"
                           class="@error('image') is-invalid @enderror form-control"
                           value="{{$sponsor->image}}"/>
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
                           value="{{$sponsor->site}}"
                           required autocomplete="name" autofocus/>
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
