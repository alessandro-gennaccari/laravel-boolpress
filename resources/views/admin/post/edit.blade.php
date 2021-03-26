@extends('layouts.dashboard')

@section('title', 'Edit Post')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div>
<div class="container-fluid">
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{Route('post.update', $editPost->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="inputtitle" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="inputtitle" name="title" value="{{$editPost->title}}">
                </div>
                <div class="mb-3">
                    <label for="inputcontent" class="form-label">Contenuto</label>
                    <textarea class="form-control" id="inputcontent" rows="3" name="content">{{$editPost->content}}</textarea>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        @foreach ($tags as $tag)
                        <div class="input-group-text mr-2">
                            <input type="checkbox" aria-label="Checkbox for following text input" name="tags[]" value="{{$tag->id}}" {{ $editPost->tags->contains($tag->id) ? 'checked' : '' }}>
                            <span class="ml-3">{{$tag->name}}</span>
                        </div>
                      @endforeach
                    </div>
                </div>
                <a class="btn btn-info col-1" href="{{ Route('post.index') }}">Back</a>
                <button type="submit" class="btn btn-warning col-1">Edit</button>
            </form>
            <form class="mt-2 pl-1" method="post" action="{{ Route('post.destroy', $editPost->id) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger col-2">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
