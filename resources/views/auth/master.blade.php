<!DOCTYPE html>
<html>
<head>
    <!-- meta tag section -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- title tag -->
    <title>@yield('title')</title>
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}">

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap-rtl.css') }}">
    <!-- AdminLTE Skins. -->
    <link rel="stylesheet" href="{{ url('css/AdminLTE-rtl.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('plugins/iCheck/square/blue.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">

    @yield('body')

<!-- jQuery 2.1.4 -->
<script src="{{ url('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ url('plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>