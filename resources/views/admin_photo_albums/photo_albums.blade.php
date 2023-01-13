@extends('layouts.app')

@section('title', 'Fotoalbums admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/edit_pages">< Terug</a>
            <br><br>
            <h1>Alle fotoalbums</h1>
            <div class="col">
                <a href="{{route('photo_albums.create')}}" class="btn btn-success">
                    Maak een nieuw fotoalbum
                </a>
            </div>
            <br>
            <div>
                <table class="table-bordered" style="width: 100%">
                    <tr>
                        <th>Fotoalbum</th>
                        <th>Aantal foto's</th>
                        <th>Omschrijving</th>
                        <th>Datum</th>
                        <th>Bekijken</th>
                        <th>Verwijderen</th>
                    </tr>
                    @foreach($photoAlbums as $photoAlbum)
                        <tr>
                            <td>{{$photoAlbum->title}}</td>
                            @php
                            $photos = App\Http\Controllers\AdminPhotoAlbumController::getPhotos($photoAlbum->id);
                            $photosCount = count($photos);
                            @endphp
                            <td>{{$photosCount}}</td>
                            <td>{{$photoAlbum->description}}</td>
                            <td>{{date('d-m-Y', strtotime($photoAlbum->date))}}</td>
                            <td><a href="{{route('photo_albums.show', $photoAlbum->id)}}" class="btn btn-success">Bekijk</a></td>
                            <td>
                                <div>
                                    <form action="{{route('photo_albums.destroy', $photoAlbum->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Verwijder fotoalbum</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
