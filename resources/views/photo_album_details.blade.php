@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h>{{date('d-m-Y', strtotime($photoAlbum->date))}}: {{$photoAlbum->title}}</h>
            @if(count($photos) < 1)
                <br><p>Nog geen foto's</p>
            @else
                <div class="row row-cols-1 row-cols-md-3 g-3">
                    @foreach($photos as $photo)
                        <div class="col-mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-image">
                                        <img style="width: 50%;" src="{{ asset('storage/'. $photo->image) }}" alt="{{$photo->title}}">
                                    </div>
                                    <div class="card-title">
                                        <h4>{{$photo->title}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
