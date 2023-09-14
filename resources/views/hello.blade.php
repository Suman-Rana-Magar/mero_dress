<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
</head>
<body style="color: white; background-color: black;">
    <h1>this is a hello file.</h1>
    <h1>The sum of given numbers is: {{$sum}}</h1><a href="welcome.blade.php">Click here</a>
    <ul>
        @foreach($numbers as $n)
        <li>{{$n}}</li>
        @endforeach
    </ul>

     

</body>
</html>