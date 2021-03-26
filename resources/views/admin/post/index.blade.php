@extends('layouts.dashboard')

@section('title', 'All Data Posts')

@section('content')
<div class="d-flex justify-content-flex-start flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">All Posts</h1>
    <a class="btn btn-success ml-5" href="{{ Route('post.create') }}" role="button">Aggiungi</a>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-light table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Contenuto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post) 
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td class="w-25">{{ $post->content }}</td>
                        <td class="text-right">
                            <a class="btn btn-success" href="{{ Route('post.show', $post->id) }}">View</a>
                            <a class="btn btn-warning" href="{{ Route('post.edit',  $post->id) }}">Edit</a>
                            <form class="d-inline-block" method="post" action="{{ Route('post.destroy', $post->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
