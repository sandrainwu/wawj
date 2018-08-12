@extends('layouts.baseframe')

@section('top_title')
<a class="navbar-brand" href="{{ route('/') }}"><img alt="Brand" src="{{ asset('img/wawj.svg') }}" width="30" height="30" class="d-inline-block align-top"> 我爱我家</a><span class="text-white">登录</span>
@endsection

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="row form-group">
                                <div class="col-md-12 input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-user-o fa-fw"></i></div>
                                    </div>
                                    <input type="tel" class="form-control" placeholder="手机号码" aria-label="请输入11位手机号" aria-describedby="btnGroupAddon" id="account_phone" class="form-control" name="account_phone" value="{{ old('account_phone') }}" required autofocus>
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
                                    <input placeholder="密码" type="password" aria-describedby="btnGroupAddon1" id="password" class="form-control" name="password" required>
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
                                        <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-user-circle-o fa-fw"></i></div>
                                    </div>
                                    <select name="role" class="custom-select">
                                        <option value="user" selected>我是客户</option>
                                        <option value="agent">我是服务机构</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="custom-control custom-checkbox">
                                        <input name="remember" type="checkbox" class="custom-control-input" id="customCheck1" {{ old('remember') ? 'checked' : '' }} checked="checked">
                                        <label class="custom-control-label" for="customCheck1">记住我</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        登 录
                                    </button>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 text-center">
                                   <a href="{{ route('register') }} " style="color: #3982ba">注册账户</a>&emsp;|&emsp;<a href="{{ route('password.request') }} " style="color: #3982ba">忘记密码</a>
                                </div>
                            </div>
                        </form>
        </div>
    </div>
</div>
@endsection

@include('layouts.baseframebrandbottom')