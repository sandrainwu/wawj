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
                <td width="30%" align="left" height="45" style="vertical-align:middle">
                @if (Route::currentRouteName()=="userhome")
                    <a href="{{ route('/') }}"><img src="img/icon2.png" style="vertical-align:middle;"></a>
                @else
                    <a href="{{ URL::previous() }}"><span class="mui-icon mui-icon-back"></span></a>
                @endif
                </td>
                <td width="40%" align="center">
                    @yield('title')
                </td>
                <td width="30%" align="right" valign="middle">{{ Auth::guard('user')->user()->real_name }} | <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出</a></td>
                <td></td>
            </tr>
        </table>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </header>


<!-- 中间内容 -->
    @yield('content')
<!-- 中间内容 -->

     <!-- Scripts -->
    <script src="{{ asset('js/mui.js') }}"></script>
</body>
</html>