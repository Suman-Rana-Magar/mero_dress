@extends('/layouts.admin_master')

@section('title','Admin | Profile')

@section('head','Profile')

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }

    .main {
        margin-top: 20px;
        text-align: center;
    }

    .profile-container {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }

    .profile-picture {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 20px;
    }

    .user-details {
        font-size: 18px;
    }

    .user-name {
        font-weight: bold;
        margin-top: 0;
    }

    .user-email {
        color: #007bff;
    }
</style>
@section('body')

<div class="main">
    @if (session('success'))
    <div class="alert alert-success" style="width: 400px; margin: auto; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
    @endif
    <div class="profile-container">
        <img class="profile-picture" src='{{asset("storage/" . Auth::user()->profile)}}' alt="User Profile Picture">
        <div class="user-details">
            <h1 class="user-name">{{Auth::user()->name}}</h1>
            <p class="user-email">{{Auth::user()->email}}</p>
            <a href="{{route('admin.edit',Auth::user()->id)}}"><button class="btn btn-info" title="Edit Profile"><i class="fa-solid fa-pen-to-square"></i></button></a>
            <a href="{{route('users.logout')}}"><button class="btn btn-danger" title="Logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></button></a>
        </div>
    </div>
</div>

@endsection