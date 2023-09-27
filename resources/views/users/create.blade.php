<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Customer Register</title>
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
    <div class="alert alert-success" style="width: 50%; text-align: center; margin: auto; margin-top: 50px; margin-bottom: -50px;">
        {{ session('success') }}
    </div>
    @elseif(session('error'))
    <div class="alert alert-danger" style="width: 50%; text-align: center; margin: auto; margin-top: 50px; margin-bottom: -50px;">
        {{ session('error') }}
    </div>
    @endif
    <div class="supermain">
        <div id="main" class="main">
            <div class="pagetitle">
                <h1>User Registration</h1>
            </div>
            <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3" id="input-field">
                    <label for="uname" class="form-label">Username</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="uname" aria-describedby="emailHelp" name="name" value="{{old('name')}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

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
                    <label for="image" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    @error('image')
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

                <div class="mb-3" id="input-field">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" name="password_confirmation" value="{{old('password_confirmation')}}">
                </div>

                <div class="submit">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <h6 style="margin-top: 10px;">Already Have An Account? <a href="{{route('users.index')}}">Login</a></h6>
                </div>

            </form>
        </div>
    </div>
</body>

</html>