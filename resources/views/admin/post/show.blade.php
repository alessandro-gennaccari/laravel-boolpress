@extends('layouts.dashboard')

@section('title', 'All Info Post')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Info Post</h1>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-light table-striped">
                <thead>
                    <tr>
                        <th scope="col">#Post</th>
                        <th scope="col">#User</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Contenuto</th>
                        <th scope="col">Image</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nome</th>
                    </tr>
                </thead>
                <tbody> 
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->user_id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->content }}</td>
                        <td><img class="w-75" src="{{asset('storage/'.$post->cover)}}" alt="{{$post->title}}"></td>
                        <td>{{ $post->user->email }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td class="text-right">
                            <a class="btn btn-info" href="{{ Route('post.index') }}">Back</a>
                            <a class="btn btn-warning" href="{{ Route('post.edit',  $post->id) }}">Edit</a>
                            <form class="d-inline-block" method="post" action="{{ Route('post.destroy', $post->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
