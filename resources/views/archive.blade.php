@extends('layouts.app')

@section('title', 'Popkoor Singing Beat - Archief')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Het Popkoor Singing Beat Archief</h1>
            <div>
                <table class="table-bordered" style="width: 100%">
                    <tr>
                        <th>Datum</th>
                        <th>Titel</th>
                        <th>Omschrijving</th>
                        <th>Details</th>
                    </tr>
                    @foreach($archive as $part)
                        <tr>
                            <td>{{date('d-m-Y', strtotime($part->date))}}</td>
                            <td>{{$part->title}}</td>
                            <td>{{$part->description}}</td>
                            <td><a href="/archive/{{$part->id}}" class="btn btn-success">Details</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
