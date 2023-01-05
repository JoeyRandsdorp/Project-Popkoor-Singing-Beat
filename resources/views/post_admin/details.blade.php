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
                    <div class="card-image">
                        <img src="{{ asset('storage/'. $post->thumbnail) }}" alt="">
                    </div>
                    <div>
                        <div class="col">
                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-success">Bewerken</a>
                        </div>
                        <br>
                        <div class="col">
                            <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Verwijderen</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
