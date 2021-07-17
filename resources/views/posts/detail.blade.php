@extends('layouts.master')
@section('title',$post->title)

@section('contents')
    <div>
        <a href="{{route('posts.index')}}">Quay lai trang chu</a>
        <h1>{{ $post->title }}</h1>
        <div> {{$post->content}} </div>
        <div class="">
            Comments:
            <ul class="list-group">
                @foreach ($post->comments as $comment)
                    <li class="list-group-item disabled">{{$comment->content}}</li>
                @endforeach
            </ul>
            <br>
            <form class="input-group mb-3" method="post" action="{{ route('posts.comment',['post' => $post->id] )}}">
                @csrf
                @method('POST')
                <input class="form-control" type="text" name="content" value=""/>
                <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Binh luan</button>
            </div>
            </form>
        </div>
    </div>
@endsection
