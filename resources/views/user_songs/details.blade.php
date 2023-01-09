@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{$song->artist}} - {{$song->title}}</h1>
                </div>
                <div class="card-body">
                    <div class="card-image">
                        <img style="width: 50%;" src="{{ asset('storage/'. $song->image) }}" alt="">
                    </div>
                    <br>
                    <div>
                        <a href="/playlist_song/create?id={{$song->id}}" class="btn btn-success">
                            Voeg muzieknummer toe aan afspeellijst
                        </a>
                    </div>
                    <br>
                    <div>
                        <audio controls style="width: 100%;">
                            <source src="{{ asset('storage/' . $song->full_song) }}" type="audio/mpeg">
                        </audio>
                    </div>
                    <br>
                    @if($song->lyrics === null)
                        <div>
                            <p>(Nog) geen songtekst beschikbaar</p>
                        </div>
                    @else
                        <div>
                            <embed src="{{ asset('storage/' . $song->lyrics) }}">
                        </div>
                    @endif
                    <br>
                    @if($song->translation === null)
                        <div>
                            <p>(Nog) geen songtekst vertaling beschikbaar</p>
                        </div>
                    @else
                        <div>
                            <embed src="{{ asset('storage/' . $song->translation) }}">
                        </div>
                    @endif
                    <br>
                    @if($song->sheet_music === null)
                        <div>
                            <p>(Nog) geen bladmuziek beschikbaar</p>
                        </div>
                    @else
                        <div>
                            <embed src="{{ asset('storage/' . $song->sheet_music) }}">
                        </div>
                    @endif
                    <br>
                    <div>
                        <table class="table-bordered" style="width: 100%;">
                            <tr>
                                <th>Stempartij</th>
                                <th>Afspelen</th>
                            </tr>
                            @foreach($voice_parts as $voice_part)
                                <tr>
                                    <th>{{$voice_part->title}}</th>
                                    <th>
                                        <audio controls style="width: 100%;">
                                            <source src="{{ asset('storage/' . $voice_part->sound) }}" type="audio/mpeg">
                                        </audio>
                                    </th>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
