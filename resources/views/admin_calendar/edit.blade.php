@extends('layouts.app')

@section('title', 'Bewerk agendapunt')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/calendar">< Terug</a>
            <br><br>
            <h1>Bewerk het agendapunt {{$calendar->title}}</h1>
            <form action="{{route('calendar.update', $calendar->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div>
                    <label for="date" class="form-label">Datum</label>
                    <input id="date"
                           type="date"
                           name="date"
                           class="@error('date') is-invalid @enderror form-control"
                           value="{{$calendar->date}}"/>
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
                           value="{{$calendar->start_time}}"/>
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
                           value="{{$calendar->end_time}}"/>
                    @error('end_time')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="title" class="form-label">Titel</label>
                    <input id="title"
                           type="text"
                           name="title"
                           class="@error('title') is-invalid @enderror form-control"
                           value="{{$calendar->title}}"/>
                    @error('title')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="description" class="form-label">Beschrijving</label>
                    <input id="description"
                           type="text"
                           name="description"
                           class="@error('description') is-invalid @enderror form-control"
                           value="{{$calendar->description}}"/>
                    @error('description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="place" class="form-label">Plaats</label>
                    <input id="place"
                           type="text"
                           name="place"
                           class="@error('place') is-invalid @enderror form-control"
                           value="{{$calendar->place}}"/>
                    @error('place')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <input type="submit" value="Wijzigingen opslaan">
                </div>
            </form>
        </div>
    </div>
@endsection
