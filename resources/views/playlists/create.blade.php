@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('playlists.store')}}" method="post" enctype="multipart/form-data">
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
                <br><br>
                <div>
                    <input type="submit" value="Maak afspeellijst">
                </div>
            </form>
        </div>
    </div>
@endsection
