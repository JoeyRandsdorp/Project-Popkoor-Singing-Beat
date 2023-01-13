@extends('layouts.app')

@section('title', 'Bewerk ' . $archive->title)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/archive/{{$archive->id}}">< Terug</a>
            <br><br>
            <h1>Bewerk '{{$archive->title}}'</h1>
            <h4>Upload alleen een nieuw bestand als je deze wilt vervangen</h4>
            <form action="{{route('archive.update', $archive->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div>
                    <label for="title" class="form-label">Titel</label>
                    <input id="title"
                           type="text"
                           name="title"
                           class="@error('title') is-invalid @enderror form-control"
                           value="{{$archive->title}}"/>
                    @error('title')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="description" class="form-label">Omschrijving</label>
                    <textarea id="description"
                              name="description"
                              class="@error('description') is-invalid @enderror form-control">{{$archive->description}}</textarea>
                    @error('description')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <div>
                        <label for="date" class="form-label">Datum</label>
                        <input id="date"
                               type="date"
                               name="date"
                               class="@error('date') is-invalid @enderror form-control"
                               value="{{$archive->date}}"/>
                        @error('date')
                        <span>{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <br>
                <div>
                    <label for="pdf" class="form-label">PDF-bestand</label>
                    <input id="pdf"
                           type="file"
                           name="pdf"
                           class="@error('pdf') is-invalid @enderror form-control"
                           value="{{$archive->pdf}}"/>
                    @error('pdf')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <input type="submit" value="Voeg toe aan het archief">
                </div>
            </form>
        </div>
    </div>
@endsection
