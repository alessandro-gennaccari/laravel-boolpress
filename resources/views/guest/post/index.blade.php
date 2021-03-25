@extends('layouts.app')

@section('title', 'Post Collections')

@section('content')
<div class="container pt-5">

    @foreach ($allPost as $item)
    <div class="d-flex position-relative mb-4 p-4 bg-primary text-light border border-info rounded">
        <div>
            <h5 class="mt-0">{{ $item->title }}</h5>
            <p>{{ $item->content }}</p>
            <a href="{{ Route('guest.post.show', $item->slug ) }}" class=" btn btn-light stretched-link">See Info</a>
        </div>
    </div>
    @endforeach

</div>
@endsection