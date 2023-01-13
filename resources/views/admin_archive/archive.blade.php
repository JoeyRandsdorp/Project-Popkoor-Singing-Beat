@extends('layouts.app')

@section('title', 'Archief Admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/edit_pages">< Terug</a>
            <br><br>
            <h1>Archief</h1>
            <div class="col">
                <a href="{{route('archive.create')}}" class="btn btn-success">Voeg een onderdeel toe aan het archief</a>
            </div>
            <br>
            <div>
                <table class="table-bordered" style="width: 100%">
                    <tr>
                        <th>Datum</th>
                        <th>Titel</th>
                        <th>Omschrijving</th>
                        <th>Bekijken</th>
                        <th>Verwijderen</th>
                    </tr>
                    @foreach($archive as $part)
                        <tr>
                            <td>{{date('d-m-Y', strtotime($part->date))}}</td>
                            <td>{{$part->title}}</td>
                            <td>{{$part->description}}</td>
                            <td><a href="{{route('archive.show', $part->id)}}" class="btn btn-success">Bekijk</a></td>
                            <td>
                                <form action="{{route('archive.destroy', $part->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Verwijder</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
