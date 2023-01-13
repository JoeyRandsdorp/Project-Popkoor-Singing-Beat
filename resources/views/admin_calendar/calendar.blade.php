@extends('layouts.app')

@section('title', 'Agenda Admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/edit_pages">< Terug</a>
            <br><br>
            <h1>Agenda</h1>
            <div class="col">
                <a href="{{route('calendar.create')}}" class="btn btn-success">Maak een nieuw agendapunt aan</a>
            </div>
            <br>
            <div>
                <table class="table-bordered" style="width: 100%">
                    <tr>
                        <th>Datum</th>
                        <th>Tijd</th>
                        <th>Wat</th>
                        <th>Beschrijving</th>
                        <th>Plaats</th>
                        <th>Agendapunt aanpassen</th>
                        <th>Agendapunt verwijderen</th>
                    </tr>
                    @foreach($calendar_dates as $calendar_date)
                        <tr>
                            <td>{{date('d-m-Y', strtotime($calendar_date->date))}}</td>
                            @if($calendar_date->start_time === null)
                                <td>Geen tijd bekend</td>
                            @elseif($calendar_date->end_time === null)
                                <td>{{date('G:i', strtotime($calendar_date->start_time))}}</td>
                            @else
                            <td>{{date('G:i', strtotime($calendar_date->start_time))}} - {{date('G:i', strtotime($calendar_date->end_time))}}</td>
                            @endif
                            <td>{{$calendar_date->title}}</td>
                            <td>{{$calendar_date->description}}</td>
                            <td>{{$calendar_date->place}}</td>
                            <td><a href="{{route('calendar.edit', $calendar_date->id)}}" class="btn btn-success">Bewerk</a></td>
                            <td>
                                <form action="{{route('calendar.destroy', $calendar_date->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Verwijder</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
