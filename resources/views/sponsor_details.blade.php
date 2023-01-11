@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{$sponsor->name}}</h1>
                </div>
                <div class="card-body">
                    <div class="card-image">
                        <img style="width: 50%;" src="{{ asset('storage/'. $sponsor->image) }}" alt="Logo van {{$sponsor->name}}">
                    </div>
                    <div class="card-text">
                        <p>{!!$sponsor->description!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
