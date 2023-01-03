@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row row-cols-1 row-cols-md-3 g-3">
                @foreach($users as $user)
                    <div class="col-mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>{{$user->name}} {{$user->lastname}}</h4>
                                </div>
                                <div class="card-text">
                                    <p>{{$user->email}}</p>
                                    <p>{{$user->phone}}</p>
                                    <p>{{$user->admin_role}}</p>
                                    <p>{{$user->post_role}}</p>
                                </div>
                                <div class="col">
                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-success">Bewerk gebruiker</a>
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
