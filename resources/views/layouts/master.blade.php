<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Townville - Real Estate template</title>

    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">

    @include ('layouts.styles')

    @yield ('css')

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
    <!-- navbar-->
    <header class="header">
        @include ('layouts.topbar')

        @include ('layouts.nav')
    </header>

    @yield ('content')

    <!-- Scroll Top Button -->
    <div id="scrollTopButton"><i class="fa fa-long-arrow-up"></i></div>

    @include ('layouts.footer')

    <!-- Javascript files-->
    @include ('layouts.scripts')

    @include('sweet::alert')

    @yield ('js')

</body>
</html>
