@extends('layouts.app')

@section('title', 'Popkoor Singing Beat - ' . $song->title)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/repertoire">< Terug</a>
            <br><br>
            <div class="card">
                <div class="card-header">
                    <h1>{{$song->artist}} - {{$song->title}}</h1>
                </div>
                <div class="card-body">
                    @if($song->image === null)
                        <div>
                            <p>Nog geen afbeelding geüpload</p>
                        </div>
                    @else
                        <div class="card-image">
                            <img style="width: 300px; float: left; margin-right: 50px"
                                 src="{{ asset('storage/'. $song->image) }}"
                                 alt="Albumcover van {{$song->title}} door {{$song->name}}">
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
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
