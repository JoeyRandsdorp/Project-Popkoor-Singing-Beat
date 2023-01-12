@extends('layouts.app')

@section('title', 'Popkoor Singing Beat - Welkom')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($welcomePage as $welcome)
                <div class="card">
                    <div class="card-header">
                        <h1>{{$welcome->title}}</h1>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p>{!!$welcome->description!!}</p>
                        </div>
                        @if($welcome->image === null)
                            <div></div>
                        @else
                            <div class="card-image">
                                <img style="width: 400px;" src="{{ asset('storage/'. $welcome->image) }}" alt="">
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
