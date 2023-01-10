@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{$introduction->function}}: {{$introduction->name}}</h1>
                    </div>
                    <div class="card-body">
                        @if($introduction->image === null)
                            <div></div>
                        @else
                            <div class="card-image">
                                <img style="width: 50%;" src="{{ asset('storage/'. $introduction->image) }}" alt="">
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
        </div>
    </div>
@endsection
