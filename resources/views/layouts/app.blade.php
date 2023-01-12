<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @guest
                    @if(Route::has('login'))
                        <a class="navbar-brand" href="{{ url('/') }}">Popkoor Singing Beat</a>

                    @endif
                    @else
                        <a class="navbar-brand" href="{{ url('/home') }}">Popkoor Singing Beat</a>
                @endguest
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @guest
                            @if(Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="/info">Waar, wat & wanneer</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/introduction">Even voorstellen</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/repertoire">Repertoire</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/calendar">Agenda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/photo_albums">Fotoalbums</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/archive">Archief</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/contact">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/sponsors">Sponsors</a>
                                </li>
                            @endif
                        @else
                            @if(auth()->user()?->admin_role === 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/posts">Berichten</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/songs">Repertoire leden</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/playlists">Playlists</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/edit_pages">Bewerk openbare pagina's</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/users">Gebruikers</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="/posts">Berichten</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/songs">Repertoire</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/playlists">Playlists</a>
                                </li>
                            @endif
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
