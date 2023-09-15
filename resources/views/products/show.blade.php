<link href="{{asset('css/style.css')}}" rel="stylesheet">
@extends('/layouts.master')

@section('title','Detail')

@section('navbar')
@parent

@endsection
@section('body')
<div class='container mt-5'>
    @if (session('success'))
    <div class="alert alert-success" style="width: 400px; margin: auto;">
        {{ session('success') }}
    </div>
    @endif
    <div class='card'>
        <a href='{{route("products.index")}}' style='margin-left: 20px; color: black; '><i class="fa-solid fa-left-long"></i></a>
        <div class='row'>
            <div class='col-md-6'>
                <div class='main_image p-3 text-center'>
                    <h2>PRODUCT DETAIL</h2>
                    <div class='text-center p-4'> <img style="height: 250px; width: auto;" id='main-image' src='{{asset("storage/" . $product->image)}}'> </div>
                </div>
            </div>
            <div class='main col-md-6'>
                <div class=' mb-4 mt-4'>
                    <h5 class='text-uppercase'>{{$product->title}}</h5>
                    <div class='price d-flex flex-row align-items-center'> <span style='margin-top: 5px; color: #ff0000; font-size: 25px;' class='act-price'><b>Rs.{{$product->selling_price}}</b></span>
                    </div>
                    <!-- <p><s style='color: #4d2600;'>Rs.{{$product->marked_price}}</s> -{{$product->discount}}%</p> -->
                </div>
                <p>{{$product->description}}</p>
                <p id='availableQuantity'>Available Quantity: {{$product->quantity}}</p>
                <form action="{{route('carts.store',$product->id)}}" method="post">
                    @csrf
                    <label for='quantity'>
                        <h5 style='margin-top: 0; margin-bottom: 7px;'>Quantity : </h5>
                    </label>
                    <select id='quantity' name='quantity'>
                        @php
                        $quantity = $product->quantity;
                        @endphp
                        @for($i=1; $i<=$quantity; $i++) <option value="{{$i}}">{{$i}}</option>
                            @endfor
                    </select>
                    @if(Auth::user())
                    <div class='cart mb-4'>
                        <input type='submit' id='addCart' class="btn btn-danger @error('login') is-invalid @enderror" value='ADD TO CART'>
                    </div>
                    @else
                    <div class='cart mb-4'>
                        <input type='submit' id='addCart' class='btn btn-danger' value='ADD TO CART' disabled>
                        <span style="color: red; display: flex; margin-top: 5px;">*Please Login For Adding Items To Cart !</span>
                    </div>
                    @endif
                </form>
            </div>
        </div>

    </div>
</div>
@endsection