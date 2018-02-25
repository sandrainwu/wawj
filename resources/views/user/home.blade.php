@extends('layouts.userhome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">用户登录界面</div>

                <div class="card-body">
                   
                    <div class="row text-center">
                        <div class="col-md-12">
                            <a href="{{ route('buyhouse') }}" class="btn btn-primary btn-lg" style="width: 100px"><i class="icon-home"></i> 买 房</a>
                        
                            <a href="{{ route('salehouse') }}" class="btn btn-primary btn-lg" style="width: 100px"><i class="icon-dollar"></i> 卖 房</a>
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
