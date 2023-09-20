@extends('/layouts/admin_master')

@section('title','Product | Create')

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
<a href="{{ route('admin.products')}}">Products</a>/Create
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
@section('body')
<div id="main" class="main">
    @if (session('success'))
    <div class="alert alert-success" style="width: 400px; margin: auto;">
        {{ session('success') }}
    </div>
    @endif
    <div style="margin-top: 10px; border-style: groove; border-radius: 20px;">
        <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
            @csrf

            <div style="margin-top: 10px;" class="mb-3" id="input-field">
                <label for="title" class="form-label">Name</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="emailHelp" name="title" value="{{old('title')}}">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3" id="input-field">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{old('quantity')}}">
                @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3" id="input-field">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" aria-describedby="emailHelp" name="description" value="{{old('description')}}">
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3" id="input-field">
                <label for="keywords" class="form-label">Keywords</label>
                <input type="text" class="form-control @error('keywords') is-invalid @enderror" id="keywords" name="keywords" value="{{old('keywords')}}">
                @error('keywords')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3" id="input-field">
                <label for="category">Category</label>
                <select id="category" name="category" class="form-control" name="category">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3" id="input-field">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image')}}">
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3" id="input-field">
                <label for="cost" class="form-label">Cost Price</label>
                <input type="number" class="form-control @error('cost_price') is-invalid @enderror" id="cost" aria-describedby="emailHelp" name="cost_price" value="{{old('cost_price')}}">
                @error('cost_price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3" id="input-field">
                <label for="selling" class="form-label">Selling Price</label>
                <input type="number" class="form-control @error('selling_price') is-invalid @enderror" id="selling" name="selling_price" value="{{old('selling_price')}}">
                @error('selling_price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="submit">
                <button type="submit" class="btn btn-primary">Create Product</button>
            </div>

        </form>
    </div>
</div>
@endsection