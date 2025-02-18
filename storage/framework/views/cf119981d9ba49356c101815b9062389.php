<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">


<?php $__env->startSection('title', 'Detail'); ?>

<?php $__env->startSection('navbar'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('navbar'); ?>

<?php $__env->stopSection(); ?>

<style>
    .contents {
        margin-left: 20px;
    }

    .reviewTitle {
        background-color: #e0e1e6;
        padding: 10px 20px;
    }

    .reviews {
        background-color: #e3dfdf;
        margin-left: -20px;
        padding: 5px 20px;
    }

    .image {
        -webkit-user-drag: none;
    }
</style>

<?php $__env->startSection('body'); ?>
    <div class='container mt-5'>
        <?php if(session('success')): ?>
            <div class="alert alert-success" style="width: 400px; margin: auto;">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <div class='card'>
            <a href='<?php echo e(route('products.index')); ?>' style='margin-left: 20px; color: black; '><i
                    class="fa-solid fa-left-long"></i></a>
            <div class='row'>
                <div class='col-md-6'>
                    <div class='main_image p-3 text-center'>
                        <h2>PRODUCT DETAIL</h2>
                        <div class='text-center p-4'> <img style="height: 250px; width: auto;" id='main-image'
                                src='<?php echo e(asset('storage/' . $product->image)); ?>'> </div>
                    </div>
                </div>
                <div class='main col-md-6'>
                    <div class=' mb-4 mt-4'>
                        <h5 class='text-uppercase'><?php echo e($product->title); ?></h5>
                        <div class='price d-flex flex-row align-items-center'> <span
                                style='margin-top: 5px; color: #ff0000; font-size: 25px;'
                                class='act-price'><b>Rs.<?php echo e($product->selling_price); ?></b></span>
                        </div>
                        <!-- <p><s style='color: #4d2600;'>Rs.<?php echo e($product->marked_price); ?></s> -<?php echo e($product->discount); ?>%</p> -->
                    </div>
                    <p><?php echo e($product->description); ?></p>
                    <p id='availableQuantity'>Available Quantity: <?php echo e($product->quantity); ?></p>
                    <form action="<?php echo e(route('carts.store', $product->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <label for='quantity'>
                            <h5 style='margin-top: 0; margin-bottom: 7px;'>Quantity : </h5>
                        </label>
                        <select id='quantity' name='quantity'>
                            <?php
                                $quantity = $product->quantity;
                            ?>
                            <?php for($i = 1; $i <= $quantity; $i++): ?>
                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                            <?php endfor; ?>
                        </select>
                        <?php if(Auth::user()): ?>
                            <div class='cart mb-4'>
                                <input type='submit' id='addCart'
                                    class="btn btn-danger <?php $__errorArgs = ['login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value='ADD TO CART'>
                            </div>
                        <?php else: ?>
                            <div class='cart mb-4'>
                                <input type='submit' id='addCart' class='btn btn-danger' value='ADD TO CART' disabled>
                                <span style="color: red; display: flex; margin-top: 5px;">*Please Login For Adding Items To
                                    Cart !</span>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>

        </div>
        <?php if($reviews->isNotEmpty()): ?>
            <div class="card mt-2" style="margin-bottom: 10px;">
                <div class="reviewTitle">
                    <h4>Reviews and Ratings</h4>
                </div>
                <div class="contents">
                    <div class="totalRating">
                        <h4 style="margin-top: 5px;"><?php echo e($totalReviews); ?>/<span style="color: #666666;">10</span></h4>
                        <div class>
                            <?php if($totalReviews <= 2): ?>
                                <img class="image" src="<?php echo e(asset('images/angry.png')); ?>" alt="angry" height="150"
                                    width="auto">
                            <?php elseif($totalReviews > 2 && $totalReviews <= 4): ?>
                                <img class="image" src="<?php echo e(asset('images/slightly_angry.png')); ?>" alt="slightly_angry"
                                    height="150" width="auto">
                            <?php elseif($totalReviews > 4 && $totalReviews <= 6): ?>
                                <img class="image" src="<?php echo e(asset('images/none.png')); ?>" alt="none" height="150"
                                    width="auto">
                            <?php elseif($totalReviews > 6 && $totalReviews <= 8): ?>
                                <img class="image" src="<?php echo e(asset('images/slightly_happy.png')); ?>" alt="slightly_happy"
                                    height="150" width="auto">
                            <?php else: ?>
                                <img class="image" src="<?php echo e(asset('images/happy.png')); ?>" alt="Happy" height="150"
                                    width="auto">
                            <?php endif; ?>
                            <!-- images here for user satisfaction -->
                        </div>
                        <p style="color: #404040; margin-bottom: 10px;"><?php echo e($reviewsCount); ?> Ratings</p>
                        <h5 class="reviews">Reviews</h5>
                        <!-- foreach from here -->
                        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $user = $review->user;
                                $userName = $user->name;
                            ?>
                            <div class="allReviews">
                                <h6 style="font-size: 18px; margin-bottom: 0;"><?php echo e($review->rating); ?>/10</h6>
                                <p style="font-size: 12.5px; color: #404040; margin-bottom: 5px;">by <?php echo e($userName); ?>

                                </p>
                                <p style="border-bottom-style: groove; margin-right: 20px; padding-bottom: 5px;">
                                    <?php echo e($review->comments); ?></p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- TO here -->
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/suman/mero_dress/resources/views/products/show.blade.php ENDPATH**/ ?>