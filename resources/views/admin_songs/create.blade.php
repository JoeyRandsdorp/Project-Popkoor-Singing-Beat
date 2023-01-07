@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('songs.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title" class="form-label">Titel</label>
                    <input id="title"
                           type="text"
                           name="title"
                           class="@error('title') is-invalid @enderror form-control"
                           value="{{old('title')}}"/>
                    @error('title')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="artist" class="form-label">Artiest</label>
                    <input id="artist"
                           type="text"
                           name="artist"
                           class="@error('artist') is-invalid @enderror form-control"
                           value="{{old('artist')}}"/>
                    @error('artist')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="full_song" class="form-label">Volledige nummer</label>
                    <input id="full_song"
                           type="file"
                           name="full_song"
                           class="@error('full_song') is-invalid @enderror form-control"
                           value="{{old('full_song')}}"/>
                    @error('full_song')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="image" class="form-label">Afbeelding</label>
                    <input id="image"
                           type="file"
                           name="image"
                           class="@error('image') is-invalid @enderror form-control"
                           value="{{old('image')}}"/>
                    @error('image')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="lyrics" class="form-label">Songtekst</label>
                    <input id="lyrics"
                           type="file"
                           name="lyrics"
                           class="@error('lyrics') is-invalid @enderror form-control"
                           value="{{old('lyrics')}}"/>
                    @error('lyrics')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="translation" class="form-label">Vertaling songtekst</label>
                    <input id="translation"
                           type="file"
                           name="translation"
                           class="@error('translation') is-invalid @enderror form-control"
                           value="{{old('translation')}}"/>
                    @error('translation')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="sheet_music" class="form-label">Bladmuziek</label>
                    <input id="sheet_music"
                           type="file"
                           name="sheet_music"
                           class="@error('sheet_music') is-invalid @enderror form-control"
                           value="{{old('sheet_music')}}"/>
                    @error('sheet_music')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <input id="date" type="hidden" name="date" value="<?php echo date("Y-m-d") ?>">
                </div>
                <br><br>
                <div>
                    <input type="submit" value="Plaats bericht">
                </div>
            </form>
        </div>
    </div>
@endsection
