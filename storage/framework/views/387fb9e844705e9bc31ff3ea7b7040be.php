<?php $__env->startSection('title','Admin | Products'); ?>

<?php $__env->startSection('head','Products'); ?>
<style>
    #paginate {
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
        <th>Title</th>
        <th>Quantity</th>
        <th>Description</th>
        <th>Keywords</th>
        <th>Category</th>
        <th>Image</th>
        <th>Cost Price</th>
        <th>Selling Price</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($product->id); ?></td>
            <td><?php echo e($product->title); ?></td>
            <td><?php echo e($product->quantity); ?></td>
            <td><?php echo e($product->description); ?></td>
            <td><?php echo e($product->keywords); ?></td>
            <td><?php echo e($product->category); ?></td>
            <td><img style="height: 40px; width: 40px;" src='<?php echo e(asset("storage/" . $product->image)); ?>' alt='<?php echo e($product->title); ?>'></td>
            <td><?php echo e($product->cost_price); ?></td>
            <td><?php echo e($product->selling_price); ?></td>
            <td>
                <a href='<?php echo e(route("products.edit",$product->id)); ?>'><i style="color: blue; font-size: 25px;" class="fa-regular fa-pen-to-square"></i></a>
                <a href='<?php echo e(route("products.destroy",$product->id)); ?>'><i style="color: red; font-size: 25px;" class="fa-regular fa-trash-can"></i></a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="color: blue;"></td>
            <td style="color: blue;"></i></td>
            <td>
                <a href="<?php echo e(route('products.create')); ?>"><i style="font-size: 30px;" class="fa-solid fa-download" title="Insert New Product"></i></a>
            </td>
        </tr>
    </tbody>
</table>
<div id="paginate">
    <?php echo e($products->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suman/mero_dress/resources/views/admin/products.blade.php ENDPATH**/ ?>