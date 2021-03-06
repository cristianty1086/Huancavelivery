<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Huancavelivery</title>

    <!-- Custom fonts for this template-->
    <link href="{!! asset('theme/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{!! asset('theme/dist/css/sb-admin-2.min.css') !!}" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('theme.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('theme.header')

                @yield('content')
            </div>
        </div>

    </div>

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{!! asset('theme/vendor/jquery/jquery.min.js') !!}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{!! asset('theme/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{!! asset('theme/dist/js/demo/chart-area-demo.js') !!}"></script>
    <script src="{!! asset('theme/dist/js/demo/chart-pie-demo.js') !!}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('theme/dist/js/sb-admin-2.js') !!}"></script>

</body>



</html>
