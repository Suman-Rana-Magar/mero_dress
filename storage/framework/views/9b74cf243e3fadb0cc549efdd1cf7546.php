<?php $__env->startSection('title','Admin | Profile'); ?>

<?php $__env->startSection('head','Profile'); ?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }

    .main {
        margin-top: 20px;
        text-align: center;
    }

    .profile-container {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }

    .profile-picture {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 20px;
    }

    .user-details {
        font-size: 18px;
    }

    .user-name {
        font-weight: bold;
        margin-top: 0;
    }

    .user-email {
        color: #007bff;
    }
</style>
<?php $__env->startSection('body'); ?>

<div class="main">
    <?php if(session('success')): ?>
    <div class="alert alert-success" style="width: 400px; margin: auto; margin-bottom: 10px;">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>
    <div class="profile-container">
        <img class="profile-picture" src='<?php echo e(asset("storage/" . Auth::user()->profile)); ?>' alt="User Profile Picture">
        <div class="user-details">
            <h1 class="user-name"><?php echo e(Auth::user()->name); ?></h1>
            <p class="user-email"><?php echo e(Auth::user()->email); ?></p>
            <a href="<?php echo e(route('admin.edit',Auth::user()->id)); ?>"><button class="btn btn-info" title="Edit Profile"><i class="fa-solid fa-pen-to-square"></i></button></a>
            <a href="<?php echo e(route('users.logout')); ?>"><button class="btn btn-danger" title="Logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></button></a>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suman/mero_dress/resources/views/admin/profile.blade.php ENDPATH**/ ?>