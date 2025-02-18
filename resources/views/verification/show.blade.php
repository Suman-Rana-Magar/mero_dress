<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification | Notice</title>
</head>
@php
$id = $user_id;
@endphp
<body>
    <form action="{{ route('verification.resend',$id) }}" method="get">
        <h3 style="text-align: center;">Your email is regestered successfully ! Please check your email to verify !</h3>
        <!-- <h3>If you do not get the verification email , You can resend it by pressing following button !</h3> -->
        <!-- <button type="submit">Resend</button> -->
    </form>
</body>

</html>