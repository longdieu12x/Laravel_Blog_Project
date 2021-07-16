<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header "><?php echo e(__('Welcome, Minh Dang! You can post or read posts in this blog!')); ?></div>

                <ul class="card-body text-center">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <li class="list-group-item list-group-item-primary color-white"><a href="<?php echo e(route('posts.create')); ?>">Create post</a></li>
                    <li class="list-group-item list-group-item-success"><a href="<?php echo e(route('posts.index')); ?>">View posts</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Newfolder\.vscode\.vscode\C\Khoa_hoc_fullStack\Laravel\project\resources\views/home.blade.php ENDPATH**/ ?>