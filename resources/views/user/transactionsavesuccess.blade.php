@extends('layouts.baseframe')

@section('top_title')
<a class="navbar-brand" href="{{ route('userHome') }}"><i class="fa fa-chevron-left"></i></a><span class="text-white">我要买房</span>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Login</div>

                <div class="card-body">
                    
                        <div class="form-group row justify-content-center">
                            <div class="input-group col-md-8">
                                <label>信息发布成功！</label>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
