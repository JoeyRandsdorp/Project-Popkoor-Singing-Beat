@extends('layouts.app')

@section('title', 'Popkoor Singing Beat - Sponsors')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Onze sponsors</h1>
            @if(count($sponsors) < 1)
                <p>
                    We hebben op dit moment helaas nog geen sponsors...
                    Wil jij onze sponsor zijn?
                    Neem dan contact met ons op via de <a href="/contact">contactpagina</a>
                </p>
            @else
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach($sponsors as $sponsor)
                    <div class="col-mb-4">
                        <div class="card h-100">
                            <div class="card-body" style="text-align: center;">
                                <div class="card-title">
                                    <h4>{{$sponsor->name}}</h4>
                                </div>
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
                                <br>
                                <div class="col">
                                    <a href="/sponsors/{{$sponsor->id}}" class="btn btn-success">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
