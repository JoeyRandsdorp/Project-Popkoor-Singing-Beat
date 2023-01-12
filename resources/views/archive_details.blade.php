@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/archive">< Terug</a>
            <br><br>
            <div class="card">
                <div class="card-header">
                    <h1>{{date('d-m-Y', strtotime($archive->date))}}: {{$archive->title}}</h1>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <p>{{$archive->description}}</p>
                    </div>
                    <br>
                    <div>
                        <iframe src="{{ asset('storage/'. $archive->pdf) }}" style="width: 75%; height: 400px"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
