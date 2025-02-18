<?php $__env->startSection('title','Admin | Users'); ?>

<?php $__env->startSection('head','Users'); ?>
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
        <th>Name</th>
        <th>Email</th>
        <th>Profile</th>
        <th>Role</th>
        <th>Switch To</th>
    </thead>
    <tbody>
        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($customer->id); ?></td>
            <td><?php echo e($customer->name); ?></td>
            <td><?php echo e($customer->email); ?></td>
            <td><img style="height: 40px; width: 40px;" src='<?php echo e(asset("storage/" . $customer->profile)); ?>' alt='<?php echo e($customer->name); ?>'></td>
            <td><?php echo e($customer->role); ?></td>
            <td>
                <?php if($customer->role == 'customer'): ?>
                <a href="<?php echo e(route('admin.switchToAdmin',$customer->id)); ?>"><button type="button" class="btn btn-success">Admin</button></a>
                <?php else: ?>
                <a href="<?php echo e(route('admin.switchToCustomer',$customer->id)); ?>"><button type="button" class="btn btn-success">Customer</button></a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div id="paginate">
    <?php echo e($customers->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts/admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suman/mero_dress/resources/views/admin/customers.blade.php ENDPATH**/ ?>