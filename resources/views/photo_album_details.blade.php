@extends('layouts.app')

@section('title', 'Popkoor Singing Beat - ' . $photoAlbum->title)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/photo_albums">< Terug</a>
            <br><br>
            <h1>{{date('d-m-Y', strtotime($photoAlbum->date))}}: {{$photoAlbum->title}}</h1>
            @if(count($photos) < 1)
                <br><p>Nog geen foto's</p>
            @else
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    @foreach($photos as $photo)
                        <div class="col-mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-image">
                                        @php
                                            $fileSize = getimagesize('storage/'. $photo->image);
                                            $width = $fileSize['0'];
                                            $height = $fileSize['1'];
                                        @endphp
                                        @if($width >= $height)
                                            <img style="width: 150px;"
                                                 src="{{ asset('storage/'. $photo->image) }}"
                                                 alt="Foto met titel: {{$photo->title}}">
                                        @else
                                            <img style="height: 150px;"
                                                 src="{{ asset('storage/'. $photo->image) }}"
                                                 alt="Foto met titel: {{$photo->title}}">
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="card-title">
                                        <h4>{{$photo->title}}</h4>
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
