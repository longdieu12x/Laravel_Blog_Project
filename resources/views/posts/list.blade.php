
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?php echo asset('style.css')?>" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <title>Document</title>
    <style>
        .back--home {
            text-decoration: none;
            color: red;
        }
        h1{
            color: blue;
        }
        li{
            text-decoration: none;
            list-style: none;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <a class="back--home" href="{{route('home')}}">Quay lai trang chu</a>
    <h1>Chon bai theo the loai:</h1>
    <ul>
        @foreach($categories as $category)
            <li><a href="{{route('posts.category',['category' => $category->id])}}">{{$category->types}}</a></li>
        @endforeach
    </ul>
    <h1>Cac bai viet tieu bieu</h1>
    <div class="pagination ml-2">
        <a class="">{{$posts->links()}}</a>
    </div>
    <ul>
    @foreach ($posts as $post)
        <li><a class="text-primary" href="{{ route('posts.show',['post' => $post->id]) }}" >Title: {{$post->title}}</a>
        @if ($post['created_by'] == $user['username'] || $user['role'] == 'admin')
        <a class="text-danger" href="{{ route('posts.edit',['post' => $post->id]) }}">Edit</a>
        @endif
        </li>
    @endforeach
    </ul>
</body>
</html>
