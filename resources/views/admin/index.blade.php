@extends('/layouts.admin_master')

@section('title','Admin | Index')

@section('head','Dashboard')

@section('body')
<!-- <marquee behavior="alternate" direction="right" scrollamount="5555" scrolldelay="0"> -->
<!-- <marquee behavior="alternate" direction="right" scrollamount="25">
    <h1>Hello Dear You Are In The Admin Panel !</h1>
</marquee> -->
<main id="main" class="main" style="margin-top: 10px;">
    <div style="display: flex;">
        <div class="col-md-3">
            <div class="card info-card sales-card">
                <div class="card-body" style="margin-top: 0;">
                    <h3 class="page-title"><b>Users</b></h3>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="font-size: 40px; background-color:#2644;">
                            <a href="{{route('admin.customers')}}" style="color: black;"><i class="fa-solid fa-users" style="padding: 13px 10px;"></i></a>
                        </div>
                        <div class="ps-3">
                            <h3 class="pagetitle"><b>{{$count_user}}</b></h3>
                            <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div style="margin-left: 20px;" class="col-md-3">
            <div class="card info-card sales-card">
                <div class="card-body" style="margin-top: 0;">
                    <h3 class="page-title"><b>Products</b></h3>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="font-size: 40px; background-color:#ffc299;">
                            <a href="{{route('admin.products')}}" style="color: #ff6600;"><i class="fas fa-box" style="padding: 10px 10px;"></i></a>
                        </div>
                        <div class="ps-3">
                            <h3 class="pagetitle"><b>{{$count_product}}</b></h3>
                            <span class="text-success small pt-1 fw-bold">22%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div style="margin-left: 20px;" class="col-md-3">
            <div class="card info-card sales-card">
                <div class="card-body" style="margin-top: 0;">
                    <h3 class="page-title"><b>Orders</b></h3>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="font-size: 40px; background-color:#99ff99;">
                        <a href="{{route('orders.index')}}"><i class="fa-solid fa-truck" style="padding: 13px 10px; color: #00cc00;"></i></a>
                        </div>
                        <div class="ps-3">
                            <h3 class="pagetitle"><b>{{ $count_order }}</b></h3>
                            <span class="text-success small pt-1 fw-bold">2%</span> <span
                                class="text-muted small pt-2 ps-1">increase</span>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection