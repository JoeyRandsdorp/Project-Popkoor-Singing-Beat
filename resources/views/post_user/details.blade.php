@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{$post->title}}</h1>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <p>{{$post->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
