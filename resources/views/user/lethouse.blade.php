@extends('layouts.userhometoponly')

@section('title')
我要出租
@endsection

@section('content')

<br>
<div class="mui-content">
    <script src="{{ asset('js/getcity.js') }}"></script>
    <form action="{{ route('messageSave') }}" method="post">
        <input type="hidden" name="user_id" value="{{  Auth::id() }}">
        <input type="hidden" name="transaction" value="let">
        {!! isset($post_id) ? '<input type="hidden" name="post_id" value="'.$post_id.'">' : '' !!}
        @CSRF

        
        <div class="mui-row">
            <div class="mui-col-sm-2 mui-col-xs-2" style="padding:9px;text-align:right;">小区
            </div>
            <div class="mui-col-sm-8 mui-col-xs-8">
                <input placeholder="住宅小区名称" type="text" class="form-control{{ $errors->has('community') ? ' is-invalid' : '' }}" name="community" value="{{ $list->community or old('community') }}" required autofocus>
            </div>
            <div class="mui-col-sm-2 mui-col-xs-2" style="padding:9px;">
            </div>
        </div>  
     
        <div class="mui-row">
            <div class="mui-col-sm-2 mui-col-xs-2" style="padding:9px;text-align:right;">类型
            </div>
            <div class="mui-col-sm-8 mui-col-xs-8">
                <select name="house_type" class="form-control" style="box-sizing: border-box;
    border: #626262 1px solid;color: #333;"> 
                    <option value="别墅" 
                    @if (isset($list->house_type)&& ($list->house_type == '别墅'))
                        selected
                    @endif 
                    >别墅</option>
                    <option value="排屋"
                    @if (isset($list->house_type)&&($list->house_type == '排屋'))
                        selected
                    @endif 
                    >排屋</option>
                    <option value="普通住宅"@if ( !isset($list->house_type))
                                                selected
                                            @elseif ($list->house_type=== '普通住宅')
                                                selected
                                            @endif
                    >普通住宅</option>
                    <option value="公寓"
                    @if (isset($list->house_type)&&($list->house_type == '公寓'))
                        selected
                    @endif 
                    >公寓</option>
                    <option value="商住楼"
                    @if (isset($list->house_type)&&($list->house_type == '商住楼'))
                        selected
                    @endif 
                    >商住楼</option>
                    <option value="写字楼" 
                    @if ( isset($list->house_type)&&($list->house_type == '写字楼'))
                        selected
                    @endif 
                    >写字楼</option>
                    <option value="商铺" 
                    @if (isset($list->house_type)&&($list->house_type == '商铺'))
                        selected
                    @endif 
                    >商铺</option>
                    <option value="工业物业" 
                    @if (isset($list->house_type)&&($list->house_type == '工业物业'))
                        selected
                    @endif 
                    >工业物业</option>
                </select>
            </div>
            <div class="mui-col-sm-2 mui-col-xs-2" style="padding:9px;"><h5>单选</h5>
            </div>
        </div>


        <div class="mui-row">
            <div class="mui-col-sm-2 mui-col-xs-2" style="padding:9px;text-align:right;">面积
            </div>
            <div class="mui-col-sm-8 mui-col-xs-8">
                <input placeholder="建筑面积" type="text" class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" value="{{ $list->area or old('area') }}" required>
            </div>
            <div class="mui-col-sm-2 mui-col-xs-2" style="padding:9px;"><h5>m<sup>2</sup></h5>
            </div>
        </div>

        <div class="mui-row">
            <div class="mui-col-sm-2 mui-col-xs-2" style="padding:9px;text-align:right;">价格
            </div>
            <div class="mui-col-sm-8 mui-col-xs-8">
                <input placeholder="总价" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $list->price or old('price') }}" required>
            </div>
            <div class="mui-col-sm-2 mui-col-xs-2" style="padding:9px;"><h5>元/月</h5>
            </div>
        </div>

        <div class="mui-row">
            <div class="mui-col-sm-2 mui-col-xs-2" style="padding:9px;text-align:right;">权证
            </div>
            <div class="mui-col-sm-8 mui-col-xs-8">
                <input placeholder="房产证编号" type="text" class="form-control{{ $errors->has('certificate_number') ? ' is-invalid' : '' }}" name="certificate_number" value="{{ $list->certificate_number or old('certificate_number') }}" required>
            </div>
            <div class="mui-col-sm-2 mui-col-xs-2" style="padding:9px;"><h5>唯一</h5>
            </div>
        </div>

        <div class="mui-row">
            <div class="mui-col-sm-2 mui-col-xs-2" style="padding:9px;text-align:right;">特点
            </div>
            <div class="mui-col-sm-8 mui-col-xs-8">
                <input placeholder="房屋特点" type="text" class="form-control{{ $errors->has('feature') ? ' is-invalid' : '' }}" name="feature" value="{{ $list->feature or old('feature') }}" required>
            </div>
            <div class="mui-col-sm-2 mui-col-xs-2" style="padding:9px;"><h5>可多选</h5>
            </div>
        </div>
                            
        <div class="mui-row">
            <div class="mui-col-sm-1 mui-col-xs-1">
            </div>
            <div class="mui-col-sm-10 mui-col-xs-10">
                <button type="submit" class="mui-btn mui-btn-primary" style="width: 100%">保 存</button>
            </div>
            <div class="mui-col-sm-1 mui-col-xs-1">
            </div>
        </div>

    </form>
</div>
@endsection
