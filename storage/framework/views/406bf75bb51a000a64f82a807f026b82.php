<?php $__env->startSection('title','Admin | Stocks'); ?>

<?php $__env->startSection('head','Stocks'); ?>
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
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Quantity(Total)</th>
        <!-- <th>Product Quantity(Remaining)</th> -->
        <th>Actions</th>
    </thead>
    <tbody>
        <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($stock->stockId); ?></td>
            <td><?php echo e($stock->productId); ?></td>
            <td><?php echo e($stock->title); ?></td>
            <td><?php echo e($stock->product_quantity); ?></td>
            <!-- <td>बाँकी</td> -->
            <td>
                <a style="margin-left: 20px;" href="<?php echo e(route('stocks.show',$stock->productId)); ?>" title="See More"><i style="font-size: 25px;" class="fa-solid fa-circle-chevron-right"></i></a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div id="paginate">
<?php echo e($stocks->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts/admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suman/mero_dress/resources/views/stocks/index.blade.php ENDPATH**/ ?>