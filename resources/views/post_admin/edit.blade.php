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
                    <label for="file" class="form-label">Bestand (zoals een excel-bestand)</label>
                    <input id="file"
                           type="file"
                           name="file"
                           class="@error('file') is-invalid @enderror form-control"
                           value="{{$post->file}}"/>
                    @error('file')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="thumbnail" class="form-label">Afbeelding toevoegen</label>
                    <input id="thumbnail"
                           type="file"
                           name="thumbnail"
                           class="@error('thumbnail') is-invalid @enderror form-control"
                           value="{{$post->thumbnail}}"/>
                    @error('thumbnail')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="video" class="form-label">Video toevoegen</label>
                    <input id="video"
                           type="file"
                           name="video"
                           class="@error('video') is-invalid @enderror form-control"
                           value="{{$post->video}}"/>
                    @error('video')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="comments" class="form-label">Comments aan- of uitzetten</label>

                    <div class="col-md-6">
                        <input id="comments" type="hidden" name="comments" value="0">
                        @if ($post->comments === 0)
                            <input id="comments" type="checkbox" name="comments" value="1">
                        @else
                            <input id="comments" type="checkbox" name="comments" value="1" checked>
                        @endif
                    </div>
                </div>
                <div>
                    <label for="pinned" class="form-label">Zet bericht bovenaan vast</label>

                    <div class="col-md-6">
                        <input id="pinned" type="hidden" name="pinned" value="0">
                        @if ($post->pinned === 0)
                            <input id="pinned" type="checkbox" name="pinned" value="1">
                        @else
                            <input id="pinned" type="checkbox" name="pinned" value="1" checked>
                        @endif
                    </div>
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
