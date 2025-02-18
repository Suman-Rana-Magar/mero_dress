<?php $__env->startSection('title','Product | Index'); ?>

<?php $__env->startSection('navbar'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('navbar'); ?>

<?php $__env->stopSection(); ?>

<?php if( Session::has('success')): ?>
<?php echo e(Session::get( 'success' )); ?>

<?php elseif( Session::has( 'warning' )): ?>
<?php echo e(Session::get( 'warning' )); ?>

<?php endif; ?>

<style>
    .image-container
    {
        width: auto;
        overflow: hidden;
        margin-top: 6px; 
        margin-left: auto;
        margin-right: auto;
        height: 13rem; 
    }
    .img
    {
        max-width: 220px; 
        width: auto; 
        height: 200px;
        transition: .2s;
    }

    .img:hover {
        transform: scale(1.5);
        width: auto;
    }

    #paginate
    {
        margin-top: 20px;
        justify-content: center;
        display: flex;
        align-items: center;
    }
</style>

<?php $__env->startSection('body'); ?>
<div style="margin-left: 40px; height: 40px; width: 100%; margin-bottom: -20px;">
    <p style="font-size: 20px; font-weight: bold; color: yellow; cursor: default">Home</p>
</div>
<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div style="margin-left: 40px; display: inline-block;">
        <div style="margin-top: 20px;">
            <div class='card text-center' style='width:250px; height: 400px;'>
                <div class="image-container">
                    <img class='img' src='<?php echo e(asset("storage/" . $product->image)); ?>' alt='<?php echo e($product->title); ?>'>
                </div>
                <div class='card-body' style='height: 200px; width: auto; '>
                    <h5 style='margin-top: 0px; margin-bottom: 3px;'><?php echo e(Illuminate\Support\Str::limit($product->title, 22)); ?></h5>
                    <div style='margin-top: 0; height:50px; width: auto; '>
                        <p style='margin-top: 0; margin-bottom: 3px;'><?php echo e(Illuminate\Support\Str::limit($product->description, 50)); ?></p>
                    </div>
                    <h6 style='margin-top: 10px; color: #ff0000; font-size: 20px;'>Rs.<?php echo e($product->selling_price); ?></h6>
                    <!-- <p><s style='color: #4d2600;'>Rs.200</s> -3%</p> -->
                    <a href='<?php echo e(route("products.show",$product->id)); ?>'><button class='btn bg-success' style="color: white;">Detail</button></a>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div id="paginate">
<?php echo e($products->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suman/mero_dress/resources/views/products/index.blade.php ENDPATH**/ ?>