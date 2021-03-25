@extends('layouts.app')

@section('title', 'Post Collections')

@section('content')
<div class="container pt-5">

    <div class="d-flex position-relative mb-4 p-4 bg-dark text-light border border-warning rounded">
        <div>
            <h5 class="mt-0">{{ $info->title }}</h5>
            <p>{{ $info->content }}</p>
            <p class="text-right mt-4 mb-0">{{ $info->user->name }} - Contatti: {{ $info->user->email }}</p>
        </div>
    </div>

</div>
@endsection