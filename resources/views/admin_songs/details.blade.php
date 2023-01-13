@extends('layouts.app')

@section('title', $song->title)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/songs">< Terug</a>
            <br><br>
            <div class="card">
                <div class="card-header">
                    <h1>{{$song->artist}} - {{$song->title}}</h1>
                </div>
                <div class="card-body">
                    <div>
                        @if($song->visibility === 1)
                            <h4>Dit muzieknummer is zichtbaar voor leden</h4>
                        @else
                            <h4>Dit muzieknummer is onzichtbaar voor leden</h4>
                        @endif
                    </div>
                    <br>
                    <div>
                        <a href="{{route('songs.edit', $song->id)}}" class="btn btn-success btn-sm">Bewerk '{{$song->title}}'</a>
                    </div>
                    <br>
                    <div>
                        <form action="{{route('songs.destroy', $song->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Verwijder '{{$song->title}}'</button>
                        </form>
                    </div>
                    <hr>
                    <div>
                        <a href="/playlist_song/create?id={{$song->id}}" class="btn btn-success">
                            Voeg muzieknummer toe aan afspeellijst
                        </a>
                    </div>
                    <br>
                    <div class="card-image">
                        <img style="width: 300px; float: right; margin-left: 50px"
                             src="{{ asset('storage/'. $song->image) }}"
                             alt="Albumcover van {{$song->title}} door {{$song->artist}}">
                    </div>
                    <br>
                    <div>
                        <audio controls style="width: 60%;">
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
                            <iframe src="{{ asset('storage/'. $song->lyrics) }}" style="width: 60%; height: 400px"></iframe>
                        </div>
                    @endif
                    <br>
                    @if($song->translation === null)
                        <div>
                            <p>(Nog) geen songtekst vertaling beschikbaar</p>
                        </div>
                    @else
                        <div>
                            <iframe src="{{ asset('storage/'. $song->translation) }}" style="width: 60%; height: 400px"></iframe>
                        </div>
                    @endif
                    <br>
                    @if($song->sheet_music === null)
                        <div>
                            <p>(Nog) geen bladmuziek beschikbaar</p>
                        </div>
                    @else
                        <div>
                            <iframe src="{{ asset('storage/'. $song->sheet_music) }}" style="width: 60%; height: 400px"></iframe>
                        </div>
                    @endif
                    <br>
                    <div>
                        <div>
                            <a href="{{route('voice_parts.create', "id=" . $song->id)}}" class="btn btn-success">Voeg een stempartij toe</a>
                        </div>
                        <br>
                        <table class="table-bordered" style="width: 100%;">
                            <tr>
                                <th>Stempartij</th>
                                <th>Afspelen</th>
                                <th>Verwijder Stempartij</th>
                            </tr>
                            @foreach($voice_parts as $voice_part)
                                <tr>
                                    <th>{{$voice_part->title}}</th>
                                    <th>
                                        <audio controls style="width: 350px;">
                                            <source src="{{ asset('storage/' . $voice_part->sound) }}" type="audio/mpeg">
                                        </audio>
                                    </th>
                                    <th>
                                        <form action="{{route('voice_parts.destroy', $voice_part->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Verwijder</button>
                                        </form>
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
