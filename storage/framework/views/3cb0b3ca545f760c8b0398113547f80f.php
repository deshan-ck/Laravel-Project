

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Edit Post')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="post" action="<?php echo e(route('posts.update', $Post->id)); ?>">
                    <?php echo csrf_field(); ?> 
  <div class="form-group">
    <label>Post Title</label>
    <input type="text" name="title" class="form-control"  placeholder="Enter Post Tiltle" required>
  </div>

  <div class="form-group">
    <label>Post Description</label>
    <textarea class="form-control" name= "description" placeholder="Enter Post Description" rows="10" required></textarea>
  </div>
  <div class="form-space">
    <label>  </label>

  </div>
  
  <button type="submit" class="btn btn-primary">UPDATE</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DESHAN\OneDrive\Desktop\laravel\demo\myblog\resources\views/posts/edit.blade.php ENDPATH**/ ?>