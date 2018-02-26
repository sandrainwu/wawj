@extends('layouts.userhome')

@section('content')
<script src="{{ asset('js/getcity.js') }}"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">我要卖房</div>

                <div class="card-body">
                   
                    <div class="row">
                        <div class="input-group col-md-8">
                            <span class="input-group-btn"><button class="btn" style="background-color: transparent;width: 40px" type="button"><i class="icon-user"></i></button></span>
                            <input placeholder="小区名称" type="tel" id="account_phone" aria-describedby="basic-addon1" class="form-control{{ $errors->has('account_phone') ? ' is-invalid' : '' }}" name="account_phone" value="{{ old('account_phone') }}" required autofocus>
                            
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                           <button type="button" class="btn btn-default btn-lg">
  <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
</button>
                        </div>
                        <div class="col-md-4">
                            卖房
                        </div>
                        <div class="col-md-4">
                            浏览
                        </div>
                         
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
