@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('users.store')}}" method="post">
                @csrf
                <div>
                    <label for="name" class="form-label">Voornaam</label>
                    <input id="name"
                           type="text"
                           name="name"
                           class="@error('name') is-invalid @enderror form-control"
                           value="{{old('name')}}"
                           required autocomplete="name" autofocus/>
                    @error('name')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="lastname" class="form-label">Achternaam</label>
                    <input id="lastname"
                           type="text"
                           name="lastname"
                           class="@error('lastname') is-invalid @enderror form-control"
                           value="{{old('lastname')}}"
                           required autocomplete="lastname" autofocus/>
                    @error('lastname')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="email" class="form-label">E-mailadres</label>
                    <input id="email"
                           type="email"
                           name="email"
                           class="@error('email') is-invalid @enderror form-control"
                           value="{{old('email')}}"
                           required autocomplete="email" autofocus/>
                    @error('email')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="phone" class="form-label">Telefoonnummer</label>
                    <input id="phone"
                           type="text"
                           name="phone"
                           class="@error('phone') is-invalid @enderror form-control"
                           value="{{old('phone')}}"
                           required autocomplete="phone" autofocus/>
                    @error('phone')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="admin" class="form-label">Adminrol aan- of uitzetten</label>

                    <div class="col-md-6">
                        <input id="admin" type="hidden" name="admin" value="0">
                        <input id="admin" type="checkbox" name="admin" value="1">
                    </div>
                </div>
                <div>
                    <label for="post" class="form-label">Postrol aan- of uitzetten</label>

                    <div class="col-md-6">
                        <input id="post" type="hidden" name="post" value="0">
                        <input id="post" type="checkbox" name="post" value="1">
                    </div>
                </div>
                <div>
                    <label for="password" class="form-label">Wachtwoord</label>
                    <input id="password"
                           type="password"
                           name="password"
                           class="@error('password') is-invalid @enderror form-control"
                           required autocomplete="new-password"/>
                    @error('password')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="password-confirm" class="form-label">Wachtwoord bevestigen</label>
                    <input id="password-confirm"
                           type="password"
                           name="password-confirm"
                           class="@error('password-confirm') is-invalid @enderror form-control"
                           required autocomplete="new-password"/>
                    @error('password-confirm')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <input type="submit" value="Maak gebruiker aan">
                </div>
            </form>
        </div>
    </div>
@endsection
