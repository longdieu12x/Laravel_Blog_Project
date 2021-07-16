<?php $__env->startSection('title',$category->name); ?>
<?php $__env->startSection('contents'); ?>
    <div>
        <a class="back--home" href="<?php echo e(route('home')); ?>">Quay lai trang chu</a>
        <h2>Cac bai viet thuoc chuyen muc: <?php echo e($category->types); ?></h2>
        <ul>
            <?php $__currentLoopData = $category->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('posts.show', ['post' => $post->id])); ?>"><?php echo e($post->title); ?></a></li>
                <?php if($post['created_by'] == $user['username'] || $user['role'] == 'admin'): ?>
                    <a class="text-danger" href="<?php echo e(route('posts.edit',['post' => $post->id])); ?>">Edit</a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Newfolder\.vscode\.vscode\C\Khoa_hoc_fullStack\Laravel\project\resources\views/posts/category.blade.php ENDPATH**/ ?>