@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{$post->title}}</h1>
                </div>
                <div class="card-body">
                    <div class="card-image">
                        <img style="width: 50%;" src="{{ asset('storage/'. $post->thumbnail) }}" alt="">
                    </div>
                    <div class="card-text">
                        <p>{{$post->description}}</p>
                    </div>
                    <div>
                        @if($post->file === null)
                            <div></div>
                        @else
                            <div>
                                <embed src="{{ asset('storage/'. $post->file) }}">
                            </div>
                        @endif
                        @if($post->video === null)
                            <div></div>
                        @else
                            <div>
                                <video width="320" height="240" controls>
                                    <source src="{{ asset('storage/'. $post->video) }}">
                                </video>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
