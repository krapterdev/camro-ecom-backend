<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title start -->
    @include("admin.layouts.partials/titleMeta")
    <!-- Title end -->

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin_assets/images/favicon.ico')}}">
    <link href="{{ asset('admin_assets/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons css (Require in all Page) -->
    <link href="{{ asset('admin_assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App css (Require in all Page) -->
    <link href="{{ asset('admin_assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Theme Config js (Require in all Page) -->
    <script src="{{ asset('admin_assets/js/config.js')}}"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />


</head>

<body>

    <!-- START Wrapper -->
    <div class="wrapper">
        <!-- topbar start -->
        @include("admin.layouts.partials/topbar")
        <!-- topbar end -->
        <!-- sidebar start -->
        @include("admin.layouts.partials/sidebar")
        <!-- sidebar end -->
        <!-- Page Content Start -->
        <div class="page-content">
            <!-- Start start -->
            @yield('content')
            <!-- Start end -->
        </div>
        <!-- Page Content end -->

        <!-- footer start -->
        @include("admin.layouts.partials/footer")
        <!-- footer end -->


    </div>
    <!-- END Wrapper -->

    <!-- Vendor Javascript (Require in all Page) -->
    <script src="{{ asset('admin_assets/js/vendor.js')}}"></script>
    <!-- App Javascript (Require in all Page) -->
    <script src="{{ asset('admin_assets/js/app.js')}}"></script>
    <!-- Vector Map Js -->
    <script src="{{ asset('admin_assets/vendor/jsvectormap/jsvectormap.min.js')}}"></script>
    <script src="{{ asset('admin_assets/vendor/jsvectormap/maps/world-merc.js')}}"></script>
    <script src="{{ asset('admin_assets/vendor/jsvectormap/maps/world.js')}}"></script>
    <!-- Dashboard Js -->
    <script src="{{ asset('admin_assets/js/pages/dashboard.js')}}"></script>
    <!-- for product only js  -->
    <script src="{{ asset('admin_assets/js/pages/ecommerce-product-details.js')}}"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


</body>

</html>