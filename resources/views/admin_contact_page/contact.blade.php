@extends('layouts.app')

@section('title', 'Contactpagina Admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/edit_pages">< Terug</a>
            <br><br>
            <div class="col">
                <a href="{{route('contact.create')}}" class="btn btn-success">Maak geheel nieuwe inhoud voor de contactpagina</a>
            </div>
            <br>
            @foreach($contactPages as $contactPage)
                <div class="card">
                    <div class="card-header">
                        <h1>{{$contactPage->title}}</h1>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="col">
                                <a href="{{route('contact.edit', $contactPage->id)}}" class="btn btn-success btn-sm">Bewerk de inhoud van de contactpagina</a>
                            </div>
                            <br>
                            <div class="col">
                                <form action="{{route('contact.destroy', $contactPage->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Verwijder de inhoud van de contactpagina</button>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="card-text">
                            <p>{!!$contactPage->description!!}</p>
                        </div>
                        @if($contactPage->image === null)
                            <div></div>
                        @else
                            <div class="card-image">
                                @php
                                    $fileSize = getimagesize('storage/'. $contactPage->image);
                                    $width = $fileSize['0'];
                                    $height = $fileSize['1'];
                                @endphp
                                @if($width >= $height)
                                    <img style="width: 400px;"
                                         src="{{ asset('storage/'. $contactPage->image) }}"
                                         alt="Foto van {{$contactPage->title}}">
                                @else
                                    <img style="height: 400px;"
                                         src="{{ asset('storage/'. $contactPage->image) }}"
                                         alt="Foto van {{$contactPage->title}}">
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
