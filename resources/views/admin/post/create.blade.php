@extends('layouts.dashboard')

@section('title', 'Create Post')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Crea Post</h1>
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
            <form action="{{Route('post.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="inputtitle" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="inputtitle" name="title" value="{{ old('title')}}">
                </div>
                <div class="mb-3">
                    <label for="inputcontent" class="form-label">Contenuto</label>
                    <textarea class="form-control" id="inputcontent" rows="3" name="content">{{ old('content') }}</textarea>
                </div>
                <a class="btn btn-info" href="{{ Route('post.index') }}">Back</a>
                <button type="submit" class="btn btn-success">Crea</button>
            </form>
        </div>
    </div>
</div>
@endsection