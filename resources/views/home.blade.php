@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (auth()->user()?->admin_role !== 1)
                    <a href="/posts">Bekijk alle berichten</a>
                    @else
                    <a href="/admin/posts">Bekijk alle berichten</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
