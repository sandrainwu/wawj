@extends('layouts.baseframe')

@section('top_title')
<a class="navbar-brand" href="{{ $backto or route('userHome') }}"><i class="fa fa-chevron-left"></i></a><span class="text-white">我要聘请代理人</span>
@endsection

@section('content')
<br>
    <input type="hidden" name="transaction" value="rent">
    <input type="hidden" name="counter" value="" id="counter">
    <input type="hidden" name="bind_agent" value="" id="bind_agent">
    <input type="hidden" name="bind_transaction" value="" id="bind_transaction">
    {!! isset($post_id) ? '<input type="hidden" name="post_id" value="'.$post_id.'">' : '' !!}
    @CSRF
<div class="tab-content" id="pills-tabContent">
    <!-- 第1个tab -->
    
    <div class="container tab-pane show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

        <div class="row">
            <div class="col-md-6 offset-md-3">

                <div class="row">
                     
                    <div class="col-md-12 input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">搜索</span>
                        </div>
                        <input placeholder="代理机构或代理人" type="text" class="form-control" id="searchinput" name="search" required autofocus aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <button style="line-height: 1.5" class="btn btn-outline-secondary" type="button" id="search_agent_btn"><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                </div>
                
                <div class="row">
                    <table class="table table-striped">
                        <thead><tr><td></td><td></td><td></td></tr></thead>
                        <tbody id="search_agent_result">
                            
                        </tbody>
                    </table>

                </div>
                <br><br>
            </div>
        </div>
    </div>
    <!-- 第1个tab -->

    <!-- 第2个tab -->
    <div class="container tab-pane show" id="pills-profile" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <div class="row">
                    <div class="col-md-12 input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">搜索</span>
                        </div>
                        <input placeholder="本人发布的房产信息(可多选)" type="text" class="form-control" id="searchinput1" name="search" required autofocus aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <button style="line-height: 1.5" class="btn btn-secondary" type="button" id="search_info_btn">&nbsp;&nbsp;<i class="fa fa-search"></i>&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">或者</span>
                        </div>
                        <select id="choice_theway" class="custom-select">
                            <option value="all" selected>代理我的所有业务(先前及今后)</option>
                            <option value="before">代理先前我所有业务(不含今后)</option>
                            <option value="after">代理我今后所有业务(不含先前)</option>
                        </select>
                        <div class="input-group-append">
                            <button style="line-height: 1.5" class="btn btn-secondary" type="button" id="choice_theway_btn">选定</button>
                        </div>
                    </div>
                </div>
                

                <div class="row">
                    <table class="table table-striped">
                        <thead><tr><td></td><td></td><td></td></tr></thead>
                        <tbody id="search_info_result">
                            
                        </tbody>
                    </table>

                </div>
                <br><br>    
            </div>
        </div>
    </div>
    <!-- 第2个tab -->



    <!-- 第3个tab -->
    <div class="container tab-pane show" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <div class="row">
                    <div class="col-md-12 input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">已选定的代理</span>
                        </div>
                        <span class="form-control" id="selected_agent" aria-describedby="basic-addon1">代理机构或代理人</span>
                        <div class="input-group-append">
                            <button style="line-height: 1.5" class="btn btn-secondary" type="button" id="reselect_agent_btn">重选</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">已选定的业务</span>
                        </div>
                        <span class="form-control" id="selected_info">一项或一批业务</span>
                        <div class="input-group-append">
                            <button style="line-height: 1.5" class="btn btn-secondary" type="button" id="reselect_info_btn">重选</button>
                        </div>
                    </div>
                </div>
                
<hr>
                <div class="row">
                    <div class="col-md-12">
                    <button class="btn btn-primary btn-block" id="bind">聘请代理人绑定(代理)业务</button>
                </div>

            </div>
        </div>
    </div>
    <!-- 第3个tab -->

</div>


<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">关 闭</button>
      </div>
    </div>
  </div>
</div>

<!-- modal -->

<script type="text/javascript">
    $(function () {
        var no_result="<tr><td colspan='3' align='center'><span class='badge badge-success'>没有找到结果</span></td></tr>";
        $("#search_agent_btn").click(function () {
            $('#bind_agent').val("");
            $("#search_agent_result").html("");
            $("#counter").val("");
            var a='<tr><td width="50px" align="center"><i class="fa text-secondary fa-';
            var b='"></i></td><td align="left"><button type="button" class="btn btn-secondary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal" data-whatever="';
            var c=' <span class="badge badge-light">';
            var d='</span></button></td><td align="center"><button type="button" class="btn btn-secondary btn-sm" value="';
            var e='" id="choice_agent">选定</button></td></tr>';
                $.get("{{ route('searchAgency') }}",{search:$('#searchinput').val()},function(result){
                    var noreturn = true;
                    for(var i=0;i<result.length;i++){
                        $("#search_agent_result").append(a+'group'+b+result[i]['agency_name']+'" value="{{ route('agencyDetail') }}'+'/'+result[i]['id']+'">'+result[i]['agency_name']+c+result[i]['phone']+d+'agency-'+result[i]['id']+e);
                        noreturn = false;
                    }
                    if (noreturn)
                        $("#counter").val($("#counter").val()+"A");
                    if ($("#counter").val()=="AA")
                        $("#search_agent_result").html(no_result);
                });
                $.get("{{ route('searchAgent') }}",{search:$('#searchinput').val()},function(result){
                    var noreturn = true;
                    for(var i=0;i<result.length;i++){
                        $("#search_agent_result").append(a+'user'+b+result[i]['real_name']+'" value="{{ route('agentDetail') }}'+'/'+result[i]['id']+'">'+result[i]['real_name']+c+result[i]['account_phone']+d+'agent-'+result[i]['id']+e);
                        noreturn = false;
                    }
                    if (noreturn)
                        $("#counter").val($("#counter").val()+"A");
                    if ($("#counter").val()=="AA")
                         $("#search_agent_result").html(no_result);
                });

        });
        
        $(document).on('click','#choice_agent',function(){
            var obj = $(this);
            if (obj.val() != $('#bind_agent').val() && $('#bind_agent').val() !=""){
                    b=$("button[value='"+$('#bind_agent').val()+"']");
                    b.parent().parent().find("button").removeClass("btn-success");
                    b.parent().parent().find("button").addClass("btn-secondary");
            }
            $('#bind_agent').val(obj.val());
            obj.parent().parent().find("button").removeClass("btn-secondary");
            obj.parent().parent().find("button").addClass("btn-success");
            return false;
        });

        $(document).on('click','#choice_transaction',function(){
            var obj = $(this);
            if ($('#bind_transaction').val().indexOf(obj.val())==-1){
                $('#bind_transaction').val($('#bind_transaction').val()+obj.val());
                obj.parent().parent().find("button").removeClass("btn-secondary");
                obj.parent().parent().find("button").addClass("btn-success");
            }
            else{
                $('#bind_transaction').val($('#bind_transaction').val().replace(obj.val(),''));
                obj.parent().parent().find("button").removeClass("btn-success");
                obj.parent().parent().find("button").addClass("btn-secondary");   

            }
            return false;
        });

        $("#reselect_agent_btn").click(function () {
            $("#pills-home-tab").click();
        });
        
        $("#reselect_info_btn").click(function () {
            $("#pills-profile-tab").click();
        });
        
         $("#pills-contact-tab").click(function () {
            var s1='<span class="badge badge-success">';
            var s2='</span> ';
            var a=$('#bind_transaction').val();
                
            if($('#bind_agent').val()==""){
                $('#selected_agent').html("代理机构或代理人");
            }
            else{
                $('#selected_agent').html(s1+$("button[value='"+$('#bind_agent').val()+"']").parent().parent().find('button').first().html()+s2);
            }
            
            if(a==""){
                $('#selected_info').html("一项或一批业务");
            }
            else{
                if(a=='all' || a=='before' || a=='after')
                    $('#selected_info').html(s1+$("#choice_theway").find("option[value='"+a+"']").text());
                else {
                    arr = a.split("||");
                    $("#selected_info").html("");
                    for (x in arr){
                        t=arr[x];
                        if(t.substring(0,1)!='|')
                            t='|'+t;
                        if(t.substring(t.length-1,t.length)!='|')
                            t=t+'|';
                    $("#selected_info").append(s1+$("button[value='"+t+"']").parent().parent().find('button').first().text()+s2);
                    }
                }
            }
        });

        $("#choice_theway_btn").click(function () {
            var obj = $(this);
            $("#search_info_result").html("");
            if(obj.attr('class').indexOf("btn-success")>=0){
                    obj.removeClass("btn-success");
                    obj.addClass("btn-secondary");
                    $('#bind_transaction').val("");
            }
            else{
                    obj.removeClass("btn-secondary");
                    obj.addClass("btn-success");
                    $('#bind_transaction').val($('#choice_theway').val());
            }
        });
        
        $("#choice_theway").change(function(){
            if($('#choice_theway_btn').attr('class').indexOf("btn-success")>=0){
                $('#bind_transaction').val($(this).val());
            };
        });
        
        $("#bind").click(function(){
            var a=$('#selected_agent').html().trim();
            var b=$('#selected_info').html().trim();
            if(a=="代理机构或代理人" || a==""){
                alert("请选择代理人")
            }
            else if(b=="一项或一批业务" || b==""){
                alert("请选择业务")
            }
            else {
                $.get("{{ route('bindAgentTransaction') }}",{bind_agent:$('#bind_agent').val(),bind_transaction:$('#bind_transaction').val()},function(result){
                    if(result=='true'){
                        alert("业务代理申请已经发送给代理人，请耐心等待对方回复")
                    }
                
                });
            }
        });

        $("#search_info_btn").click(function () {
            if($('#choice_theway_btn').attr('class').indexOf("btn-success")>=0){
                $('#choice_theway_btn').removeClass("btn-success");
                $('#choice_theway_btn').addClass("btn-secondary");
            }
            
            $('#bind_transaction').val("");
            $("#search_info_result").html("");

                $.get("{{ route('searchPost') }}",{search:$('#searchinput1').val()},function(result){
                    var noreturn = true;
                    for(var i=0;i<result.length;i++){
                        var a='';
                        switch(result[i]['transaction']){
                            case ('buy'):
                                a='<span class="badge badge-danger">买房</span>';
                                break;
                            case ('sale'):
                                a='<span class="badge badge-success">卖房</span>';
                                break;
                            case ('let'):
                                a='<span class="badge badge-success">出租</span>';
                                break;
                            case ('rent'):
                                a='<span class="badge badge-danger">求租</span>';
                                break;
                            }
                        $("#search_info_result").append('<tr><td>'+a+'</td><td><button type="button" class="btn btn-secondary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal" data-whatever="'+result[i]['community']+'" value="{{ route('transactionDetail') }}'+'/'+result[i]['id']+'">'+result[i]['community']+'</button></td><td align="center"><button type="button" class="btn btn-secondary btn-sm" value="|'+result[i]['id']+'|" id="choice_transaction">选定</button></td></tr>');
                        noreturn = false;
                    }
                    if (noreturn)
                        $("#search_info_result").html(no_result);
                });

        });
        
    });

    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      $("#modal-body").html("<p class='text-center'>数据读取中...</>");
      if(button.val().indexOf("agency") != -1){
          $.get(button.val(),function(result){
              $("#modal-body").text(result['introduction']);
              $("#modal-body").append('<small><hr>地址:'+result['address']+' 电话:'+result['phone']+'</small>');
          });
      }
      else if(button.val().indexOf("agent") != -1){
          $.get(button.val(),function(result){
              $("#modal-body").text(result['introduction']);
              $("#modal-body").append('<small><hr>电话:'+result['account_phone']+'</small>');
          });
      }
      else if(button.val().indexOf("transaction") != -1){
          $.get(button.val(),function(result){
              $("#modal-body").text("");
              $("#modal-body").append('<div>面积: '+result['area']+'</div><div>价格: '+result['price']+'</div><div>特点: '+result['feature']+'</div>');
          }); 
      }
      var recipient = button.data('whatever');
      var modal = $(this);
      modal.find('.modal-title').text(recipient);
    });

</script>
@endsection

@section('bottom')

<!-- 底部固定栏 -->
    <nav class="navbar-toggle fixed-bottom">
      <ul class="nav nav-justified">
        <li class="nav-item"><a class="btn btn-primary btn-block rounded-0 active border-right" id="pills-home-tab" data-toggle="pill" href="#pills-home">选择代理</a></li>
        <li class="nav-item"><a class="btn btn-primary btn-block rounded-0 border-right" id="pills-profile-tab" data-toggle="pill" href="#pills-profile">选择业务</a></li>
        <li class="nav-item"><a class="btn btn-primary btn-block rounded-0 border-right" id="pills-contact-tab" data-toggle="pill" href="#pills-contact">聘请绑定</a></li>
      </ul>
    </nav>
<!-- 底部固定栏 -->
@endsection