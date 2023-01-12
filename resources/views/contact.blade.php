@extends('layouts.app')

@section('title', 'Popkoor Singing Beat - Contact')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($contactPages as $contactPage)
                <div class="card">
                    <div class="card-header">
                        <h1>{{$contactPage->title}}</h1>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p>{!!$contactPage->description!!}</p>
                        </div>
                        @if($contactPage->image === null)
                            <div></div>
                        @else
                            <div class="card-image">
                                <img style="width: 400px;" src="{{ asset('storage/'. $contactPage->image) }}" alt="">
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
