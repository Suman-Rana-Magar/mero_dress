@extends('/layouts.admin_master')

@section('title','Admin | Review')

@section('head','Reviews')

@section('body')

<table class="table table-striped-columns">
    <thead>
        <th>ID</th>
        <th>Customer ID</th>
        <th>Product ID</th>
        <th>Rating(Out Of 10)</th>
        <th>Comments</th>
        <th>Date</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach($reviews as $review)
        <tr>
            <td>{{ $review->id }}</td>
            <td>{{ $review->customer_id }}</td>
            <td>{{ $review->product_id }}</td>
            <td>{{ $review->rating }}</td>
            <td>{{ $review->comments }}</td>
            <td>{{ $review->created_at }}</td>
            <td>
                <a href="{{route('reviews.update',$review->id)}}"><i style="color: blue; font-size: 25px;" class="fa-solid fa-circle-check" title="Allow Review"></i></a>
                <a href="{{route('reviews.destroy',$review->id)}}"><i style="color: red; font-size: 25px;" class="fa-solid fa-circle-xmark" title="Deny Review"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection