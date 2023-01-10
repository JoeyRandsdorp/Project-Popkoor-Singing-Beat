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
                        <th>Zichtbaarheid</th>
                        <th>Verwijderen</th>
                    </tr>
                    @foreach($songs as $song)
                        <tr>
                            <td>{{$song->title}}</td>
                            <td>{{$song->artist}}</td>
                            <td><a href="{{route('repertoire.show', $song->id)}}">Details</a></td>
                            <td>
                                @if($song->visibility === 1)
                                    Zichtbaar
                                @else
                                    Onzichtbaar
                                @endif
                            </td>
                            <td>
                                <form action="{{route('repertoire.destroy', $song->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
