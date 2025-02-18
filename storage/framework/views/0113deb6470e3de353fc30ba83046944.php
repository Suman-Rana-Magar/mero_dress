<?php $__env->startSection('title','Admin | Review'); ?>

<?php $__env->startSection('head','Reviews'); ?>

<?php $__env->startSection('body'); ?>

<table class="table table-striped-columns">
    <thead>
        <th>ID</th>
        <th>Customer ID</th>
        <th>Product ID</th>
        <th>Rating(Out Of 10)</th>
        <th>Comments</th>
        <th>Date</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($review->id); ?></td>
            <td><?php echo e($review->customer_id); ?></td>
            <td><?php echo e($review->product_id); ?></td>
            <td><?php echo e($review->rating); ?></td>
            <td><?php echo e($review->comments); ?></td>
            <td><?php echo e($review->created_at); ?></td>
            <td>
                <a href="<?php echo e(route('reviews.update',$review->id)); ?>"><i style="color: blue; font-size: 25px;" class="fa-solid fa-circle-check" title="Allow Review"></i></a>
                <a href="<?php echo e(route('reviews.destroy',$review->id)); ?>"><i style="color: red; font-size: 25px;" class="fa-solid fa-circle-xmark" title="Deny Review"></i></a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suman/mero_dress/resources/views/admin/reviews.blade.php ENDPATH**/ ?>