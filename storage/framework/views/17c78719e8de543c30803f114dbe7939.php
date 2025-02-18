<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">


<?php $__env->startSection('title','Cart'); ?>

<style>
    .final
    {
        font-size: 20px;
        font-weight: bold;
    }
</style>

<?php $__env->startSection('body'); ?>

<?php if(Auth::user()): ?>

<?php if($carts->isNotEmpty()): ?>

<table style="width: 95%; text-align: center; margin: 0 2.5%;" class="table table-striped-columns">
    <thead>
        <th>ID</th>
        <th>Product</th>
        <th>Image</th>
        <th>Quantity</th>
        <th>Per Price(Rs.)</th>
        <th>Total Price(Rs.)</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php
            $total_quantity = 0;
            $total_cost = 0;
        ?>
        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($cart->product_id); ?></td>
            <td><?php echo e($cart->product); ?></td>
            <td><img style="height: 50px; width: auto; max-width: 50px;" src='<?php echo e(asset("storage/" . $cart->image)); ?>' alt=''></td>
            <td><?php echo e($cart->product_quantity); ?></td>
            <td><?php echo e($cart->per_price); ?></td>
            <td><?php echo e($cart->total_price); ?></td>
            <td>
                <!-- <a href='<?php echo e(route("products.edit",$cart->id)); ?>'><i style="color: blue; font-size: 25px;" class="fa-regular fa-pen-to-square"></i></a> -->
                <a href="<?php echo e(route('carts.destroy',$cart->product_id)); ?>"><i style="color: red; font-size: 25px;" class="fa-regular fa-trash-can"></i></a>
            </td>
            <?php
            $total_quantity += $cart->product_quantity;
            $total_cost += $cart->total_price;
            ?>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td></td>
            <td></td>
            <td class="final" style="color: green;">Total</td>
            <td class="final" style="color: green;"><?php echo e($total_quantity); ?></td>
            <td></td>
            <td class="final" style="color: green;"><?php echo e($total_cost); ?></td>
            <td><a href="<?php echo e(route('orders.create')); ?>"><button type="button" class="btn btn-success">Order</button></a></td>
        </tr>
    </tbody>
</table>

<?php if(session('success')): ?>
<div class="alert alert-success" style="width: 400px; margin: auto;">
    <?php echo e(session('success')); ?>

</div>
<?php elseif(session('error')): ?>
<div class="alert alert-danger" style="width: auto; max-width:90%; margin: auto;">
    <?php echo e(session('error')); ?>

</div>
<?php endif; ?>

<?php else: ?>

<h2 style="text-align: center;">Your Cart Is Empty !</h2>

<?php endif; ?>

<?php else: ?>

<h2 style="text-align: center;">Please Login To Check Your Cart !</h2>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suman/mero_dress/resources/views/carts/index.blade.php ENDPATH**/ ?>