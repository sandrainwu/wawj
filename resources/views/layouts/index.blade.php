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
        <table class="mui-table">
            <tr>
                <td width="50%" align="left" height="45" style="vertical-align:middle"><a href="{{ route('/') }}"><img src="img/icon1.gif" style="vertical-align:middle;"> AWJ</a></td>
                <td width="50%" align="right" valign="middle"><a href="#policy">我们</a> | <a href="#about">关于</a></td>
                <td></td>
            </tr>
        </table>
        
     </header>
<!-- 顶部导航 -->

<!-- 底部固定栏 -->
    <nav class="mui-bar mui-bar-footer mui-text-center">
       <h5>Copyright © 2017-2018  WAWJ.COM 版权所有 | 杭州 ● 中国</h5>
       <h5>Support <a href="mailto:admin@wawj.com">admin@wawj.com</a></h5>
    </nav>
<!-- 底部固定栏 -->
<div class = "mui-content">


    <main class="py-4">
        @yield('content')
    </main>
    
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div id="policy"><br><br><br>收费政策</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div id="about">关于网站</div>
</div>



    <!-- Scripts -->
    <script src="{{ asset('js/mui.js') }}"></script>

</body>
</html>
