@extends('layouts.dashboard')

@section('title', 'Profile')

@section('content')
<div class="d-flex justify-content-flex-start flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Profile</h1>
</div>
<div class="container-fluid">
    <div class="card" style="width: 18rem;">
        <div class="card-header">
            Profile
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ Auth::user()->name }}</li>
            <li class="list-group-item">{{ Auth::user()->email }}</li>
            <li class="list-group-item">
                @if(Auth::user()->api_token)
                {{Auth::user()->api_token}}
                @else
                <form action="{{ route('genera-token') }}" method="post">
                    @csrf
                    @method('POST')
                    <button class="btn btn-primary">Genera Token</button>
                </form>
                @endif
            </li>
        </ul>
    </div>
</div>
@endsection