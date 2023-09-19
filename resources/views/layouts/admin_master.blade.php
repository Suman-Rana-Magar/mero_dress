<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="{{ asset('images/llooggoo.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Sidebar Styles */
        #sidebar {
            position: fixed;
            width: 250px;
            height: 100%;
            background: #333;
            color: #fff;
            transition: width 0.3s;
        }

        #sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        #sidebar ul li {
            margin-bottom: 10px;
        }

        #sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            transition: background 0.3s;
        }

        #sidebar ul li a:hover {
            background: #555;
        }

        /* Page Content Styles */
        #content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Header Styles */
        #header {
            background: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        /* Toggle Sidebar Button Styles */
        #sidebarCollapse {
            background: #333;
            color: #fff;
            border: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            cursor: pointer;
        }

        .first {
            font-family: 'Kalam';
            margin-left: 20px;
            display: inline;
            font-size: 50px;
            color: #07e5f5;
        }

        .one {
            font-family: 'Kalam';
            color: white;
            display: inline;
            color: #07f51f;
        }

        .two {
            font-family: 'Kalam';
            color: white;
            display: inline;
            color: #e5f507;

        }

        .three {
            font-family: 'Kalam';
            color: white;
            display: inline;
            color: #ba07f5;

        }

        /* Add your custom styles here */
    </style>
</head>

<body>
    <!-- Sidebar -->
    <nav id="sidebar">
        <a style="text-decoration: none;" href="{{route('admin.index')}}">
            <div><h1 class="first">ल</h1><h2 class="one">गा</h2><h2 class="two">उ</h2><h2 class="three">ने</h2></div>
        </a>
        <ul class="list-unstyled components">
            <li>
                <a href="{{route('admin.index')}}"><i class="fas fa-home"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{route('admin.products')}}"><i class="fas fa-box"></i> Products</a>
            </li>
            <li>
                <a href="{{route('admin.categories')}}"><i class="fa-solid fa-folder"></i> Categories</a>
            </li>
            <li>
                <a href="{{route('admin.customers')}}"><i class="fas fa-users"></i> Users</a>
            </li>
            <li>
                <a href="{{route('orders.index')}}"><i class="fa-solid fa-truck"></i> Orders</a>
            </li>
            <li>
                <a href="{{route('stocks.index')}}"><i class="fa-solid fa-money-bill-trend-up"></i> Stocks</a>
            </li>
            <li>
                <a href="{{route('admin.review')}}"><i class="fa-solid fa-comments"></i> Reviews</a>
            </li>
            <li>
                <a href="{{route('admin.profile')}}"><i class="fa-solid fa-address-card"></i> Profile</a>
            </li>
            <!-- Add more navigation links here -->
        </ul>
    </nav>

    <!-- Page Content -->
    <div id="content">
        <!-- <nav id="header" class="navbar navbar-expand-lg">
            <button type="button" id="sidebarCollapse" class="btn">
                <i class="fas fa-bars"></i>
            </button>
        </nav> -->
        <div class="container-fluid">
            <div style="border-bottom: black; border-bottom-style: solid;">
                <h3><b>@yield('head')</b></h3>
            </div>
            <!-- Page content goes here -->
            @yield('body')
            <!-- Add your content here -->
        </div>
    </div>

    <!-- Bootstrap and custom JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add your custom JavaScript files here -->
</body>

</html>