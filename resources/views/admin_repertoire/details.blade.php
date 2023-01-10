@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{$song->artist}} - {{$song->title}}</h1>
                </div>
                <div class="card-body">
                    <div>
                        @if($song->visibility === 1)
                            <p>Dit muzieknummer is zichtbaar voor alle gebruikers</p>
                        @else
                            <p>Dit muzieknummer is onzichtbaar voor alle gebruikers</p>
                        @endif
                    </div>
                    @if($song->image === null)
                        <div>
                            <p>Nog geen afbeelding geüpload</p>
                        </div>
                    @else
                    <div class="card-image">
                        <img style="width: 50%;" src="{{ asset('storage/'. $song->image) }}" alt="">
                    </div>
                    @endif
                    <br>
                    @if($song->song === null)
                        <div>
                            <p>Nog geen demo geüpload</p>
                        </div>
                    @else
                    <div>
                        <audio controls style="width: 100%;">
                            <source src="{{ asset('storage/' . $song->song) }}" type="audio/mpeg">
                        </audio>
                    </div>
                    @endif
                    <br>
                    <div>
                        <a href="{{route('repertoire.edit', $song->id)}}" class="btn btn-success">Bewerken</a>
                    </div>
                    <br>
                    <div>
                        <form action="{{route('repertoire.destroy', $song->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Verwijderen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
