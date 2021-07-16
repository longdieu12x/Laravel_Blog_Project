<?php $__env->startSection('title', ' Tao bai viet '); ?>

<?php $__env->startSection('contents'); ?>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="alert alert-danger"><?php echo e($error); ?></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if(session('success')): ?>
    <div class="alert alert-success">
        Sua bai viet thanh cong
    </div>
<?php endif; ?>

<form action="<?php echo e(route('posts.update',['post' => $post->id])); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>
    <div class="form-group">
        <label for="title">
            Tieu de:
        </label>
        <input class="form-control" type="text" name="title" value="<?php echo e($post->title); ?>"/>
    </div>
    <div class="form-group">
        <label for="title">
            Noi dung:
        </label>
        <textarea class="form-control" type="text" name="content" id="content" rows="10" value="<?php echo e($post->content); ?>"><?php echo e($post->content); ?></textarea>
    </div>
    <div>
        <button  class="btn btn-primary" type="submit">Dang bai</button>
    </div>
</form>
<form method="post" action="<?php echo e(route('posts.destroy',['post' => $post->id])); ?>">
    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
    <button  class="btn btn-danger" type="submit">Xoa bai</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Newfolder\.vscode\.vscode\C\Khoa_hoc_fullStack\Laravel\project\resources\views/posts/edit.blade.php ENDPATH**/ ?>