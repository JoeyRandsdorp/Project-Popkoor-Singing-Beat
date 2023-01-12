@extends('layouts.app')

@section('title', 'Even voorstellen-pagina bewerken')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/edit_pages">< Terug</a>
            <br><br>
            <h1>'Even voorstellen'-pagina bewerken</h1>
            <br>
            @foreach($introductions as $introduction)
                <div class="card">
                    <div class="card-header">
                        <h1>{{$introduction->function}}: {{$introduction->name}}</h1>
                    </div>
                    <div class="card-body">
                        @if($introduction->image === null)
                            <div></div>
                        @else
                            <div class="card-img">
                                @php
                                    $fileSize = getimagesize('storage/'. $introduction->image);
                                    $width = $fileSize['0'];
                                    $height = $fileSize['1'];
                                @endphp
                                @if($width >= $height)
                                    <img style="width: 250px; float: right; margin-left: 50px"
                                         src="{{ asset('storage/'. $introduction->image) }}"
                                         alt="Profielfoto van {{$introduction->name}}">
                                @else
                                    <img style="height: 250px; float: right; margin-left: 50px"
                                         src="{{ asset('storage/'. $introduction->image) }}"
                                         alt="Profielfoto van {{$introduction->name}}">
                                @endif
                            </div>
                        @endif
                        <br>
                        <div class="card-text">
                            <p>{!!$introduction->introduction!!}</p>
                        </div>
                        <br>
                        <div>
                            <div class="col">
                                <a href="{{route('introduction.edit', $introduction->id)}}" class="btn btn-success">Bewerk introductie</a>
                            </div>
                            <br>
                            <div class="col">
                                <form action="{{route('introduction.destroy', $introduction->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Verwijder introductie</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
            @endforeach
        </div>
    </div>
@endsection
