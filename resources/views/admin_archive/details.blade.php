@extends('layouts.app')

@section('title', $archive->title)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/archive">< Terug</a>
            <br><br>
            <div class="card">
                <div class="card-header">
                    <h1>{{date('d-m-Y', strtotime($archive->date))}}: {{$archive->title}}</h1>
                </div>
                <div class="card-body">
                    <div>
                        <div class="col">
                            <a href="{{route('archive.edit', $archive->id)}}" class="btn btn-success btn-sm">Bewerk '{{$archive->title}}'</a>
                        </div>
                        <br>
                        <div class="col">
                            <form action="{{route('archive.destroy', $archive->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Verwijder '{{$archive->title}}'</button>
                            </form>
                        </div>
                    </div>
                    <hr>
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
