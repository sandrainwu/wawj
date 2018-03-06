@extends('layouts.userhome')

@section('content')
<script src="{{ asset('js/getcity.js') }}"></script>


<form action="{{ route('saleHouseSave') }}" method="post">
<input type="hidden" name="user_id" value="{{  Auth::id() }}">
@CSRF
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">我要卖房</div>



                <div class="card-body justify-content-center text-center">
                   
                    <div class="row justify-content-center">
                        <div class="input-group col-md-8">
                            
                            @foreach($list as $t)
                                 <div>{{ $t->community }}</div>
                                 <div>{{ $t->house_type }}</div>
                                 <div>{{ $t->area }}</div>
                                 <div>{{ $t->certificate_number }}</div>
                                 <div>{{ $t->feature }}</div>
                                 <div>{{ $t->created_at }}</div>
                            @endforeach
                            
                        </div>

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
