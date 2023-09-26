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
        <th>Status</th>
        <th>Deliver</th>
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
            @if($order->status == 'pending')
            <td><button type="button" class="btn btn-primary" style="padding: 2px 7px;">{{ $order->status }}</button></td>
            @else
            <td><button type="button" class="btn btn-success" style="padding: 2px 7px;">{{ $order->status }}</button></td>
            @endif
            @if($order->status == 'pending')
            <td><a href="{{ route('orders.deliver',$order->id) }}"><i style="font-size: 20px;" class="fa-solid fa-circle-check"></i></a></td>
            @else
            <td>—</td>
            @endif
            <td>{{ $order->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div id="paginate">
{{ $orders->links() }}
</div>
@endsection