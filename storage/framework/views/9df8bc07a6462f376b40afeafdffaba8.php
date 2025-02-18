<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        .container
        {
            align-items: center;
            justify-content: center;
            display: flex;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h2>Email Verification</h2>
            <p>तपाईको इमेल ठेगाना प्रमाणित गर्न तल दिइएको बटनमा क्लिक गर्नुहोस्!:</p>
            <?php
            $id = $user_id;
            $token = $email_verification_token;
            ?>
            <a href="<?php echo e(route('verification.verify', [$id, $token])); ?>"><button>प्रमाणिकरण इमेल ठेगाना</button></a>
        </div>
    </div>
</body>
</html><?php /**PATH /home/suman/mero_dress/resources/views/verification/email.blade.php ENDPATH**/ ?>