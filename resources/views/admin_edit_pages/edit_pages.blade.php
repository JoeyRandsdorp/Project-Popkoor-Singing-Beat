@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Bewerk de openbare pagina's</h1>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p>Op deze pagina kan je naar de pagina gaan die je wilt bewerken.</p>
                            <p>Deze pagina's zijn te zien door iedereen, dus ook de bezoekers van deze website.</p>
                        </div>
                        <br>
                        <div>
                            <ul>
                                <li><a href="/admin/welcome">Welkomstpagina</a></li>
                                <li><a href="/admin/info">Informatiepagina</a></li>
                                <li><a href="/admin/repertoire">Repertoire voor bezoekers</a></li>
                                <li><a href="/admin/calendar">Agenda</a></li>
                                <li><a href="/admin/introduction">Introductiepagina</a></li>
                                <li><a href="/admin/photo_albums">Fotoalbums</a></li>
                                <li><a href="/admin/contact">Contactpagina</a></li>
                                <li><a href="/admin/archive">Archief</a></li>
                                <li><a href="/admin/sponsors">Sponsors</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
