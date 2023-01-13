@extends('layouts.app')

@section('title', 'Bewerk gebruiker ' . $user->name . ' ' . $user->lastname)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/users">< Terug</a>
            <br><br>
            <h1>Bewerk de gebruiker {{$user->name}} {{$user->lastname}}</h1>
            <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div>
                    <label for="name" class="form-label">Voornaam</label>
                    <input id="name"
                           type="text"
                           name="name"
                           class="@error('name') is-invalid @enderror form-control"
                           value="{{$user->name}}"/>
                    @error('name')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="lastname" class="form-label">Achternaam</label>
                    <input id="lastname"
                           type="text"
                           name="lastname"
                           class="@error('lastname') is-invalid @enderror form-control"
                           value="{{$user->lastname}}"/>
                    @error('lastname')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="email" class="form-label">E-mailadres</label>
                    <input id="email"
                           type="email"
                           name="email"
                           class="@error('email') is-invalid @enderror form-control"
                           value="{{$user->email}}"/>
                    @error('email')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="phone" class="form-label">Telefoonnummer</label>
                    <input id="phone"
                           type="text"
                           name="phone"
                           class="@error('phone') is-invalid @enderror form-control"
                           value="{{$user->phone}}"/>
                    @error('phone')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div>
                    <label for="admin" class="form-label">Adminrol aan- of uitzetten</label>

                    <div class="col-md-6">
                        <input id="admin" type="hidden" name="admin" value="0">
                        @if ($user->admin_role === 0)
                            <input id="admin" type="checkbox" name="admin" value="1">
                        @else
                            <input id="admin" type="checkbox" name="admin" value="1" checked>
                        @endif
                    </div>
                </div>
                <br>
                <div>
                    <label for="post" class="form-label">Postrol aan- of uitzetten</label>

                    <div class="col-md-6">
                        <input id="post" type="hidden" name="post" value="0">
                        @if ($user->post_role === 0)
                            <input id="post" type="checkbox" name="post" value="1">
                        @else
                            <input id="post" type="checkbox" name="post" value="1" checked>
                        @endif
                    </div>
                </div>
                <br>
                <div>
                    <input type="submit" value="Wijzigingen opslaan">
                </div>
            </form>
        </div>
    </div>
@endsection
