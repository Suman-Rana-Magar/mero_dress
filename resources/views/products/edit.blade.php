@extends('/layouts/admin_master')

@section('title','Category | Edit')

@section('head')
<style>
    a {
        text-decoration: none;
        color: black;
    }

    a:hover {
        text-decoration: none;
        color: black;
    }
</style>
<a href="{{ route('admin.products')}}">Products</a>/Edit
@endsection

<style>
    .submit {
        text-align: center;
    }

    #input-field {
        margin: auto;
        width: 95%;
    }
</style>

</head>

@section('body')
<div style="margin-top: 10px; border-style: groove; border-radius: 20px;">
<div id="main" class="main">
    <form method="post" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
        @csrf

        <div style="margin-top: 10px;" class="mb-3" id="input-field">
            <label for="title" class="form-label">Name</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="emailHelp" name="title" value="{{ $product->title }}">
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3" id="input-field">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ $product->quantity }}">
            @error('quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3" id="input-field">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" aria-describedby="emailHelp" name="description" value="{{ $product->description }}">
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3" id="input-field">
            <label for="keywords" class="form-label">Keywords</label>
            <input type="text" class="form-control @error('keywords') is-invalid @enderror" id="keywords" name="keywords" value="{{ $product->keywords }}">
            @error('keywords')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3" id="input-field">
            <label for="category">Category<span style="color: red">*</span></label>
            <select id="category" name="category" class="form-control" name="category">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3" id="input-field">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ $product->image }}">
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3" id="input-field">
            <label for="cost" class="form-label">Cost Price</label>
            <input type="number" class="form-control @error('cost') is-invalid @enderror" id="cost" aria-describedby="emailHelp" name="cost_price" value="{{ $product->cost_price }}">
            @error('cost')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3" id="input-field">
            <label for="selling" class="form-label">Selling Price</label>
            <input type="number" class="form-control @error('selling') is-invalid @enderror" id="selling" name="selling_price" value="{{ $product->selling_price }}">
            @error('selling')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="submit" style="margin-bottom: 10px;">
            <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
    </form>
</div>
</div>
@endsection