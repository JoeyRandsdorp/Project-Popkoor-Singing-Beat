@extends('layouts.app')

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
                        <th>Verwijder fotoalbum</th>
                    </tr>
                    @foreach($photoAlbums as $photoAlbum)
                        <tr>
                            <td>{{$photoAlbum->title}}</td>
                            <td>8</td>
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
