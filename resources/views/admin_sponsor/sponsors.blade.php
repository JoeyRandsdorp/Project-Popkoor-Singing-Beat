@extends('layouts.app')

@section('title', 'Sponsors Admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/edit_pages">< Terug</a>
            <br><br>
            <h1>Alle sponsors</h1>
            <div class="col">
                <a href="{{route('sponsors.create')}}" class="btn btn-success">Voeg een sponsor toe</a>
            </div>
            <br>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach($sponsors as $sponsor)
                    <div class="col-mb-4">
                        <div class="card h-100">
                            <div class="card-header" style="text-align: center">
                                <div class="card-title">
                                    <h4>{{$sponsor->name}}</h4>
                                </div>
                            </div>
                            <div class="card-body" style="text-align: center;">
                                <div class="card-image">
                                    @php
                                        $fileSize = getimagesize('storage/'. $sponsor->image);
                                        $width = $fileSize['0'];
                                        $height = $fileSize['1'];
                                    @endphp
                                    @if($width >= $height)
                                        <img style="width: 150px;"
                                             src="{{ asset('storage/'. $sponsor->image) }}"
                                             alt="Logo van {{$sponsor->name}}">
                                    @else
                                        <img style="height: 150px;"
                                             src="{{ asset('storage/'. $sponsor->image) }}"
                                             alt="Logo van {{$sponsor->name}}">
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer" style="text-align: center">
                                <div class="col">
                                    <a href="{{route('sponsors.show', $sponsor->id)}}" class="btn btn-success">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
