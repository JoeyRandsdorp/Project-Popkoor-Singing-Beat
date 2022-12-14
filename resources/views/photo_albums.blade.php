@extends('layouts.app')

@section('title', 'Popkoor Singing Beat - Fotoalbums')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Alle fotoalbums</h1>
            <div>
                <table class="table-bordered" style="width: 100%">
                    <tr>
                        <th>Fotoalbum</th>
                        <th>Foto's</th>
                        <th>Omschrijving</th>
                        <th>Datum</th>
                        <th>Bekijken</th>
                    </tr>
                    @foreach($photoAlbums as $photoAlbum)
                        <tr>
                            <td>{{$photoAlbum->title}}</td>
                            @php
                                $photos = App\Http\Controllers\PhotoAlbumController::getPhotos($photoAlbum->id);
                                $photosCount = count($photos);
                            @endphp
                            <td>{{$photosCount}}</td>
                            <td>{{$photoAlbum->description}}</td>
                            <td>{{date('d-m-Y', strtotime($photoAlbum->date))}}</td>
                            <td><a href="/photo_albums/{{$photoAlbum->id}}" class="btn btn-success">Bekijk</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
