@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row row-cols-1 row-cols-md-3 g-3">
                @foreach($sponsors as $sponsor)
                    <div class="col-mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-image">
                                    <img style="width: 50%;" src="{{ asset('storage/'. $sponsor->image) }}" alt="">
                                </div>
                                <div class="card-title">
                                    <h4>{{$sponsor->name}}</h4>
                                </div>
                                <div class="card-text">
                                    <p>{!!$sponsor->description!!}</p>
                                </div>
                                <div class="col">
                                    <a href="{{route('sponsors.show', $sponsor->id)}}" class="btn btn-success">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
