@extends('layouts.app')

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
                                <img style="width: 50%;" src="{{ asset('storage/'. $contactPage->image) }}" alt="">
                            </div>
                        @endif
                        <br>
                        <div>
                            <div class="col">
                                <a href="{{route('contact.edit', $contactPage->id)}}" class="btn btn-success">Bewerk de inhoud van de contactpagina</a>
                            </div>
                            <br>
                            <div class="col">
                                <form action="{{route('contact.destroy', $contactPage->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Verwijder de inhoud van de contactpagina</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
