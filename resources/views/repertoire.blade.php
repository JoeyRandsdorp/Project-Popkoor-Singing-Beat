@extends('layouts.app')

@section('title', 'Popkoor Singing Beat - Repertoire')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Repertoire</h1>
            <p>Hieronder kun je een overzicht vinden van ons repertoire.
                Via de detail-knop kan je meer informatie verkrijgen van het muzieknummer en kan je een demo beluisteren!</p>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach($songs as $song)
                    <div class="col-mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <div class="card-title">
                                    <h5 style="text-align: center">{{$song->artist}} - {{$song->title}}</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-img">
                                    <img style="display: block; width: 150px; margin-left: auto; margin-right: auto"
                                         src="{{ asset('storage/' . $song->image) }}"
                                         alt="Albumcover van {{$song->title}} door {{$song->name}}">
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="card-text">
                                    <a href="/repertoire/{{$song->id}}"
                                       class="btn btn-success btn-sm"
                                       style="display: block; margin-left: auto; margin-right: auto;">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
