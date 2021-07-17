@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">{{ __('Welcome, Minh Dang! You can post or read posts in this blog!') }}</div>

                <ul class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <li class="list-group-item list-group-item-primary color-white"><a href="{{route('posts.create')}}">Create post</a></li>
                    <li class="list-group-item list-group-item-success"><a href="{{route('posts.index')}}">View posts</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
