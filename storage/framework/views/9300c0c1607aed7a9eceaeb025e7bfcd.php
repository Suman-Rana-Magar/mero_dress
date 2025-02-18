<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo e(asset('images/llooggoo.png')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Order | Placing</title>
    <style>
        .total {
            font-size: 20px;
        }

        .total b {
            color: lawngreen;
        }

        body {
            background-color: #63cee0;
        }
    </style>
</head>

<body>
    <h1 style=" margin-bottom: 0; text-align: center; color: white; font-family: Courier, monospace;"><b>Order Placing</b></h1>
    <table style="margin: auto; text-align: center; width: 95%; margin-bottom: 20px;" class="table table-striped">
        <thead>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price per Piece(Rs.)</th>
            <th>Total Price(Rs.)</th>
        </thead>
        <tbody>
            <?php
            $total_quantity = 0;
            $total_cost = 0;
            ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><img style="height: 50px; width: auto; max-width: 50px;" src='<?php echo e(asset("storage/" . $product->image)); ?>' alt=''></td>
                <td><?php echo e($product->product_quantity); ?></td>
                <td><?php echo e($product->per_price); ?></td>
                <td><?php echo e($product->total_price); ?></td>
                <?php
                $total_quantity += $product->product_quantity;
                $total_cost += $product->total_price;
                ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr class="total">
                <td><b>Total</b></td>
                <td><b><?php echo e($total_quantity); ?></b></td>
                <td></td>
                <td><b><?php echo e($total_cost); ?></b></td>
            </tr>
        </tbody>

    </table>
    <center>
        <form method="post" action="<?php echo e(route('orders.store')); ?>" style="width: 60%; background-color: white; border-radius: 20px;">
            <?php echo csrf_field(); ?>

            <h2 class="text-center mt-4" style="padding-top: 20px; font-family: Courier, monospace; color: black;">Please Enter your Address</h2><br>
            <div class="input-group" style="width: 90%; height:auto;">
                <label for="address" class="input-group-text"><i class="fa-solid fa-location-dot"></i></label>
                <input id="address" type="text" name="address" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="E.g.: Swyoyambhu-15,Bijeshwori,Kathmandu" value="<?php echo e(old('address')); ?>">
                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span style="text-align: left; margin-left: 35px;" class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div><br>
            <button type="submit" name="submit" class="btn btn-success">Place Order</button>
            <a href="<?php echo e(route('orders.cancel')); ?>"><button type="button" class="btn btn-danger" style="margin: 10px 50px;">Cancel</button></a>
            <button type="button" onclick="window.print()" class="btn btn-success">Save</button>
        </form>
    </center>
</body>

</html><?php /**PATH /home/suman/mero_dress/resources/views/orders/create.blade.php ENDPATH**/ ?>