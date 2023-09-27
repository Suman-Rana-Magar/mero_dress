<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Customer Login</title>
    <style>
        .pagetitle {
            text-align: center;
        }

        .supermain {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #c04848, #480048);

        }

        .main {
            margin: auto;
            border-style: groove;
            border-color: dimgrey;
            border-radius: 20px;
            width: 50%;
            background-color: ghostwhite;

        }

        .submit {
            text-align: center;
        }

        #input-field {
            margin: auto;
            width: 90%;
        }
    </style>

</head>

<body>
    @if (session('success'))
    <div class="alert alert-success" style="width: 50%; text-align: center; margin: auto; margin-top: 150px; margin-bottom: -210px;">
        {{ session('success') }}
    </div>
    @elseif(session('error'))
    <div class="alert alert-danger" style="width: 50%; text-align: center; margin: auto; margin-top: 150px; margin-bottom: -210px;">
        {{ session('error') }}
    </div>
    @endif
    <div class="supermain">
        <div id="main" class="main">
            <div class="pagetitle">
                <h1>User Login</h1>
            </div>
            <form method="post" action="{{route('users.check')}}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3" id="input-field">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3" id="input-field">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" aria-describedby="emailHelp" name="password" value="{{old('password')}}">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="submit">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <h6 style="margin-top: 10px;">Don't Have An Account? <a href="{{route('users.create')}}">Register</a></h6>
                </div>


            </form>
        </div>
    </div>
</body>

</html>