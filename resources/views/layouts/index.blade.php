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
<!-- 顶部导航 -->
    <header class="mui-bar mui-bar-nav mui-bar-nav-bg">

        <a id="icon-menu" class="mui-action-back mui-icon mui-pull-left" href="{{ route('/') }}"><img src="img/icon1.gif" style="vertical-align:middle"> AWJ</a>
        <div class = "mui-content">
            <a href="#popover" id="openPopover" class="mui-icon mui-icon-bars mui-pull-right"></a>
        </div>
        
    </header>
<!-- 顶部导航 -->

<!-- 底部固定栏 -->
    <nav class="mui-bar mui-bar-footer mui-text-center">
       <h5>Copyright © 2017-2018  WAWJ.COM 版权所有 | 杭州 ● 中国</h5>
       <h5>Support <a href="mailto:admin@wawj.com">admin@wawj.com</a></h5>
    </nav>
<!-- 底部固定栏 -->





<!-- menu -->
    <div class = "mui-content">
        <div id="popover" class="mui-popover">
            <ul class="mui-table-view">
               <li class="mui-table-view-cell"><a href="#aboutus">关于我们</a></li>
               <li class="mui-table-view-cell"><a href="#policy">收费政策</a></li>
               <li class="mui-table-view-cell"><a href="#aboutsite">关于网站</a></li>
            </ul>
        </div>
    </div>
<!-- menu -->

    <main class="py-4">
        @yield('content')
    </main>
    
<div class = "mui-content">
    <div id="aboutus">关于我们</div>
    <div id="policy">收费政策</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div id="aboutsite">关于网站</div>
</div>



    <!-- Scripts -->
    <script src="{{ asset('js/mui.js') }}"></script>

</body>
</html>
