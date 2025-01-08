
<?php $__env->startSection('content'); ?>

<div class="card text-center mt-5 mb-5">
  <div class="card-header">
    #<?php echo e($Post->id); ?>

  </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo e($Post->title); ?></h5>
    <p class="card-text"><?php echo e($Post->description); ?></p>
   
  </div>
  <div class="card-footer text-muted">
  <?php echo e(date('y-m-d', strtotime($Post->created_at))); ?>

  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DESHAN\OneDrive\Desktop\laravel\demo\myblog\resources\views/posts/show.blade.php ENDPATH**/ ?>