@extends('/layouts/master')

@section('title','Product | Search')

@section('body')

@if($searchedProducts->isNotEmpty())

@foreach($searchedProducts as $product)

<div style="margin-left: 40px; display: inline-block;">
        <div style="margin-top: 20px;">
            <div class='card text-center' style='width:250px; height: 400px;'>
                <div style=' margin-top: 6px; margin-bottom: 0; height: 13rem; width: auto;'>
                    <img style='max-width: 230px; width: auto; height: 200px;' class='card-img-top imf' src='{{asset("storage/" . $product->image)}}' alt='{{$product->title}}'>
                </div>
                <div class='card-body' style='height: 200px; width: auto; '>
                    <h5 style='margin-top: 0; margin-bottom: 3px;'>{{$product->title}}</h5>
                    <div style='margin-top: 0; height:50px; width: auto; '>
                        <p style='margin-top: 3px; margin-bottom: 3px;'>{{Illuminate\Support\Str::limit($product->description, 50)}}</p>
                    </div>
                    <h6 style='margin-top: 10px; color: #ff0000; font-size: 20px;'>Rs.{{$product->selling_price}}</h6>
                    <!-- <p><s style='color: #4d2600;'>Rs.{{$product->marked_price}}</s> -{{$product->discount}}%</p> -->
                    <a href='{{route("products.show",$product->id)}}'><button class='btn bg-success' style="color: white;">Detail</button></a>
                </div>
            </div>
        </div>
</div>

@endforeach
@else
<div>
    <h2 style="text-align: center;">No Such Product Found !</h2>
</div>
@endif

@endsection