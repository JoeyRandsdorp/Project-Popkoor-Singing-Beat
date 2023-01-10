@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Alle nummers</h1>
            <div>
                <table class="table-bordered" style="width: 100%">
                    <tr>
                        <th>Titel</th>
                        <th>Artiest</th>
                        <th>Details</th>
                    </tr>
                    @foreach($songs as $song)
                        <tr>
                            <td>{{$song->title}}</td>
                            <td>{{$song->artist}}</td>
                            <td><a href="/repertoire/{{$song->id}}">Details</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
