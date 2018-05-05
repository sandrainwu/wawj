@extends('layouts.index')

@section('content')

<br><br><br>   
<div class="mui-content" style="text-align:center">
    <form method="POST" action="{{ route('login') }}">
    @csrf
        <div class="mui-row">
            <div class="mui-col-sm-1 mui-col-xs-1">
            </div>
            <div class="mui-col-sm-10 mui-col-xs-10">
                <input placeholder="手机号码" tabindex="1" type="tel" id="account_phone" aria-describedby="basic-addon1" class="form-control{{ $errors->has('account_phone') ? ' is-invalid' : '' }}" name="account_phone" value="{{ old('account_phone') }}" required autofocus>
                @if ($errors->has('account_phone'))
                    <span class="invalid-feedback">
                    <strong>{{ $errors->first('account_phone') }}</strong>
                    </span>
                @endif
            </div>
            <div class="mui-col-sm-1 mui-col-xs-1">
            </div>
            
        </div>

        <div class="mui-row">
            <div class="mui-col-sm-1 mui-col-xs-1">
            </div>
            <div class="mui-col-sm-10 mui-col-xs-10">
                <div class="mui-input-row mui-password">
                    <input placeholder="密码" tabindex="2" id="password" type="password" class="mui-input-password{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="mui-col-sm-1 mui-col-xs-1">
            </div>
        </div>

        <div class="mui-row">
            <div class="mui-col-sm-1 mui-col-xs-1">
            </div>
            <div class="mui-col-sm-10 mui-col-xs-10">
                <div class="mui-input-row mui-radio">
                    <label>客户方</label>
                    <input name="role" type="radio" value="user" checked tabindex="3">
                </div>
                <div class="mui-input-row mui-radio">
                    <label>服务方</label>
                    <input name="role" type="radio" value="agent" tabindex="4">
                </div>
            </div>
            <div class="mui-col-sm-1 mui-col-xs-1">
            </div>
        </div>

        
        <div class="mui-row">
            <div class="mui-col-sm-1 mui-col-xs-1">
            </div>
            
            <div class="mui-col-sm-10 mui-col-xs-10">
                <div class="mui-input-row mui-checkbox">
                    <label>记住账户</label>
                    <input type="checkbox" name="remember"  {{ old('remember') ? 'checked' : '' }} tabindex="5">
                </div>
            </div>
            <div class="mui-col-sm-1 mui-col-xs-1">
            </div>
        </div>
        
        <div class="mui-row">
            <div class="mui-col-sm-1 mui-col-xs-1">
            </div>
            <div class="mui-col-sm-10 mui-col-xs-10">
                <button type="submit" class="mui-btn mui-btn-primary" tabindex="6" style="width: 100%">登 录</button>
            </div>
            <div class="mui-col-sm-1 mui-col-xs-1">
            </div>
        </div>

        <div class="mui-row">
            <div class="mui-col-sm-1 mui-col-xs-1">
            </div>
            <div class="mui-col-sm-10 mui-col-xs-10">
                <br><a href="{{ route('register') }} " style="color: #3982ba" tabindex="7">注册账户</a> | <a href="{{ route('password.request') }} " style="color: #3982ba" tabindex="8">忘记密码</a>
            </div>
            <div class="mui-col-sm-1 mui-col-xs-1">
            </div>
        </div>

    </form>    
</div>
<br><br><br><br><br><br>
@endsection
