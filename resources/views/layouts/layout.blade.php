<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Top Navigation</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    @vite(['resources/css/app.css',
                    'resources/js/app.js',
                'resources/AdminLTE/plugins/fontawesome-free/css/all.min.css',
            'resources/AdminLTE/dist/css/adminlte.min.css',
            'resources/AdminLTE/plugins/jquery/jquery.min.js',
            'resources/AdminLTE/plugins/bootstrap/js/bootstrap.min.js',
            'resources/AdminLTE/dist/js/adminlte.min.js',
            'resources/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
            'resources/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js',
            'resources/AdminLTE/plugins/uplot/uPlot.iife.min.js',
            'resources/AdminLTE/plugins/uplot/uPlot.min.css',
            'resources/AdminLTE/plugins/daterangepicker/daterangepicker.css'])
</head>


        @yield('content')






</html>
