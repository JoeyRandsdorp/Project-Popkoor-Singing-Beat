@extends('layouts.app')

@section('title', 'Home - ingelogd')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>Welkom {{auth()->user()?->name}}!</h1></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (auth()->user()?->admin_role !== 1)
                        <p>
                            Dit is het leden-gedeelte van de website.
                            Hier kan je berichten bekijken van het bestuur,
                            de muzieknummers vinden die je moet oefenen vinden
                            en deze muzieknummers in je eigen afspeellijsten plaatsen!
                        </p>
                        <p>
                            Gebruik de knoppen in de navigatiebalk om je door de website te navigeren
                            óf gebruik de linkjes hieronder:
                        </p>
                        <ul>
                            @if(auth()->user()?->post_role === 1)
                                <li><a href="/admin/posts">Bekijk alle berichten</a></li>
                            @else
                                <li><a href="/posts">Bekijk alle berichten</a></li>
                            @endif
                            <li><a href="/songs">Ga naar het repertoire</a></li>
                            <li><a href="/playlists">Ga naar jouw playlists</a></li>
                            <li><a href="/playlists/create">Maak een nieuwe playlist</a></li>
                        </ul>
                    @else
                        <p>
                            Dit is het admin-gedeelte van de website.
                            Hier kan je berichten maken, bewerken en verwijderen,
                            muzieknummers toevoegen, bewerken en verwijderen én
                            gebruikers toevoegen, bewerken en verwijderen.
                            Ook kan je hier alle openbare pagina's bewerken!
                        </p>
                        <p>
                            Gebruik de navigatiebalk om je te navigeren over de site
                            óf gebruik de links hieronder:
                        </p>
                        <ul>
                            <li><a href="/admin/posts">Ga naar de berichten</a></li>
                            <li><a href="/admin/songs">Ga naar het repertoire voor de leden</a></li>
                            <li><a href="/admin/users">Ga naar alle gebruikers</a></li>
                            <li><a href="/playlists">Ga naar jouw playlists</a></li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
