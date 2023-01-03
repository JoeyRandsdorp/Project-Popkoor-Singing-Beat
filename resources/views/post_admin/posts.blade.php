@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row row-cols-1 row-cols-md-3 g-3">
                @foreach($posts as $post)
                    <div class="col-mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>{{$post->title}}</h4>
                                </div>
                                <div class="card-text">
                                    <p>{{$post->description}}</p>
                                </div>
                                <div class="col">
                                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-success">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
