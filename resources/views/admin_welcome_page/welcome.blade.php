@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($welcomePage as $welcome)
            <div class="card">
                <div class="card-header">
                    <h1>{{$welcome->title}}</h1>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <p>{{$welcome->description}}</p>
                    </div>
                    <div class="card-image">
                        <img style="width: 50%;" src="{{ asset('storage/'. $welcome->image) }}" alt="">
                    </div>
                    <br>
                    <div>
                        <div class="col">
                            <a href="{{route('welcome.edit', $welcome->id)}}" class="btn btn-success">Bewerk de inhoud van de welkomstpagina</a>
                        </div>
                        <br>
                        <div class="col">
                            <form action="{{route('welcome.destroy', $welcome->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Verwijder de inhoud van de welkomstpagina</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
