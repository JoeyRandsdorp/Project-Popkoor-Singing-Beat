@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{date('d-m-Y', strtotime($photoAlbum->date))}}: {{$photoAlbum->title}}</h1>
            <div class="row row-cols-1 row-cols-md-2 g-2">
                <div>
                    <a href="{{route('photo_albums.edit', $photoAlbum->id)}}" class="btn btn-success">Bewerk fotoalbum</a>
                </div>
                <div>
                    <form action="{{route('photo_albums.destroy', $photoAlbum->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Verwijder fotoalbum</button>
                    </form>
                </div>
            </div>
            <br>
            <div>
                <h3>Voeg een foto toe:</h3>
                <form action="{{route('photos.store')}}" method="post" enctype="multipart/form-data">
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
                        <label for="image" class="form-label">Foto</label>
                        <input id="image"
                               type="file"
                               name="image"
                               class="@error('image') is-invalid @enderror form-control"
                               value="{{old('image')}}"/>
                        @error('image')
                        <span>{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <input id="album_id" type="hidden" name="album_id" value="{{$photoAlbum->id}}">
                    </div>
                    <br><br>
                    <div>
                        <input type="submit" value="Voeg foto toe">
                    </div>
                </form>
            </div>
            <br>
            @if(count($photos) < 1)
                <p>Nog geen foto's</p>
            @else
                <div class="row row-cols-1 row-cols-md-3 g-3">
                    @foreach($photos as $photo)
                        <div class="col-mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-image">
                                        <img style="width: 50%;" src="{{ asset('storage/'. $photo->image) }}" alt="{{$photo->title}}">
                                    </div>
                                    <div class="card-title">
                                        <h4>{{$photo->title}}</h4>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <form action="{{route('photos.destroy', $photo->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Verwijder foto</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
