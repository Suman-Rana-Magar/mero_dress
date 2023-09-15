<link href="{{asset('css/style.css')}}" rel="stylesheet">
@extends('/layouts/master')

@section('title','Cart')

<style>
    .final
    {
        font-size: 20px;
        font-weight: bold;
    }
</style>

@section('body')

@if(Auth::user())

@if($carts->isNotEmpty())

<table style="width: 95%; text-align: center; margin: 0 2.5%;" class="table table-striped-columns">
    <thead>
        <th>ID</th>
        <th>Product</th>
        <th>Image</th>
        <th>Quantity</th>
        <th>Per Price(Rs.)</th>
        <th>Total Price(Rs.)</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @php
            $total_quantity = 0;
            $total_cost = 0;
        @endphp
        @foreach($carts as $cart)
        <tr>
            <td>{{ $cart->product_id }}</td>
            <td>{{ $cart->product }}</td>
            <td><img style="height: 50px; width: 50px;" src='{{asset("storage/" . $cart->image)}}' alt=''></td>
            <td>{{ $cart->product_quantity }}</td>
            <td>{{ $cart->per_price }}</td>
            <td>{{ $cart->total_price }}</td>
            <td>
                <!-- <a href='{{route("products.edit",$cart->id)}}'><i style="color: blue; font-size: 25px;" class="fa-regular fa-pen-to-square"></i></a> -->
                <a href="{{route('carts.destroy',$cart->product_id)}}"><i style="color: red; font-size: 25px;" class="fa-regular fa-trash-can"></i></a>
            </td>
            @php
            $total_quantity += $cart->product_quantity;
            $total_cost += $cart->total_price;
            @endphp
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td class="final" style="color: green;">Total</td>
            <td class="final" style="color: green;">{{ $total_quantity }}</td>
            <td></td>
            <td class="final" style="color: green;">{{ $total_cost }}</td>
            <td><a href="{{route('orders.create')}}"><button type="button" class="btn btn-success">Order</button></a></td>
        </tr>
    </tbody>
</table>

@if (session('success'))
<div class="alert alert-success" style="width: 400px; margin: auto;">
    {{ session('success') }}
</div>
@endif

@else

<h2 style="text-align: center;">Your Cart Is Empty !</h2>

@endif

@else

<h2 style="text-align: center;">Please Login To Check Your Cart !</h2>

@endif

@endsection