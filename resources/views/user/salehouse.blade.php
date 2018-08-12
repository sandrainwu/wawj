@extends('layouts.baseframe')

@section('top_title')
<a class="navbar-brand" href="{{ $backto or route('userHome') }}"><i class="fa fa-chevron-left"></i></a><span class="text-white">我要卖房</span>
@endsection

@section('content')
<br>
<form action="{{ route('messageSave') }}" method="post">
    <input type="hidden" name="user_id" value="{{  Auth::id() }}">
    <input type="hidden" name="transaction" value="sale">
    {!! isset($post_id) ? '<input type="hidden" name="post_id" value="'.$post_id.'">' : '' !!}
    @CSRF

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <div class="row">
                <div class="col-md-12 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">名称</span>
                    </div>
                    <input placeholder="住宅小区名称" type="text" class="form-control{{ $errors->has('community') ? ' is-invalid' : '' }}" name="community" value="{{ $list->community or old('community') }}" required autofocus aria-describedby="basic-addon1">
                </div>
            </div>
                            
            <div class="row">
                <div class="col-md-12 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2">类型</span>
                    </div>
                    <select name="house_type" aria-describedby="basic-addon2" class="form-control"> 
                        <option value="别墅" 
                        @if ( isset($list->house_type) )
                            @if ($list->house_type == '别墅')
                                selected
                            @endif
                        @endif 
                        >别墅</option>
                        <option value="排屋"
                        @if ( isset($list->house_type) )
                            @if ($list->house_type == '排屋')
                                selected
                            @endif
                        @endif 
                        >排屋</option>
                        <option value="普通住宅"@if ( !isset($list->house_type))
                                                    selected
                                                @elseif ($list->house_type=== '普通住宅')
                                                    selected
                                                @endif
                        >普通住宅</option>
                        <option value="公寓"
                        @if ( isset($list->house_type) )
                            @if ($list->house_type == '公寓')
                                selected
                            @endif
                        @endif 
                        >公寓</option>
                        <option value="商住楼"
                        @if ( isset($list->house_type) )
                            @if ($list->house_type == '商住楼')
                                selected
                            @endif
                        @endif 
                        >商住楼</option>
                        <option value="写字楼" 
                        @if ( isset($list->house_type) )
                            @if ($list->house_type == '写字楼')
                                selected
                            @endif
                        @endif 
                        >写字楼</option>
                        <option value="商铺" 
                        @if ( isset($list->house_type) )
                            @if ($list->house_type == '商铺')
                                selected
                            @endif
                        @endif 
                        >商铺</option>
                        <option value="工业物业" 
                        @if ( isset($list->house_type) )
                            @if ($list->house_type == '工业物业')
                                selected
                            @endif
                        @endif 
                        >工业物业</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">面积</span>
                    </div>
                    <input placeholder="建筑面积" type="text" class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" value="{{ $list->area or old('area') }}" required aria-describedby="basic-addon3">
                    <div class="input-group-append">
                        <span class="input-group-text pl-2" style="width:50px;">m<sup>2</sup></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon4">价格</span>
                    </div>
                    <input placeholder="售价" type="tel" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $list->price or old('price') }}" required aria-describedby="basic-addon4">
                    <div class="input-group-append">
                        <span class="input-group-text pl-2" style="width:50px;">万元</span>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon5">证号</span>
                    </div>
                    <input placeholder="房产证编号" type="text" class="form-control{{ $errors->has('certificate_number') ? ' is-invalid' : '' }}" name="certificate_number" value="{{ $list->certificate_number or old('certificate_number') }}" required aria-describedby="basic-addon5">
                </div>
            </div>
                            
            <div class="row">
                <div class="col-md-12 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon6">特点</span>
                    </div>
                    <input placeholder="房屋特点" type="text" class="form-control{{ $errors->has('feature') ? ' is-invalid' : '' }}" name="feature" value="{{ $list->feature or old('feature') }}" required aria-describedby="basic-addon6">
                </div>
            </div>
            
        </div>
    </div>
</div>                    
            
<nav class="navbar fixed-bottom p-0">
    <table class="bg-white w-100">
        <tr style="border-spacing:0;margin: 0px;padding: 0px;">
            <td class="pl-0"><button type="reset" class="btn btn-primary btn-block rounded-0">重 写</button></td>
            <td class="pl-0"><button type="submit" class="btn btn-primary btn-block rounded-0">保 存</button></td>
        </tr>
    </table>
</nav>

</form>
@endsection