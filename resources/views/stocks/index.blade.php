@extends('/layouts/admin_master')

@section('title','Admin | Stocks')

@section('head','Stocks')
<style>
     #paginate
    {
        margin-top: 20px;
        justify-content: center;
        display: flex;
        align-items: center;
    }
</style>
@section('body')

<table class="table table-striped-columns">
    <thead>
        <th>ID</th>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Quantity(Total)</th>
        <!-- <th>Product Quantity(Remaining)</th> -->
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach($stocks as $stock)
        <tr>
            <td>{{ $stock->stockId }}</td>
            <td>{{ $stock->productId }}</td>
            <td>{{ $stock->title }}</td>
            <td>{{ $stock->product_quantity }}</td>
            <!-- <td>बाँकी</td> -->
            <td>
                <a style="margin-left: 20px;" href="{{route('stocks.show',$stock->productId)}}" title="See More"><i style="font-size: 25px;" class="fa-solid fa-circle-chevron-right"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div id="paginate">
{{ $stocks->links() }}
</div>
@endsection