@extends('/layouts/admin_master')

@section('title','Category | Create')

<style>
    #input-field {
        margin: auto;
        width: 95%;
    }
</style>

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
<a href="{{ route('admin.categories')}}">Categories</a>/Create
@endsection

@section('body')
<div style="margin-top: 10px; border-style: groove; border-radius: 20px;">
    <form action="{{route('categories.store')}}" method="post">
        @csrf

        <div style="margin-top: 10px;" class="mb-3" style="width: 90%; margin: auto;" id="input-field">
            <label for="category" class="form-label">Category Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="category" name="name" value="{{old('name')}}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div style="text-align: center; margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
</div>


@endsection