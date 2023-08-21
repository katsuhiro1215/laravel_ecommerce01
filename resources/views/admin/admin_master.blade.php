<!DOCTYPE html>
<html lang="ja">

<head>
    @include('admin.inc.head')
</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

        @include('admin.inc.header')

        <!-- Left side column. contains the logo and sidebar -->
        @include('admin.inc.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('admin')
        </div>
        <!-- /.content-wrapper -->
        @include('admin.inc.footer')

        <!-- Control Sidebar -->
        @include('admin.inc.control-sidebar')
        <!-- /.control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->
    @include('admin.inc.script')

</body>

</html>
