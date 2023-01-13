@extends('layouts.app')

@section('title', 'Welkomstpagina Admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/edit_pages">< Terug</a>
            <br><br>
            <div class="col">
                <a href="{{route('welcome.create')}}" class="btn btn-success">Maak geheel nieuwe inhoud voor de welkomstpagina</a>
            </div>
            <br>
            @foreach($welcomePage as $welcome)
            <div class="card">
                <div class="card-header">
                    <h1>{{$welcome->title}}</h1>
                </div>
                <div class="card-body">
                    <div>
                        <div class="col">
                            <a href="{{route('welcome.edit', $welcome->id)}}"
                               class="btn btn-success btn-sm">Bewerk de inhoud van de welkomstpagina
                            </a>
                        </div>
                        <br>
                        <div class="col">
                            <form action="{{route('welcome.destroy', $welcome->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">
                                    Verwijder de inhoud van de welkomstpagina
                                </button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="card-text">
                        <p>{!!$welcome->description!!}</p>
                    </div>
                    @if($welcome->image === null)
                        <div></div>
                    @else
                        <div class="card-image">
                            @php
                                $fileSize = getimagesize('storage/'. $welcome->image);
                                $width = $fileSize['0'];
                                $height = $fileSize['1'];
                            @endphp
                            @if($width >= $height)
                                <img style="width: 400px;"
                                     src="{{ asset('storage/'. $welcome->image) }}"
                                     alt="Foto van {{$welcome->title}}">
                            @else
                                <img style="height: 400px;"
                                     src="{{ asset('storage/'. $welcome->image) }}"
                                     alt="Foto van {{$welcome->title}}">
                            @endif
                        </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
