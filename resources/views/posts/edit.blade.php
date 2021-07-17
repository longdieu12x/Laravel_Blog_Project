@extends('layouts.master')

@section('title', ' Tao bai viet ')

@section('contents')
@foreach ($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
@endforeach

@if (session('success'))
    <div class="alert alert-success">
        Sua bai viet thanh cong
    </div>
@endif

<form action="{{ route('posts.update',['post' => $post->id]) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="title">
            Tieu de:
        </label>
        <input class="form-control" type="text" name="title" value="{{ $post->title }}"/>
    </div>
    <div class="form-group">
        <label for="title">
            Noi dung:
        </label>
        <textarea class="form-control" type="text" name="content" id="content" rows="10" value="{{ $post->content }}">{{$post->content}}</textarea>
    </div>
    <div>
        <button  class="btn btn-primary" type="submit">Dang bai</button>
    </div>
</form>
<form method="post" action="{{ route('posts.destroy',['post' => $post->id]) }}">
    @csrf @method('DELETE')
    <button  class="btn btn-danger" type="submit">Xoa bai</button>
</form>
@endsection
