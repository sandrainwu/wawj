@extends('layouts.baseframe')

@section('top_title')
<a class="navbar-brand" href="{{ route('userHome') }}"><i class="fa fa-chevron-left"></i></a><span class="text-white">我的发布</span>
@endsection

@section('content')
<form id="myform" name="myform" action="" method="post">
    @CSRF
<div class="container">
    <div class="row">
        
    <style type="text/css">
        a{color: #3982ba;"}
    </style>          
        <table class="table table-striped w-100" id="table">
            @foreach($list as $t)
            <tr id="row_{{ $t->id }}">
                <td align="center"><input name="tobedeleted[]" value="{{ $t->id}}" type="checkbox"></td>
            @if ($t->transaction == 'buy')
                <td><a href="{{ route('userBuyHouseEdit', ['id' => $t->id]) }}">{{ $t->community }}</a></td>
                <td align="right">{{ $t->price/10000 }} <small class="text-black-50">万元</small></td>
                <td style="width: 50px"><span class="badge badge-danger">买房</span></td>
            @elseif ($t->transaction == 'sale')
                <td><a href="{{ route('userSaleHouseEdit', ['id' => $t->id]) }}">{{ $t->community }}</a></td>
                <td align="right">{{ $t->price/10000 }} <small class="text-black-50">万元</small></td>
                <td style="width: 50px"><span class="badge badge-success">卖房</span></td>
            @elseif ($t->transaction == 'rent')
                <td><a href="{{ route('userRentHouseEdit', ['id' => $t->id]) }}">{{ $t->community }}</a></td>
                <td align="right">{{ $t->price }} <small class="text-black-50">元/月</small></td>
                <td style="width: 50px"><span class="badge badge-danger">求租</span></td>
            @elseif ($t->transaction == 'let')
                <td><a href="{{ route('userLetHouseEdit', ['id' => $t->id]) }}">{{ $t->community }}</a></td>
                <td align="right">{{ $t->price }} <small class="text-black-50">元/月</small></td>
                <td style="width: 50px"><span class="badge badge-success">出租</span></td>
            @endif
            </tr>
            @endforeach
        </table>
    </div>
</div>
</form>
<br>
<!-- 底部按钮开始 -->
<nav class="navbar fixed-bottom p-0">
    <table class="bg-white w-100">
        <tr style="border-spacing:0;margin: 0px;padding: 0px;">
            <td class="pl-0"><button id="checkall" type="button" class="btn btn-primary btn-block rounded-0">全 选</button></td>
            <td class="pl-0"><button id="shanchu" type="submit" class="btn btn-primary btn-block rounded-0">删 除</button></td>
        </tr>
    </table>
</nav>
<!-- 底部按钮结束 -->

<script type="text/javascript">
    var target=null;
    $(function () {
        $("#checkall").click(function () {
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
                $.post("{{ $_SERVER['REQUEST_URI'] }}",$("#myform").serialize(),function(result){
                    for(var i=0;i<result.length;i++){
                        $("#row_"+result[i]).remove();
                    }
                });
            }
            else
                alert('请选择需要删除的信息');
        });
        
    });
</script>
@endsection