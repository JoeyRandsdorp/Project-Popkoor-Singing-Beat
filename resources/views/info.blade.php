@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($infoPage as $info)
                <div class="card">
                    <div class="card-header">
                        <h1>{{$info->title}}</h1>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p>{!!$info->description!!}</p>
                        </div>
                        @if($info->image === null)
                            <div></div>
                        @else
                            <div class="card-image">
                                <img style="width: 50%;" src="{{ asset('storage/'. $info->image) }}" alt="">
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection