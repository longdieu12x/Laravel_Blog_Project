@extends('layouts.master')

@section('title', ' Tao bai viet ')

@section('contents')
@foreach ($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
@endforeach

@if (session('success'))
    <div class="alert alert-success">
        Them bai viet thanh cong
    </div>
@endif

<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="title">
            Tieu de:
        </label>
        <input class="form-control" type="text" name="title" value="{{old('title')}}"/>
    </div>
    <div class="form-group">
        <label for="title">
            Noi dung:
        </label>
        <textarea class="form-control" type="text" name="content" id="content" rows="10" value="{{old('content')}}"></textarea>
    </div>
    <h2>The loai:</h2>
    <div class="input-group-text">
      <input type="radio" name="category_id" value="1"> <label htmlFor="category_id" class="pr-4 pl-1">Xa hoi    </label>

      <input type="radio" name="category_id" value="2"> <label htmlFor="category_id" class="pr-4 pl-1">Khoa hoc   </label>

      <input type="radio" name="category_id" value="3"> <label htmlFor="category_id" class="pr-4 pl-1">Lich su  </label>
    </div>
    <div>
        <button  class="btn btn-primary" type="submit">Dang bai</button>
    </div>
</form>
@endsection
