@extends('layouts.app')

@section('title', 'Popkoor Singing Beat - Waar, wat & wanneer')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($infoPage as $info)
                <div class="card">
                    <div class="card-header">
                        <h1>{{$info->title}}</h1>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p>{!!$info->description!!}</p>
                        </div>
                        @if($info->image === null)
                            <div></div>
                        @else
                            <div class="card-image">
                                @php
                                    $fileSize = getimagesize('storage/'. $info->image);
                                    $width = $fileSize['0'];
                                    $height = $fileSize['1'];
                                @endphp
                                @if($width >= $height)
                                    <img style="width: 400px;"
                                         src="{{ asset('storage/'. $info->image) }}"
                                         alt="Foto van {{$info->title}}">
                                @else
                                    <img style="height: 400px;"
                                         src="{{ asset('storage/'. $info->image) }}"
                                         alt="Foto van {{$info->title}}">
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
