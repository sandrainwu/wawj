@extends('layouts.baseframe')

@section('top_title')
<a class="navbar-brand" href="{{ route('/') }}"><img alt="Brand" src="{{ asset('img/wawj.svg') }}" width="30" height="30" class="d-inline-block align-top"> 我爱我家</a><span class="text-white">系统管理员</span>
@endsection

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
                        <form id="login_form" method="POST" action="{{ route('login') }}">
                            <input name="role" value="admin" type="hidden">
                            {{ csrf_field() }}
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
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        登 录
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