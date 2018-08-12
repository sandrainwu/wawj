@extends('layouts.baseframe')

@section('top_title')
<a class="navbar-brand" href="{{ route('userHome') }}"><i class="fa fa-chevron-left"></i></a><span class="text-white">我的发布</span>
@endsection

@section('content')
<form id="myform" action="" method="post">
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    @CSRF
<div class="container">
    <div class="row">
        <!-- <ul id="OA_task_1" class="mui-table-view">
                
            @foreach($list as $t)
                <li class="mui-table-view-cell">
                    <div class="mui-slider-right mui-disabled">
                        <a class="mui-btn mui-btn-red">删除</a>
                    </div>
                    <div class="mui-row mui-slider-handle">
                        <div class="mui-col-sm-1 mui-col-xs-1 mui-checkbox"><input name="tobedeleted[]" value="{{ $t->id}}" type="checkbox" style="right:10px;top: 0px"></div>
                        <div class="mui-col-sm-5 mui-col-xs-5"><a href="{{ route('buyHouseEdit', ['id' => $t->id]) }}" style="color: #3982ba;">{{ $t->community }}</a></div>
                        <div class="mui-col-sm-3 mui-col-xs-3" style="text-align: right">{{ $t->price/10000 }}</div>
                        <div class="mui-col-sm-1 mui-col-xs-1" style="margin-bottom:1px"><h6>万元</h6></div>
                        <div class="mui-col-sm-2 mui-col-xs-2"><span class="mui-badge mui-badge-primary">买入</span></div>
                    </div>
                </li>
            @endforeach
        </ul>
         -->
<style type="text/css">
    a{color: #3982ba;"}
</style>          
        <table class="table table-striped w-100" id="table">
            @foreach($list as $t)
            <tr id="row_{{ $t->id }}">
                <td align="center"><input name="tobedeleted[]" value="{{ $t->id}}" type="checkbox"></td>
            @if ($t->transaction == 'buy')
                <td><a href="{{ route('buyHouseEdit', ['id' => $t->id]) }}">{{ $t->community }}</a></td>
                <td align="right">{{ $t->price/10000 }} <small class="text-black-50">万元</small></td>
                <td style="width: 50px"><span class="badge badge-danger">买</span></td>
            @elseif ($t->transaction == 'sale')
                <td><a href="{{ route('saleHouseEdit', ['id' => $t->id]) }}">{{ $t->community }}</a></td>
                <td align="right">{{ $t->price/10000 }} <small class="text-black-50">万元</small></td>
                <td style="width: 50px"><span class="badge badge-success">卖</span></td>
            @elseif ($t->transaction == 'rent')
                <td><a href="{{ route('rentHouseEdit', ['id' => $t->id]) }}">{{ $t->community }}</a></td>
                <td align="right">{{ $t->price }} <small class="text-black-50">元/月</small></td>
                <td style="width: 50px"><span class="badge badge-danger">求租</span></td>
            @elseif ($t->transaction == 'let')
                <td><a href="{{ route('letHouseEdit', ['id' => $t->id]) }}">{{ $t->community }}</a></td>
                <td align="right">{{ $t->price }} <small class="text-black-50">元/月</small></td>
                <td style="width: 50px"><span class="badge bade-success">出租</span></td>
            @endif
            </tr>
            @endforeach
        </table>
    </div>
</div>
</form>
<br>
<!-- 底部按钮 -->
<nav class="navbar fixed-bottom p-0">
    <table class="bg-white w-100">
        <tr style="border-spacing:0;margin: 0px;padding: 0px;">
            <td class="pl-0"><button id="checkall" type="button" class="btn btn-primary btn-block rounded-0">全 选</button></td>
            <td class="pl-0"><button id="shanchu" type="button" class="btn btn-primary btn-block rounded-0">删 除</button></td>
        </tr>
    </table>
</nav>
<!-- 底部按钮 -->

<script type="text/javascript">
    var target=null;
    $(function () {
        $('#checkall').click(function () {
            if (target=="checked"){
                target=null;
                $("#table input[type='checkbox']").prop("checked",target);
                $('#checkall').text("全 选");
            }
            else{
                target="checked";
                $("#table input[type='checkbox']").prop("checked",target);
                $('#checkall').text("不 选");
            }
        });
        $('#shanchu').click(function () {
            if($("input:checkbox[name='tobedeleted[]']:checked").length>0){
                alert("start ajax");
                $('#myform').post("{{ $_SERVER['REQUEST_URI'] }}",function(result){
                    alert(result);});
            }
            else
                alert('请选择需要删除的信息');
        });
        
    });
</script>
@endsection