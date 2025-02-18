<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="<?php echo e(asset('images/llooggoo.png')); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | Info</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #63cee0;
        }

        .main {

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

        #final {
            color: limegreen;
        }
    </style>
</head>

<body>
    <a href="<?php echo e(route('products.index')); ?>"><button type="button" style="margin: 10px;" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-left-long"></i></button></a>
    <div class="main">
        <div class="profile-container">
            <img class="profile-picture" src='<?php echo e(asset("storage/" . Auth::user()->profile)); ?>' alt="User Profile Picture">
            <div class="user-details">
                <h1 class="user-name"><?php echo e(Auth::user()->name); ?></h1>
                <p class="user-email"><?php echo e(Auth::user()->email); ?></p>
                <a href="<?php echo e(route('orders.show',Auth::user()->id)); ?>"><button class="btn btn-info" title="My Orders"><i class="fa-solid fa-truck"></i></button></a>
                <a href="<?php echo e(route('carts.index')); ?>"><button class="btn btn-info" title="My Cart"><i class="fa-solid fa-cart-shopping"></i></button></a>
                <a href="<?php echo e(route('users.edit',Auth::user()->id)); ?>"><button class="btn btn-info" title="Edit Profile"><i class="fa-solid fa-pen-to-square"></i></button></a>
                <a href="<?php echo e(route('users.logout')); ?>"><button class="btn btn-danger" title="Logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></button></a>
            </div>
        </div>
        <?php if($myorders->isNotEmpty()): ?>
        <h2 style="text-align: left; margin-left: 2.5%;"><b>My Orders</b></h2>
        <?php if(session('success')): ?>
        <div class="alert alert-success" style="width: 50%; text-align: center; margin: auto; margin-bottom: 10px;">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
        <table class="table" style="width: 95%; margin: auto; margin-bottom: 20px;">
            <thead>
                <?php
                $total_quantity = 0;
                $total_price = 0;
                ?>
                <th>Product</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Per Price(Rs.)</th>
                <th>Total Price(Rs.)</th>
                <th>Shipping Address</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $__currentLoopData = $myorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->title); ?></td>
                    <td><img style="height: 50px; width:auto; max-width: 50px;" src='<?php echo e(asset("storage/" . $order->image)); ?>' alt=''></td>
                    <td><?php echo e($order->product_quantity); ?></td>
                    <td><?php echo e($order->per_price); ?></td>
                    <td><?php echo e($order->total_price); ?></td>
                    <td><?php echo e($order->shipping_address); ?></td>
                    <td><a href="<?php echo e(route('orders.detail',$order->productId)); ?>" style="font-size: 25px;" title="Check Detail"><i class="fa-solid fa-circle-info"></i></a></td>
                    <?php
                    $total_quantity += $order->product_quantity;
                    $total_price += $order->total_price;
                    ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th id="final">Total</th>
                    <td></td>
                    <th id="final"><?php echo e($total_quantity); ?></th>
                    <td></td>
                    <th id="final"><?php echo e($total_price); ?></th>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <?php else: ?>
        <h2><b>My Orders</b></h2>
        <div style=" margin-left: 2.5%;">
            <h1 style="font-size: 200px;">😞</h1>
            <h4>You Haven't Ordered Anything Yet !</h4>
        </div>
        <?php endif; ?>
    </div>
</body>

</html><?php /**PATH /home/suman/mero_dress/resources/views/orders/show.blade.php ENDPATH**/ ?>