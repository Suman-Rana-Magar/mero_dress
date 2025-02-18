<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="<?php echo e(asset('images/llooggoo.png')); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | Order | Detail</title>
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

        #final
        {
            color: limegreen;
        }
        .myReviews
        {
            margin: auto;
            width: 95%;
        }
        .review
        {
            background-color: #ebe6d8;
            border-radius: 10px;
        }
        .content
        {
            width: 98%;
            margin: auto;
            padding: 10px;
        }
        .rate
        {
            font-weight: bolder;
        }
        .title
        {
            color: #6e67ee;
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
        <h2 style="text-align: left; margin-left: 2.5%;"><b>Order Details</b></h2>
        <table class="table" style="width: 95%; margin: auto; margin-bottom: 20px;">
            <thead>
                <th>Product</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Per Price(Rs.)</th>
                <th>Total Price(Rs.)</th>
                <th>Shipping Address</th>
                <th>Status</th>
                <?php if($order->status == 'received'): ?>
                <th>Received On</th>
                <th>Review</th>
                <?php endif; ?>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo e($order->title); ?></td>
                    <td><img style="height: 50px; width:auto; max-width: 50px;" src='<?php echo e(asset("storage/" . $order->image)); ?>' alt=''></td>
                    <td><?php echo e($order->product_quantity); ?></td>
                    <td><?php echo e($order->per_price); ?></td>
                    <td><?php echo e($order->total_price); ?></td>
                    <td><?php echo e($order->shipping_address); ?></td>
                    <?php if($order->status == 'pending'): ?>
                    <td><button type="button" class="btn btn-primary" style="padding: 2px 7px;"><?php echo e($order->status); ?></button></td>
                    <?php else: ?>
                    <td><button type="button" class="btn btn-success" style="padding: 2px 7px;"><?php echo e($order->status); ?></button></td>
                    <?php endif; ?>
                    <?php if($order->status == 'received'): ?>
                    <td><?php echo e($order->updated_at); ?></td>
                    <?php if($reviewCount == 1): ?>
                    <td><i class="fa-solid fa-ban" style="cursor: pointer; color: blue; font-size: 25px;" title="Max Number Of Review Reached !"></i></td>
                    <?php else: ?>
                    <td><a href="<?php echo e(route('reviews.create',$order->productId)); ?>" style="font-size: 25px;" title="Write A Review"><i class="fa-solid fa-pen"></i></a></td>
                    <?php endif; ?>
                    <?php endif; ?>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="myReviews">
        <?php if($order->status == 'received'): ?>
        <h2>My Review</h2>
        <?php if($reviews->isNotEmpty()): ?>
        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="review">
            <div class="content">
            <span class="title">Rating: </span> 
            <?php if($review->rating <= 3): ?>
            <span class="rate" style="color: red;"> <?php echo e($review->rating); ?> </span>/10 <br>
            <?php elseif($review->rating > 3 && $review->rating <= 7): ?>
            <span class="rate" style="color: limegreen;"> <?php echo e($review->rating); ?> </span>/10 <br>
            <?php else: ?>
            <span class="rate" style="color: blue;"> <?php echo e($review->rating); ?> </span>/10 <br>
            <?php endif; ?>
            <span class="title">Comment: </span><?php echo e($review->comments); ?> <br>
            <span class="title">Date: </span><?php echo e($review->created_at); ?>

            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <h4>You Haven't Reviewed This Product Yet !</h4>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</body>

</html><?php /**PATH /home/suman/mero_dress/resources/views/orders/detail.blade.php ENDPATH**/ ?>