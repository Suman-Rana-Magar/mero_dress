<?php $__env->startSection('title','Category | Edit'); ?>

<?php $__env->startSection('head'); ?>
<style>
    a {
        text-decoration: none;
        color: black;
    }

    a:hover {
        text-decoration: none;
        color: black;
    }
</style>
<a href="<?php echo e(route('admin.categories')); ?>">Categories</a>/Edit
<?php $__env->stopSection(); ?>

<style>
    #input-field {
        margin: auto;
        width: 95%;
    }
</style>

<?php $__env->startSection('body'); ?>
<div style="margin-top: 10px; border-style: groove; border-radius: 20px;">
    <form action="<?php echo e(route('categories.update',$category->id)); ?>" method="post">
        <?php echo csrf_field(); ?>

        <div style="margin-top: 10px;" class="mb-3" style="width: 90%; margin: auto;" id="input-field">
            <label for="category" class="form-label">Category Name</label>
            <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="category" name="name" value="<?php echo e(old('name',$category->name)); ?>">
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div style="text-align: center; margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts/admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suman/mero_dress/resources/views/categories/edit.blade.php ENDPATH**/ ?>