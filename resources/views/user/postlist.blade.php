@extends('layouts.userhometoponly')

@section('title')
我发布的信息 <span class="mui-badge mui-badge-success">{{ $count }}</span>
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
                <td align="right"><a href="{{ route('buyHouseEdit', ['id' => $t->id]) }}" style="color: #3982ba">{{ $t->community }}</a></td>
                <td align="right">{{ $t->price }}</td><td style="padding-left: 5px"><h6>万元</h6></td>
                <td align="center"><span class="mui-badge mui-badge-primary">买</span></td>
            @elseif ($t->transaction == 'sale')
                <td align="right"><a href="{{ route('saleHouseEdit', ['id' => $t->id]) }}" style="color: #3982ba">{{ $t->community }}</a></td>
                <td align="right">{{ $t->price }}</td><td style="padding-left: 5px"><h6>万元</h6></td>
                <td align="center"><span class="mui-badge mui-badge-danger">卖</span></td>
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
