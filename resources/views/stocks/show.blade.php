@extends('/layouts/admin_master')

@section('title','Admin | Stocks')

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
<a href="{{ route('stocks.index')}}">Stocks</a>/Product Detail(Id:{{ $id }})
@endsection

@section('body')
<table class="table table-striped-columns">
    <thead>
        <th>Product Name</th>
        <th>Customer ID</th>
        <th>Product Quantity</th>
        <th>Per Price(Rs.)</th>
        <th>Total Price(Rs.)</th>
        <th>Status</th>
        <th>Date</th>
    </thead>
    <tbody>
        @foreach($stocks as $stock)
        <tr>
            @if($stock->status == 'Bought')
            <td>{{ $stock->title }}</td>
            @else
            <td></td>
            @endif
            @if($stock->customer_id)
            <td>{{ $stock->customer_id }}</td>
            @else
            <td>—</td>
            @endif
            <td>{{ $stock->product_quantity }}</td>
            <td>{{ $stock->per_price }}</td>
            <td>{{ $stock->total_price }}</td>
            <td>{{ $stock->status }}</td>
            <td>{{ $stock->created_date }}</td>
        </tr>
        @endforeach
        <tr>
        <th>Total</th>
        <th></th>
        <th>Available: {{ $availableQuantity }}</th>
        <th></th>
        <th>Balance: {{ $balance }}</th>
        <th>Overall</th>
        <th>—</th>
        </tr>
    </tbody>
</table>

@endsection 