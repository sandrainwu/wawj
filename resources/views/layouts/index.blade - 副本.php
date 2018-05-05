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
    <header class="mui-bar-nav-bg mui-bar mui-bar-nav" style="background-color: #3982ba">
        <table class="mui-table" style="color: #ffffff">
            <tr>
                <td width="50%" align="left" height="45" style="vertical-align:middle"><a href="{{ route('/') }}"><img src="img/icon1.gif" style="vertical-align:middle;"></a></td>
                <td width="50%" align="right" valign="middle"><a href="#policy">我们</a> | <a href="#about">关于</a></td>
                <td></td>
            </tr>
        </table>
        
     </header>
<!-- 顶部导航 -->

<!-- 中间内容 -->
<div class="mui-content">
    <div class="mui-row">
        <div class="mui-col-sm-12 mui-col-xs-12" style="height: 500px;vertical-align: middle;">
            @yield('content')
        </div>
    </div>


    <div class="mui-row">
        <div class="mui-col-sm-6 mui-col-xs-12">
            <li class="mui-table-view-cell">
                <div id="policy">收费政策</div>
            </li>
        </div>
        <div class="mui-col-sm-6 mui-col-xs-12">
            <li class="mui-table-view-cell">
                <div id="about">关于网站</div>
            </li>
        </div>
    </div>
</div>
<!-- 中间内容-->

<!-- 底部固定栏 -->
    <nav class="mui-bar mui-bar-footer mui-text-center" style="background-color: #e3e3e3">
       <h5 style="color: #3982ba">Copyright © 2017-2018  WAWJ.COM 版权所有 | 杭州 ● 中国</h5>
       <h5 style="color: #3982ba">Support <a href="mailto:service@wawj.com" style="color: #000000">service@wawj.com</a></h5>
    </nav>
<!-- 底部固定栏 -->

<!-- Scripts -->
    <script src="{{ asset('js/mui.js') }}"></script>
</body>
</html>
