<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
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
                <td width="50%" align="left" height="45" style="vertical-align:middle"><a href="{{ route('/') }}"><img src="img/icon2.png" style="vertical-align:middle;"></a></td>
                <td width="50%" align="right" valign="middle"><a href="#policy">我们</a> | <a href="#about">网站</a></td>
                <td></td>
            </tr>
        </table>
        
     </header>
<!-- 顶部导航 -->


<!-- 中间内容 -->
    @yield('content')
<!-- 中间内容-->


<!-- 中间内容1-->
<div class="mui-content">
    <div class="mui-row" style="height: 300px">
        <div class="mui-col-sm-6 mui-col-xs-6" style="padding-left:8px;padding-right: 8px">
            <div id="policy" class="mui-text-center">关于我们</div>
            <div class="mui-text-center"><hr><span class="mui-icon mui-icon-checkmarkempty"></span>不利用公众信息牟利<br><span class="mui-icon mui-icon-checkmarkempty"></span>只提供免费信息平台<br><span class="mui-icon mui-icon-checkmarkempty"></span>不收取任何信息费用<br><span class="mui-icon mui-icon mui-icon-checkmarkempty"></span>中介为交易流程服务</div>
        </div>
        
        <div class="mui-col-sm-6 mui-col-xs-6" style="padding-left:8px;padding-right: 8px">
            <div id="about" class="mui-text-center">关于网站</div>
            <div class="mui-text-center"><hr>基于以下开源技术开发<br><a style="color: #3982ba" href="http://www.php.net">PHP <img src="img/php.png" align="baseline"></a> | <a href="https://laravel.com" style="color: #3982ba">Laravel</a> <img src="img/laravel.png" align="baseline"> | <a href="https://www.mysql.com" style="color: #3982ba">Mysql</a> <img src="img/mysql.png" align="baseline"><br><a href="http://dev.dcloud.net.cn/mui/" style="color: #3982ba">MUI</a> <img src="img/mui.png" align="baseline">| <a href="http://www.phpmyadmin.net" style="color: #3982ba">phpMyAdmin</a> <img src="img/phpmyadmin.png" align="baseline"> | <a href="https://apache.org" style="color: #3982ba">Apache</a> <img src="img/apache.png" align="baseline"></div>
        </div>
    </div>
</div>
<!-- 中间内容1-->






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