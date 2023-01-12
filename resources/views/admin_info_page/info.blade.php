@extends('layouts.app')

@section('title', 'Informatiepagina Admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/edit_pages">< Terug</a>
            <br><br>
            <div class="col">
                <a href="{{route('info.create')}}" class="btn btn-success">Maak geheel nieuwe inhoud voor de informatiepagina</a>
            </div>
            <br>
            @foreach($infoPage as $info)
                <div class="card">
                    <div class="card-header">
                        <h1>{{$info->title}}</h1>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="col">
                                <a href="{{route('info.edit', $info->id)}}" class="btn btn-success btn-sm">Bewerk de inhoud van de informatiepagina</a>
                            </div>
                            <br>
                            <div class="col">
                                <form action="{{route('info.destroy', $info->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Verwijder de inhoud van de informatiepagina</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-text">
                            <p>{!!$info->description!!}</p>
                        </div>
                        @if($info->image === null)
                            <div></div>
                        @else
                            <div class="card-image">
                                @php
                                    $fileSize = getimagesize('storage/'. $info->image);
                                    $width = $fileSize['0'];
                                    $height = $fileSize['1'];
                                @endphp
                                @if($width >= $height)
                                    <img style="width: 400px;"
                                         src="{{ asset('storage/'. $info->image) }}"
                                         alt="Foto van {{$info->title}}">
                                @else
                                    <img style="height: 400px;"
                                         src="{{ asset('storage/'. $info->image) }}"
                                         alt="Foto van {{$info->title}}">
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
