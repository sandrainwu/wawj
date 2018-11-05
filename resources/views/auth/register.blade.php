@extends('layouts.baseframe')

@section('top_title')
<a class="navbar-brand" href="{{ route('/') }}"><img alt="Brand" src="{{ asset('img/wawj.svg') }}" width="30" height="30" class="d-inline-block align-top"> WAWJ.COM</a><span class="text-white">用户注册</span>
@endsection

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                       <div class="row form-group">
                                <div class="col-md-12 input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-user-o fa-fw"></i></div>
                                    </div>
                                    <input type="tel" class="form-control" autocomplete="on" placeholder="手机号码" aria-label="请输入11位手机号" aria-describedby="btnGroupAddon" id="account_phone" class="form-control" name="account_phone" value="{{ $username or old('account_phone') }}" required autofocus>
                                </div>
                            </div>
                            @if ($errors->has('account_phone'))
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="text-danger"><strong>{{ $errors->first('account_phone') }}</strong></span>
                                </div>
                            </div>
                            @endif

                            <div class="row form-group">
                                <div class="col-md-12 input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" id="btnGroupAddon1"><i class="fa fa-key fa-fw"></i></div>
                                    </div>
                                    <input placeholder="密码" autocomplete="off" type="password" aria-describedby="btnGroupAddon1" id="password" class="form-control" name="password" value="{{ $password or '' }}" required>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="text-danger"><strong>{{ $errors->first('password') }}</strong></span>
                                </div>
                            </div>
                            @endif

                            <div class="row form-group">
                                <div class="col-md-12 input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" id="btnGroupAddon2"><i class="fa fa-key fa-fw"></i></div>
                                    </div>
                                    <input placeholder="确认密码" autocomplete="off" type="password" aria-describedby="btnGroupAddon2" id="password-confirm" class="form-control" name="password-confirm" value="{{ $password or '' }}" required>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="text-danger"><strong>{{ $errors->first('password') }}</strong></span>
                                </div>
                            </div>
                            @endif

                            <div class="row form-group mb-3">
                                <div class="col-md-12 input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" id="btnGroupAddon3"><i class="fa fa-user-circle-o fa-fw"></i></div>
                                    </div>
                                    <select name="role" class="custom-select">
                                        <option value="user" {{ old('role')=='user'?'selected':'' }}>我要注册为客户</option>
                                        <option value="agent" {{ old('role')=='agent'?'selected':'' }}>我要注册为中介工作人员</option>
                                        <option value="agency" {{ old('role')=='agency'?'selected':'' }}>我要注册中介机构</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        注 册
                                    </button>
                                </div>
                            </div>
                        </form>
        </div>
    </div>
</div>
@endsection

@section('bottom')
@include('layouts.baseframebrandbottom')
@endsection