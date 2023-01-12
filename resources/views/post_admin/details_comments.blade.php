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
            <br>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('comments.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="comment" class="form-label">Bijschrift bericht</label>
                            <input id="comment"
                                   type="text"
                                   name="comment"
                                   class="@error('comment') is-invalid @enderror form-control"
                                   value="{{old('comment')}}"/>
                            @error('comment')
                            <span>{{$message}}</span>
                            @enderror
                        </div>
                        <div>
                            <input id="date" type="hidden" name="date" value="<?php echo date("Y-m-d") ?>">
                        </div>
                        <div>
                            <input id="user_id" type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        </div>
                        <div>
                            <input id="post_id" type="hidden" name="post_id" value="{{ $post->id }}">
                        </div>
                        <br><br>
                        <div>
                            <input type="submit" class="btn btn-success" value="Plaats comment">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div>
                <h4>Comments:</h4>
                @foreach($comments as $comment)
                    @php
                        $comment_user = App\Http\Controllers\CommentController::users($comment->user_id);
                    @endphp
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <p>
                                <b>{{$comment_user}} zei op {{date('d-m-Y', strtotime($comment->date))}}:</b> {{$comment->comment}}
                            </p>
                            <div class="col">
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Verwijder comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
