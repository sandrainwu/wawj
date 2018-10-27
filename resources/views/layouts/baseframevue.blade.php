<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
     -->
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
</head>
<body>
<style type="text/css">
    .btn{line-height: 1.8}
    body{background-color:transparent;padding: 5px;margin: 0px;}
    .btn-xsm {padding: 0.3rem;font-size: 0.6rem; line-height: 1.5;width:60px;border-radius: 0.2rem;}
</style>
<!-- 顶部导航 -->
    <nav class="navbar navbar-dark sticky-top border-bottom" style="padding-top: 0.1rem;padding-bottom: 0.2rem;">
        @yield('top')
    </nav>
<!-- 顶部导航 -->
@yield('content')
@yield('bottom')
@yield('javascript')
</body>
</html>