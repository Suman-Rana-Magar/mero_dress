@extends('/layouts/admin_master')

@section('title','Admin | Categories')

@section('head','Categories')
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
        <th>Name</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <a href='{{route("categories.edit",$category->id)}}'><i style="color: blue; font-size: 25px;" class="fa-regular fa-pen-to-square"></i></a>
                <a href='{{route("categories.destroy",$category->id)}}'><i style="color: red; font-size: 25px;" class="fa-regular fa-trash-can"></i></a>
            </td>
        </tr>
        @endforeach
        <tr>
            <td style="color: blue;">To Insert Category</td>
            <td style="color: blue;">Click <i style="font-size: 25px; color: limegreen;" class="fa-regular fa-hand-point-up fa-rotate-90"></i></td>
            <td>
                <a href="{{route('categories.create')}}"><i style="font-size: 30px;" class="fa-solid fa-download"></i></a>
            </td>
        </tr>
    </tbody>
</table>
<div id="paginate">
{{ $categories->links() }}
</div>
@endsection