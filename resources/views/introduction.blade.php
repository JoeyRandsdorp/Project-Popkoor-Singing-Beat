@extends('layouts.app')

@section('title', 'Even voorstellen')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Even voorstellen</h1>
            <br>
            @foreach($introductions as $introduction)
                <div class="card">
                    <div class="card-header">
                        <h2>{{$introduction->function}}: {{$introduction->name}}</h2>
                    </div>
                    <div class="card-body">
                        @if($introduction->image === null)
                            <div></div>
                        @else
                            <div class="card-img">
                                @php
                                $fileSize = getimagesize('storage/'. $introduction->image);
                                $width = $fileSize['0'];
                                $height = $fileSize['1'];
                                @endphp
                                @if($width >= $height)
                                    <img style="width: 250px; float: right; margin-left: 50px"
                                         src="{{ asset('storage/'. $introduction->image) }}"
                                         alt="Profielfoto van {{$introduction->name}}">
                                @else
                                    <img style="height: 250px; float: right; margin-left: 50px"
                                         src="{{ asset('storage/'. $introduction->image) }}"
                                         alt="Profielfoto van {{$introduction->name}}">
                                @endif
                            </div>
                        @endif
                        <br>
                        <div class="card-text">
                            <p>{!!$introduction->introduction!!}</p>
                        </div>
                    </div>
                </div>
                <br><br>
            @endforeach
        </div>
    </div>
@endsection
