<?php $__env->startSection('title','Admin | Stocks'); ?>

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
<a href="<?php echo e(route('stocks.index')); ?>">Stocks</a>/Product Detail(Id:<?php echo e($id); ?>)
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<table class="table table-striped-columns">
    <thead>
        <th>Product Name</th>
        <th>Customer ID</th>
        <th>Product Quantity</th>
        <th>Per Price(Rs.)</th>
        <th>Total Price(Rs.)</th>
        <th>Status</th>
        <th>Date</th>
    </thead>
    <tbody>
        <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <?php if($stock->status == 'Bought'): ?>
            <td><?php echo e($stock->title); ?></td>
            <?php else: ?>
            <td></td>
            <?php endif; ?>
            <?php if($stock->customer_id): ?>
            <td><?php echo e($stock->customer_id); ?></td>
            <?php else: ?>
            <td>—</td>
            <?php endif; ?>
            <td><?php echo e($stock->product_quantity); ?></td>
            <td><?php echo e($stock->per_price); ?></td>
            <td><?php echo e($stock->total_price); ?></td>
            <td><?php echo e($stock->status); ?></td>
            <td><?php echo e($stock->created_date); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <th>Total</th>
        <th></th>
        <th>Available: <?php echo e($availableQuantity); ?></th>
        <th></th>
        <th>Balance: <?php echo e($balance); ?></th>
        <th>Overall</th>
        <th>—</th>
        </tr>
    </tbody>
</table>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('/layouts/admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suman/mero_dress/resources/views/stocks/show.blade.php ENDPATH**/ ?>