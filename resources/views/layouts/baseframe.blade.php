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
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</head>
<body>
<style type="text/css">
    .btn{line-height: 1.8}
</style>
<!-- 顶部导航开始 -->
    <nav class="navbar navbar-dark sticky-top" style="background-color: #3f80cc;padding-top: 0.3rem;padding-bottom: 0.3em;">
        @yield('top_title')
    </nav>
<!-- 顶部导航结束 -->

@yield('content')

@yield('bottom')
</body>
</html>