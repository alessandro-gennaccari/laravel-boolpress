@extends('layouts.app')

@section('title', 'Contacts')

@section('content')
<div class="container pt-5">

    <form action="{{Route('guest.contact.sent')}}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="message">Messaggio</label>
          <input type="textarea" class="form-control" id="message" name="message">
        </div>
        <button type="submit" class="btn btn-primary">Invia</button>
      </form>

</div>
@endsection