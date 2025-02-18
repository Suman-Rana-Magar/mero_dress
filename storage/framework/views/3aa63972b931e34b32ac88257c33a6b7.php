<?php $__env->startSection('title','Admin | Orders'); ?>

<?php $__env->startSection('head','Orders'); ?>
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
        <th>Customer ID</th>
        <th>Product ID</th>
        <th>Product Quantity</th>
        <th>Per Price</th>
        <th>Total Price</th>
        <th>Shipping Address</th>
        <th>Status</th>
        <th>Deliver</th>
        <th>Ordered Date</th>
    </thead>
    <tbody>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($order->id); ?></td>
            <td><?php echo e($order->customer_id); ?></td>
            <td><?php echo e($order->product_id); ?></td>
            <td><?php echo e($order->product_quantity); ?></td>
            <td><?php echo e($order->per_price); ?></td>
            <td><?php echo e($order->total_price); ?></td>
            <td><?php echo e($order->shipping_address); ?></td>
            <?php if($order->status == 'pending'): ?>
            <td><button type="button" class="btn btn-primary" style="padding: 2px 7px;"><?php echo e($order->status); ?></button></td>
            <?php else: ?>
            <td><button type="button" class="btn btn-success" style="padding: 2px 7px;"><?php echo e($order->status); ?></button></td>
            <?php endif; ?>
            <?php if($order->status == 'pending'): ?>
            <td><a href="<?php echo e(route('orders.deliver',$order->id)); ?>"><i style="font-size: 20px;" class="fa-solid fa-circle-check"></i></a></td>
            <?php else: ?>
            <td>—</td>
            <?php endif; ?>
            <td><?php echo e($order->created_at); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div id="paginate">
<?php echo e($orders->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts/admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suman/mero_dress/resources/views/orders/index.blade.php ENDPATH**/ ?>