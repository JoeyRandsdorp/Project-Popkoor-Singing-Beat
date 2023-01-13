@extends('layouts.app')

@section('title', 'Agendapunt maken')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/calendar">< Terug</a>
            <br><br>
            <h1>Maak een agendapunt</h1>
            <h4>* = verplicht</h4>
            <form action="{{route('calendar.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="date" class="form-label">Datum *</label>
                    <input id="date"
                           type="date"
                           name="date"
                           class="@error('date') is-invalid @enderror form-control"
                           value="{{old('date')}}"/>
                    @error('date')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="start_time" class="form-label">Begintijd</label>
                    <input id="start_time"
                           type="time"
                           name="start_time"
                           class="@error('start_time') is-invalid @enderror form-control"
                           value="{{old('start_time')}}"/>
                    @error('start_time')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="end_time" class="form-label">Eindtijd</label>
                    <input id="end_time"
                           type="time"
                           name="end_time"
                           class="@error('end_time') is-invalid @enderror form-control"
                           value="{{old('end_time')}}"/>
                    @error('end_time')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="title" class="form-label">Titel agendapunt *</label>
                    <input id="title"
                           type="text"
                           name="title"
                           class="@error('title') is-invalid @enderror form-control"
                           value="{{old('title')}}"/>
                    @error('title')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="description" class="form-label">Beschrijving *</label>
                    <input id="description"
                           type="text"
                           name="description"
                           class="@error('description') is-invalid @enderror form-control"
                           value="{{old('description')}}"/>
                    @error('description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="place" class="form-label">Plaats *</label>
                    <input id="place"
                           type="text"
                           name="place"
                           class="@error('place') is-invalid @enderror form-control"
                           value="{{old('place')}}"/>
                    @error('place')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <input type="submit" value="Voeg agendapunt toe">
                </div>
            </form>
        </div>
    </div>
@endsection
