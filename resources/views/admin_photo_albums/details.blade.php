@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{date('d-m-Y', strtotime($photoAlbum->date))}}: {{$photoAlbum->title}}</h1>
            <div class="row row-cols-1 row-cols-md-2 g-2">
                <div>
                    <a href="{{route('photo_albums.edit', $photoAlbum->id)}}" class="btn btn-success">Bewerk fotoalbum</a>
                </div>
                <div>
                    <form action="{{route('photo_albums.destroy', $photoAlbum->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Verwijder fotoalbum</button>
                    </form>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-3">
{{--                @foreach($posts as $post)--}}
{{--                    <div class="col-mb-3">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="card-image">--}}
{{--                                    <img style="width: 50%;" src="{{ asset('storage/'. $post->thumbnail) }}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="card-title">--}}
{{--                                    <h4>{{$post->title}}</h4>--}}
{{--                                </div>--}}
{{--                                <div class="card-text">--}}
{{--                                    <p>{!!$post->description!!}</p>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-success">Details</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
            </div>
        </div>
    </div>
@endsection
