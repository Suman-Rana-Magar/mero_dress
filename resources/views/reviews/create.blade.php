<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Review</title>
    <style>
        body
        {
            background-color: #63cee0;
        }
        #main {
            margin-left: auto;
            margin-right: auto;
            border-style: groove;
            border-radius: 20px;
            width: 40%;
            margin-top: 20px;
            background-color: #f0f0f0;
        }
        #input-field
        {
            width: 95%;
            margin: auto;
        }
        .submit
        {
            align-items: center;
            justify-content: center;
            display: flex;
            margin-bottom: 10px;
        }
        .form-label
        {
            font-size: 20px;
        }
        #cancel
        {
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div id="main">
            <h2 id="input-field">Write Your Valuable Review On This Product !</h1>
            <form method="post" action="{{route('reviews.store',$product_id)}}">
                @csrf

                <div style="margin-top: 10px;" class="mb-3" id="input-field">
                    <label for="rating" class="form-label">Rate between 1 and 10</label>
                    <select class="form-control @error('rating') is-invalid @enderror" id="rating" aria-describedby="emailHelp" name="rating" value="{{old('rating')}}" placeholder="Rate out of 10">
                        @for($i=1; $i<=10; $i++)
                        <option>{{$i}}</option>
                        @endfor
                    </select>
                    @error('rating')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3" id="input-field">
                    <label for="comment" class="form-label">Comment</label>
                    <!-- <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{old('quantity')}}"> -->
                    <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" id="comment" cols="30" rows="10" placeholder="Write Your Comment Here"></textarea>
                    @error('comment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="submit">
                    <button type="submit" class="btn btn-primary">Post Review</button>
                </div>
            </form>
            <div id="cancel">
                <a href="{{route('reviews.cancel')}}"><button class="btn btn-secondary">Cancel</button></a>
            </div>
        </div>
    </div>
</body>

</html>