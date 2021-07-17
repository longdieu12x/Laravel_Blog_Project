@extends('layouts.master')
@section('title',$category->name)
@section('contents')
    <div>
        <a class="back--home" href="{{route('home')}}">Quay lai trang chu</a>
        <h2>Cac bai viet thuoc chuyen muc: {{ $category->types }}</h2>
        <ul>
            @foreach ($category->posts as $post)
                <li><a href="{{ route('posts.show', ['post' => $post->id]) }}">{{$post->title}}</a></li>
                @if ($post['created_by'] == $user['username'] || $user['role'] == 'admin')
                    <a class="text-danger" href="{{ route('posts.edit',['post' => $post->id]) }}">Edit</a>
                @endif
            @endforeach
        </ul>
    </div>
@endsection
