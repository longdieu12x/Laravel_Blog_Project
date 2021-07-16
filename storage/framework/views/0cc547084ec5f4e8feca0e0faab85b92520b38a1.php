<?php $__env->startSection('title',$post->title); ?>

<?php $__env->startSection('contents'); ?>
    <div>
        <a href="<?php echo e(route('posts.index')); ?>">Quay lai trang chu</a>
        <h1><?php echo e($post->title); ?></h1>
        <div> <?php echo e($post->content); ?> </div>
        <div class="">
            Comments:
            <ul class="list-group">
                <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item disabled"><?php echo e($comment->content); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <br>
            <form class="input-group mb-3" method="post" action="<?php echo e(route('posts.comment',['post' => $post->id] )); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?>
                <input class="form-control" type="text" name="content" value=""/>
                <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Binh luan</button>
            </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Newfolder\.vscode\.vscode\C\Khoa_hoc_fullStack\Laravel\project\resources\views/posts/detail.blade.php ENDPATH**/ ?>