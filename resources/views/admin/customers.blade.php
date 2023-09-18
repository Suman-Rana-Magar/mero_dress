@extends('/layouts/admin_master')

@section('title','Admin | Users')

@section('head','Users')
<style>
    #paginate {
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
        <th>Name</th>
        <th>Email</th>
        <th>Profile</th>
        <th>Role</th>
        <th>Switch To</th>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td><img style="height: 40px; width: 40px;" src='{{asset("storage/" . $customer->profile)}}' alt='{{$customer->name}}'></td>
            <td>{{ $customer->role }}</td>
            <td>
                @if($customer->role == 'customer')
                <a href="{{route('admin.switchToAdmin',$customer->id)}}"><button type="button" class="btn btn-success">Admin</button></a>
                @else
                <a href="{{route('admin.switchToCustomer',$customer->id)}}"><button type="button" class="btn btn-success">Customer</button></a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div id="paginate">
    {{ $customers->links() }}
</div>
@endsection