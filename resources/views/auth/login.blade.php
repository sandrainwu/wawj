@extends('layouts.userhome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <div class="input-group col-md-8">
                                <span class="input-group-btn"><button class="btn" style="background-color: transparent;width: 40px" type="button"><i class="icon-user"></i></button></span>
                                <input placeholder="手机号码" type="tel" id="account_phone" aria-describedby="basic-addon1" class="form-control{{ $errors->has('account_phone') ? ' is-invalid' : '' }}" name="account_phone" value="{{ old('account_phone') }}" required autofocus>
                                @if ($errors->has('account_phone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('account_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="input-group col-md-8">
                                <span class="input-group-btn"><button class="btn" style="background-color: transparent;width: 40px" type="button"><i class="icon-lock"></i></button></span>
                                <input placeholder="密码" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="input-group col-md-8">
                                <span class="input-group-btn"><button class="btn" style="background-color: transparent;width: 40px" type="button"></button></span>
                                    <select id="role" name="role" class="form-control">
                                    <option value="user">买房卖房</option>
                                    <option value="agent">中介职员</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-8 text-center">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-8 text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-flag"></i> 登 录
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    忘记密码
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
