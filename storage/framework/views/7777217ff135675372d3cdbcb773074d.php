<?php $__env->startSection('title','Admin | Categories'); ?>

<?php $__env->startSection('head','Categories'); ?>
<style>
     #paginate
    {
        margin-top: 20px;
        justify-content: center;
        display: flex;
        align-items: center;
    }
</style>
<?php $__env->startSection('body'); ?>

<table class="table table-striped-columns">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($category->id); ?></td>
            <td><?php echo e($category->name); ?></td>
            <td>
                <a href='<?php echo e(route("categories.edit",$category->id)); ?>'><i style="color: blue; font-size: 25px;" class="fa-regular fa-pen-to-square"></i></a>
                <a href='<?php echo e(route("categories.destroy",$category->id)); ?>'><i style="color: red; font-size: 25px;" class="fa-regular fa-trash-can"></i></a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="color: blue;"></td>
            <td style="color: blue;"></i></td>
            <td>
                <a href="<?php echo e(route('categories.create')); ?>"><i style="font-size: 30px;" class="fa-solid fa-download" title="Insert New Category"></i></a>
            </td>
        </tr>
    </tbody>
</table>
<div id="paginate">
<?php echo e($categories->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts/admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suman/mero_dress/resources/views/admin/categories.blade.php ENDPATH**/ ?>