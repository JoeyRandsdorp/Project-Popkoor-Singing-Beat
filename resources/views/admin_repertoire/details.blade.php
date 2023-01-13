@extends('layouts.app')

@section('title', $song->title)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/repertoire">< Terug</a>
            <br><br>
            <div class="card">
                <div class="card-header">
                    <h1>{{$song->artist}} - {{$song->title}}</h1>
                </div>
                <div class="card-body">
                    <div>
                        @if($song->visibility === 1)
                            <h4>Dit muzieknummer is zichtbaar voor alle gebruikers</h4>
                        @else
                            <h4>Dit muzieknummer is onzichtbaar voor alle gebruikers</h4>
                        @endif
                    </div>
                    <br>
                    <div>
                        <a href="{{route('repertoire.edit', $song->id)}}" class="btn btn-success btn-sm">Bewerk '{{$song->title}}'</a>
                    </div>
                    <br>
                    <div>
                        <form action="{{route('repertoire.destroy', $song->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Verwijder '{{$song->title}}'</button>
                        </form>
                    </div>
                    <hr>
                    @if($song->image === null)
                        <div>
                            <p>Nog geen afbeelding geüpload</p>
                        </div>
                    @else
                    <div class="card-image">
                        <img style="width: 300px; float: right; margin-left: 50px"
                             src="{{ asset('storage/'. $song->image) }}"
                             alt="Albumcover van {{$song->title}} door {{$song->artist}}">
                    </div>
                    @endif
                    <br>
                    @if($song->song === null)
                        <div>
                            <p>Nog geen demo geüpload</p>
                        </div>
                    @else
                    <div>
                        <audio controls style="width: 60%;">
                            <source src="{{ asset('storage/' . $song->song) }}" type="audio/mpeg">
                        </audio>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
