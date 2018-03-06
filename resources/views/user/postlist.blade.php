@extends('layouts.userhome')

@section('content')
<script src="{{ asset('js/getcity.js') }}"></script>


<form action="{{ route('saleHouseSave') }}" method="post">
<input type="hidden" name="user_id" value="{{  Auth::id() }}">
@CSRF
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">我的发布 (<span class="text-warning">{{ $count }}</span>)</div>



                <div class="card-body justify-content-center text-center">
                   
                    <div class="row justify-content-center">
                         @foreach($list as $t)
                            <div class="input-group col-md-12">
                                <div class="row col-md-3"><a href="{{ route('saleHouseEdit', ['id' => $t->id]) }}"> {{ $t->community }}</a></div>
                                <div class="row col-md-3">{{ $t->area }}平米</div>
                                <div class="row col-md-3">{{ $t->price }}万元</div>
                                <div class="row col-md-3">于{{ $t->created_at }}</div>
                            </div>
                        @endforeach
                            
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">提交</button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-primary">重写</button>
                        </div>
                         
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

</form>
@endsection
