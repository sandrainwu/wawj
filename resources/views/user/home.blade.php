@extends('layouts.userhome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">用户登录界面</div>

                <div class="card-body">
                   
                    <div class="form-group row text-center">
                        <div class="col-md-4 form-group">
                            <a href="{{ route('/') }}"><button type="button" class="btn btn-primary"><img src="img/zhua.png">买 房</button></a>
                        </div>

                        <div class="col-md-4">
                            <a href="{{ route('/') }}" class="btn btn-primary active" role="button">卖 房</a>
                        </div>

                        <div class="col-md-4">
                            <a href="{{ route('/') }}"><button type="button" class="btn btn-primary">挑 房</button></a>
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
