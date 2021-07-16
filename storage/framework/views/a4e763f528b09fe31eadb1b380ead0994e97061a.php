
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
    <a class="back--home" href="<?php echo e(route('home')); ?>">Quay lai trang chu</a>
    <h1>Chon bai theo the loai:</h1>
    <ul>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e(route('posts.category',['category' => $category->id])); ?>"><?php echo e($category->types); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <h1>Cac bai viet tieu bieu</h1>
    <div class="pagination ml-2">
        <a class=""><?php echo e($posts->links()); ?></a>
    </div>
    <ul>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><a class="text-primary" href="<?php echo e(route('posts.show',['post' => $post->id])); ?>" >Title: <?php echo e($post->title); ?></a>
        <?php if($post['created_by'] == $user['username'] || $user['role'] == 'admin'): ?>
        <a class="text-danger" href="<?php echo e(route('posts.edit',['post' => $post->id])); ?>">Edit</a>
        <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</body>
</html>
<?php /**PATH D:\Newfolder\.vscode\.vscode\C\Khoa_hoc_fullStack\Laravel\project\resources\views/posts/list.blade.php ENDPATH**/ ?>