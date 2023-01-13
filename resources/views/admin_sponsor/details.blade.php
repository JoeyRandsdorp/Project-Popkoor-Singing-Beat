@extends('layouts.app')

@section('title', $sponsor->name)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/sponsors">< Terug</a>
            <br><br>
            <div class="card">
                <div class="card-header">
                    <h1>{{$sponsor->name}}</h1>
                </div>
                <div class="card-body">
                    <div class="col">
                        <a href="{{route('sponsors.edit', $sponsor->id)}}" class="btn btn-success btn-sm">Bewerk sponsor</a>
                    </div>
                    <br>
                    <div class="col">
                        <form action="{{route('sponsors.destroy', $sponsor->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Verwijder sponsor</button>
                        </form>
                    </div>
                    <hr>
                    <div class="card-image">
                        @php
                            $fileSize = getimagesize('storage/'. $sponsor->image);
                            $width = $fileSize['0'];
                            $height = $fileSize['1'];
                        @endphp
                        @if($width >= $height)
                            <img style="width: 250px; float: right; margin-left: 50px;"
                                 src="{{ asset('storage/'. $sponsor->image) }}"
                                 alt="Logo van {{$sponsor->name}}">
                        @else
                            <img style="height: 250px; float: right; margin-left: 50px;"
                                 src="{{ asset('storage/'. $sponsor->image) }}"
                                 alt="Logo van {{$sponsor->name}}">
                        @endif
                    </div>
                    <div class="card-text">
                        <p>{!!$sponsor->description!!}</p>
                    </div>
                    @if($sponsor->site === null)
                        <div></div>
                    @else
                        <div>
                            <br><a href="{{$sponsor->site}}" target="_blank">Bezoek de website van {{$sponsor->name}}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
