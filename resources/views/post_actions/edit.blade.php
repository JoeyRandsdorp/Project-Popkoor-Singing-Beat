@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('posts.update', $post->id)}}" method="post">
                @method('put')
                @csrf
                <div>
                    <label for="title" class="form-label">Titel bericht</label>
                    <input id="title"
                           type="text"
                           name="title"
                           class="@error('title') is-invalid @enderror form-control"
                           value="{{$post->title}}"/>
                    @error('title')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="description" class="form-label">Bijschrift bericht</label>
                    <input id="description"
                           type="text"
                           name="description"
                           class="@error('description') is-invalid @enderror form-control"
                           value="{{$post->description}}"/>
                    @error('description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="file" class="form-label">Bestand</label>
                    <input id="file"
                           type="text"
                           name="file"
                           class="@error('file') is-invalid @enderror form-control"
                           value="{{$post->file}}"/>
                    @error('file')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="comments" class="form-label">Comments aan- of uitzetten</label>
                    <input id="comments"
                           type="number"
                           name="comments"
                           class="@error('comments') is-invalid @enderror form-control"
                           value="{{$post->comments}}"/>
                    @error('comments')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <input id="date" type="hidden" name="date" value="{{ $post->date }}">
                </div>
                <div>
                    <input id="user_id" type="hidden" name="user_id" value="{{ $post->user_id }}">
                </div>
                <br><br>
                <div>
                    <input type="submit" value="Wijzigingen opslaan">
                </div>
            </form>
        </div>
    </div>
@endsection
