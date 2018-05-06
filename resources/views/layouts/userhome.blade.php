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
        
     </header>
<!-- 顶部导航 -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    </form>



    
<!--登录后主体页面  -->
<div class="mui-content">
    <div id="tabbar1" class="mui-control-content mui-active">
         <ul class="mui-table-view mui-grid-view mui-grid-9">
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="{{ route('buyHouse') }}">
                    <span class="mui-icon mui-icon-home"></span>
                    <div class="mui-media-body">买 房</div></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="{{ route('saleHouse') }}">
                    <span class="mui-icon mui-icon-email"><span class="mui-badge">5</span></span>
                    <div class="mui-media-body">卖 房</div></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="{{ route('postList', ['id' => Auth::id()]) }}">
                    <span class="mui-icon mui-icon-chatbubble"></span>
                    <div class="mui-media-body">我发布的信息</div></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="{{ route('rentHouse') }}">
                    <span class="mui-icon mui-icon-location"></span>
                    <div class="mui-media-body">租 房</div></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="{{ route('letHouse') }}">
                    <span class="mui-icon mui-icon-search"></span>
                    <div class="mui-media-body">出 租</div></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
                    <span class="mui-icon mui-icon-phone"></span>
                    <div class="mui-media-body">Phone</div></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
                    <span class="mui-icon mui-icon-gear"></span>
                    <div class="mui-media-body">Setting</div></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
                    <span class="mui-icon mui-icon-info"></span>
                    <div class="mui-media-body">about</div></a></li>
           <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
                    <span class="mui-icon mui-icon-more"></span>
                    <div class="mui-media-body">more</div></a></li>
        </ul> 
    </div>

    <div id="tabbar2" class="mui-control-content">
        22222222222222222222222222222
    </div>

    <div id="tabbar3" class="mui-control-content">
        33333333333333333333333333333
    </div>

    <div id="tabbar4" class="mui-control-content">
        44444444444444444444444444444
    </div>

</div>
<!--登录后主体页面  -->

<!-- 底部固定栏 -->

    <nav class="mui-bar mui-bar-tab">
            <a class="mui-tab-item mui-active" href="#tabbar1">
                <span class="mui-icon mui-icon-home"></span>
                <span class="mui-tab-label">首页</span>
            </a>
            <a class="mui-tab-item" href="#tabbar2">
                <span class="mui-icon mui-icon-email"><span class="mui-badge">9</span></span>
                <span class="mui-tab-label">消息</span>
            </a>
            <a class="mui-tab-item" href="#tabbar3">
                <span class="mui-icon mui-icon-starhalf"></span>
                <span class="mui-tab-label">关注</span>
            </a>
            <a class="mui-tab-item" href="#tabbar4">
                <span class="mui-icon mui-icon-gear"></span>
                <span class="mui-tab-label">设置</span>
            </a>
        </nav>

<!-- 底部固定栏 -->

<!-- Scripts -->
    <script src="{{ asset('js/mui.js') }}"></script>
</body>
</html>