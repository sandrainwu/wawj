<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/mui.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
       <header class="mui-bar mui-bar-nav mui-bar-nav-bg">
            <a id="icon-menu" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
            <a class="mui-action-back mui-icon mui-icon-home mui-pull-right mui-a-color"></a>
            <h1 class="mui-title">WAWJ</h1>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    
    </div>


    <nav class="mui-bar mui-bar-tab">
        <a class="mui-tab-item mui-active">
            <span class="mui-icon mui-icon-home"></span>
            <span class="mui-tab-label">Copyright © 2017-2018  WAWJ.COM 版权所有 | 杭州 ● 中国</span>
        </a>
       
    </nav>

    <!-- Scripts -->
    <script src="{{ asset('js/mui.js') }}"></script>

</body>
</html>
