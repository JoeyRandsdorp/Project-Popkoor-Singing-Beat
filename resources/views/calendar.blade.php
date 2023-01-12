@extends('layouts.app')

@section('title', 'Popkoor Singing Beat - Agenda')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Agenda</h1>
            <div>
                <table class="table-bordered" style="width: 100%">
                    <tr>
                        <th>Datum</th>
                        <th>Tijd</th>
                        <th>Wat</th>
                        <th>Beschrijving</th>
                        <th>Plaats</th>
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
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
