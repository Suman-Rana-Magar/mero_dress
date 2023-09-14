@extends('/layouts.admin_master')

@section('title','Admin | Products')

@section('head','Products')

@section('body')
<table class="table table-striped-columns">
    <thead>
        <th>ID</th>
        <th>Title</th>
        <th>Quantity</th>
        <th>Description</th>
        <th>Keywords</th>
        <th>Category</th>
        <th>Image</th>
        <th>Cost Price</th>
        <th>Selling Price</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->keywords }}</td>
            <td>{{ $product->category }}</td>
            <td><img style="height: 40px; width: 40px;" src='{{asset("storage/" . $product->image)}}' alt='{{$product->title}}'></td>
            <td>{{ $product->cost_price }}</td>
            <td>{{ $product->selling_price }}</td>
            <td>
                <a href='{{route("products.edit",$product->id)}}'><i style="color: blue; font-size: 25px;" class="fa-regular fa-pen-to-square"></i></a>
                <a href='{{route("products.destroy",$product->id)}}'><i style="color: red; font-size: 25px;" class="fa-regular fa-trash-can"></i></a>
            </td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="color: blue;">To Insert Product</td>
            <td style="color: blue;">Click <i style="font-size: 25px; color: limegreen;" class="fa-regular fa-hand-point-up fa-rotate-90"></i></td>
            <td>
                <a href="{{route('products.create')}}"><i style="font-size: 30px;" class="fa-solid fa-download"></i></a>
            </td>
        </tr>
    </tbody>
</table>

@endsection