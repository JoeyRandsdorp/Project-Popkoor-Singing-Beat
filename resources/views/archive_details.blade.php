@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                        <embed src="{{ asset('storage/'. $archive->pdf) }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
