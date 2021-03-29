@extends('layouts.app')

@section('title', 'Contacts')

@section('content')
<div class="container pt-5">

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{Route('guest.contact.sent')}}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="message">Messaggio</label>
            <textarea class="form-control" id="message" name="message">{{ old('message') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Invia</button>
    </form>

</div>
@endsection