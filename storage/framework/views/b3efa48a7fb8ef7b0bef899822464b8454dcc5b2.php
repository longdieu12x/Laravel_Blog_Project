<?php $__env->startSection('title', ' Tao bai viet '); ?>

<?php $__env->startSection('contents'); ?>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="alert alert-danger"><?php echo e($error); ?></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if(session('success')): ?>
    <div class="alert alert-success">
        Them bai viet thanh cong
    </div>
<?php endif; ?>

<form action="<?php echo e(route('posts.store')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="title">
            Tieu de:
        </label>
        <input class="form-control" type="text" name="title" value="<?php echo e(old('title')); ?>"/>
    </div>
    <div class="form-group">
        <label for="title">
            Noi dung:
        </label>
        <textarea class="form-control" type="text" name="content" id="content" rows="10" value="<?php echo e(old('content')); ?>"></textarea>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Newfolder\.vscode\.vscode\C\Khoa_hoc_fullStack\Laravel\project\resources\views/posts/create.blade.php ENDPATH**/ ?>