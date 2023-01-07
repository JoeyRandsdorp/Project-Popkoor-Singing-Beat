@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('voice_parts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title" class="form-label">Stempartij titel</label>
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
                    <label for="sound" class="form-label">Stempartij muziek</label>
                    <input id="sound"
                           type="file"
                           name="sound"
                           class="@error('sound') is-invalid @enderror form-control"
                           value="{{old('sound')}}"/>
                    @error('sound')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                @php
                $song_id = $_GET['id'];
                @endphp
                <div>
                    <input id="song_id" type="hidden" name="song_id" value="{{ $song_id }}">
                </div>
                <br><br>
                <div>
                    <input type="submit" value="Voeg stempartij toe">
                </div>
            </form>
        </div>
    </div>
@endsection
