@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{$sponsor->name}}</h1>
                </div>
                <div class="card-body">
                    <div class="card-image">
                        <img style="width: 50%;" src="{{ asset('storage/'. $sponsor->image) }}" alt="Logo van {{$sponsor->name}}">
                    </div>
                    <div class="card-text">
                        <p>{!!$sponsor->description!!}</p>
                    </div>
                    @if($sponsor->site === null)
                        <div></div>
                    @else
                        <div>
                            <br><a href="{{$sponsor->site}}" target="_blank">Bezoek de website van {{$sponsor->name}}</a>
                        </div>
                    @endif
                    <div class="col">
                        <a href="{{route('sponsors.edit', $sponsor->id)}}" class="btn btn-success">Bewerk sponsor</a>
                    </div>
                    <br>
                    <div class="col">
                        <form action="{{route('sponsors.destroy', $sponsor->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Verwijder sponsor</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
