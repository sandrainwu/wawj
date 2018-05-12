@extends('layouts.userhometoponly')

@section('title')
我的发布 <span class="mui-badge mui-badge-success">{{ $count }}</span>
@endsection


@section('content')

<br>
<div class="mui-content">
    

    <script src="{{ asset('js/getcity.js') }}"></script>
    <form action="{{ route('messageSave') }}" method="post">
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    @CSRF


    <div class="mui-row" style="padding-left: 5px;padding-right: 5px">

        <table width="100%">
        @foreach($list as $t)
            <tr>
            @if ($t->transaction == 'buy')
                <td align="right"><a href="{{ route('buyHouseEdit', ['id' => $t->id]) }}" style="color: #3982ba;">{{ $t->community }}</a></td>
                <td align="right">{{ $t->price/10000 }}</td><td style="padding-left: 5px"><h6>万元</h6></td>
                <td align="center" style="padding: 6px"><span class="mui-badge mui-badge-primary">买入</span></td>
            @elseif ($t->transaction == 'sale')
                <td align="right"><a href="{{ route('saleHouseEdit', ['id' => $t->id]) }}" style="color: #3982ba;">{{ $t->community }}</a></td>
                <td align="right">{{ $t->price/10000 }}</td><td style="padding-left: 5px"><h6>万元</h6></td>
                <td align="center" style="padding: 6px"><span class="mui-badge mui-badge-danger">卖出</span></td>
            @elseif ($t->transaction == 'rent')
                <td align="right"><a href="{{ route('rentHouseEdit', ['id' => $t->id]) }}" style="color: #3982ba;">{{ $t->community }}</a></td>
                <td align="right">{{ $t->price }}</td><td style="padding-left: 5px"><h6>元/月</h6></td>
                <td align="center" style="padding: 6px"><span class="mui-badge mui-badge-danger">租入</span></td>
            @elseif ($t->transaction == 'let')
                <td align="right"><a href="{{ route('letHouseEdit', ['id' => $t->id]) }}" style="color: #3982ba;">{{ $t->community }}</a></td>
                <td align="right">{{ $t->price }}</td><td style="padding-left: 5px"><h6>元/月</h6></td>
                <td align="center" style="padding: 6px"><span class="mui-badge mui-badge-danger">出租</span></td>
            @endif
            </tr>
        @endforeach
        </table>
    </div>
    <br>
    <div class="mui-row">
        <div class="mui-col-sm-1 mui-col-xs-1">
        </div>
        <div class="mui-col-sm-10 mui-col-xs-10">
            <button type="submit" class="mui-btn mui-btn-primary" style="width:100%">保 存</button>
        </div>
        <div class="mui-col-sm-1 mui-col-xs-1">
        </div>
    </div>
    
    </form>
</div>

@endsection

@section('js')

<script>
    mui.init();
    (function($) {
        //$.swipeoutOpen(el,direction)//打开指定列的滑动菜单，el:指定列的dom对象，direction：取值left|right，指定打开的是左侧或右侧滑动菜单
        //$.swipeoutClose(el);//关闭指定列的滑动菜单，el:指定列的dom对象
        //              setTimeout(function() {
        //                  $.swipeoutOpen(document.getElementById("OA_task_1").querySelector('li:last-child'), 'left');
        //                  setTimeout(function() {
        //                      $.swipeoutClose(document.getElementById("OA_task_1").querySelector('li:last-child'));
        //                  }, 1000);
        //              }, 1000);
        //第一个demo，拖拽后显示操作图标，点击操作图标删除元素；
        $('#OA_task_1').on('tap', '.mui-btn', function(event) {
            var elem = this;
            var li = elem.parentNode.parentNode;
            mui.confirm('确认删除该条记录？', 'Hello MUI', btnArray, function(e) {
                if (e.index == 0) {
                    li.parentNode.removeChild(li);
                } else {
                    setTimeout(function() {
                        $.swipeoutClose(li);
                    }, 0);
                }
            });
        });
        var btnArray = ['确认', '取消'];
        //第二个demo，向左拖拽后显示操作图标，释放后自动触发的业务逻辑
        $('#OA_task_2').on('slideleft', '.mui-table-view-cell', function(event) {
            var elem = this;
            mui.confirm('确认删除该条记录？', 'Hello MUI', btnArray, function(e) {
                if (e.index == 0) {
                    elem.parentNode.removeChild(elem);
                } else {
                    setTimeout(function() {
                        $.swipeoutClose(elem);
                    }, 0);
                }
            });
        });
        //第二个demo，向右拖拽后显示操作图标，释放后自动触发的业务逻辑
        $('#OA_task_2').on('slideright', '.mui-table-view-cell', function(event) {
            var elem = this;
            mui.confirm('确认删除该条记录？', 'Hello MUI', btnArray, function(e) {
                if (e.index == 0) {
                    elem.parentNode.removeChild(elem);
                } else {
                    setTimeout(function() {
                        $.swipeoutClose(elem);
                    }, 0);
                }
            });
        });
    })(mui);
</script>
@endsection