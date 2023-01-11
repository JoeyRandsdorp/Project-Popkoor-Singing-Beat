@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Alle nummers</h1>
            <div>
                <table class="table-bordered" style="width: 100%">
                    <tr>
                        <th>Datum</th>
                        <th>Titel</th>
                        <th>Omschrijving</th>
                        <th>Details</th>
                        <th>Verwijderen</th>
                    </tr>
                    @foreach($archive as $part)
                        <tr>
                            <td>{{date('d-m-Y', strtotime($part->date))}}</td>
                            <td>{{$part->title}}</td>
                            <td>{{$part->description}}</td>
                            <td><a href="{{route('archive.show', $part->id)}}" class="btn btn-success">Details</a></td>
                            <td>
                                <form action="{{route('archive.destroy', $part->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
