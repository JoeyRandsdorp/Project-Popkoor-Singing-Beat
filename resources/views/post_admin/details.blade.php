@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/posts">< Terug</a>
            <br><br>
            <div class="card">
                <div class="card-header">
                    <h1>{{$post->title}}</h1>
                </div>
                <div class="card-body">
                    <div class="col">
                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-success btn-sm">Bewerk post</a>
                    </div>
                    <br>
                    <div class="col">
                        <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Verwijder post</button>
                        </form>
                    </div>
                    <hr>
                    <div class="card-image">
                        @php
                            $fileSize = getimagesize('storage/'. $post->thumbnail);
                            $width = $fileSize['0'];
                            $height = $fileSize['1'];
                        @endphp
                        @if($width >= $height)
                            <img style="width: 400px;"
                                 src="{{ asset('storage/'. $post->thumbnail) }}"
                                 alt="Foto van {{$post->title}}">
                        @else
                            <img style="height: 400px;"
                                 src="{{ asset('storage/'. $post->thumbnail) }}"
                                 alt="Foto met titel: {{$post->title}}">
                        @endif
                    </div>
                    <br>
                    <div class="card-text">
                        <p>{!!$post->description!!}</p>
                    </div>
                    <br>
                    <div>
                        @if($post->file === null)
                            <div></div>
                        @else
                            <div>
                                <embed src="{{ asset('storage/'. $post->file) }}" style="width: 75%; height: 400px">
                            </div>
                        @endif
                        <br>
                        @if($post->video === null)
                            <div></div>
                        @else
                            <div>
                                <video width="768" height="432" controls>
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
