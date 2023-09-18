@extends('/layouts/admin_master')

@section('title','Admin | Orders')

@section('head','Orders')
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
        <th>Customer ID</th>
        <th>Product ID</th>
        <th>Product Quantity</th>
        <th>Per Price</th>
        <th>Total Price</th>
        <th>Shipping Address</th>
        <th>Ordered Date</th>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->customer_id }}</td>
            <td>{{ $order->product_id }}</td>
            <td>{{ $order->product_quantity }}</td>
            <td>{{ $order->per_price }}</td>
            <td>{{ $order->total_price }}</td>
            <td>{{ $order->shipping_address }}</td>
            <td>{{ $order->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div id="paginate">
{{ $orders->links() }}
</div>
@endsection