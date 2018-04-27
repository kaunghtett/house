<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Starter</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @include ('admin.styles')

    @yield ('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

        @include ('admin.main_header')

        @include ('admin.aside')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include ('admin.content-header')

            <!-- Main content -->
            <section class="content container-fluid">

                @yield ('content')

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include ('admin.footer')

        @include ('admin.control_sidebar')

    </div>
    <!-- ./wrapper -->

    @include ('admin.scripts')

    @yield ('js')
</body>
</html>
