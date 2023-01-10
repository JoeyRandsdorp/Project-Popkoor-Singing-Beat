@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($introductions as $introduction)
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
                            <a href="/introduction/{{$introduction->id}}" class="btn btn-success">Details</a>
                        </div>
                    </div>
                </div>
                <br><br>
            @endforeach
        </div>
    </div>
@endsection
