@extends('layouts.index')

@section('content')
<!-- 中间内容 -->
<div class="mui-content">
    <div class="mui-row" style="height:500px;vertical-align:bottom;text-align: center;">
        <div class="mui-col-sm-1 mui-col-xs-1">
        </div>
            
        <div class="mui-col-sm-10 mui-col-xs-10">
                <br><br><br><img src="img/icon4.png"><br><br><br>
                <a href="{{ route('login') }}" class="mui-btn mui-btn-primary" style="width:100%">登 录</a><br><br>
                <a href="{{ route('login') }}" class="mui-btn mui-btn-primary" style="width:100%">游 客</a>
        </div>
        <div class="mui-col-sm-1 mui-col-xs-1">
        </div>
            
    </div>
 </div>
<!-- 中间内容-->
@endsection
