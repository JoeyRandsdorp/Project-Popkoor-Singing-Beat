@extends('layouts.app')

@section('title', 'Alle gebruikers')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Alle gebruikers</h1>
            <a href="{{route('users.create')}}" class="btn btn-success">Maak een nieuwe gebruiker</a>
            <br><br>
            <div class="row row-cols-1 row-cols-md-3 g-3">
                @foreach($users as $user)
                    <div class="col-mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>{{$user->name}} {{$user->lastname}}</h4>
                                </div>
                                <div class="card-text">
                                    <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                                    <br>
                                    <a href="tel:0{{$user->phone}}">+31 {{$user->phone}}</a>
                                    <br><br>
                                    @if($user->admin_role === 1)
                                        <p>Admin-rol: ja</p>
                                    @else
                                        <p>Admin-rol: nee</p>
                                    @endif
                                    @if($user->post_role === 1)
                                        <p>Berichten-rol: ja</p>
                                    @else
                                        <p>Berichten-rol: nee</p>
                                    @endif
                                </div>
                                <div class="col">
                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-success btn-sm">Bewerk gebruiker</a>
                                </div>
                                <br>
                                <div class="col">
                                    <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Verwijder gebruiker</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
