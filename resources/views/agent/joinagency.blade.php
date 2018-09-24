@extends('layouts.baseframe')

@section('top_title')
<a class="navbar-brand" href="{{ route('agentHome') }}"><i class="fa fa-chevron-left"></i></a><span class="text-white">申请加盟中介机构</span>
@endsection

@section('content')
<form id="myform">
    @CSRF
<div class="container">
    <div class="row">
        
    <style type="text/css">
        a{color: #3982ba;"}
    </style>
        <table class="table table-striped w-100" id="table">
            @foreach($list as $agency)
            <tr id="row_{{ $agency->id }}">
                
                @if(strpos($belong_to_agency,('|'.$agency->id.'|')) !==false)
                    <td width="40px"></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal" data-whatever="{{ $agency->agency_name }}" value="{{ route('agencyDetail', ['id' => $agency->id]) }}">{{ $agency->agency_name }} <span class="badge badge-success">已加盟</span></button>
                    </td>
                    <td align="right"><button type='button' class='btn btn-primary btn-sm withdraw invisible'>撤回</button></td>
                @elseif(strpos($apply_to_agency,('|'.$agency->id.'|')) !==false)
                    <td width="40px"><input name="tobeselected[]" value="{{ $agency->id}}" type="checkbox"></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal" data-whatever="{{ $agency->agency_name }}" value="{{ route('agencyDetail', ['id' => $agency->id]) }}">{{ $agency->agency_name }} <span class="badge badge-danger">申请中</span></button>
                    <td align="right"><button type='button' class='btn btn-primary btn-sm withdraw'>撤回</button></td>
                @else
                    <td width="40px"><input name="tobeselected[]" value="{{ $agency->id}}" type="checkbox"></td>
                    <td>    
                        <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal" data-whatever="{{ $agency->agency_name }}" value="{{ route('agencyDetail', ['id' => $agency->id]) }}">{{ $agency->agency_name }} <span class="badge badge-success"></span></button>
                    </td>
                    <td align="right"><button type='button' class='btn btn-primary btn-sm withdraw invisible'>撤回</button></td>
                @endif

            </tr>
            @endforeach
        </table>
    </div>
</div>
</form>
<br>
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
<!-- 底部按钮 -->
<nav class="navbar fixed-bottom p-0">
    <table class="bg-white w-100">
        <tr style="border-spacing:0;margin: 0px;padding: 0px;">
            <td class="pl-0"><button id="checkall" type="button" class="btn btn-primary btn-block rounded-0">全 选</button></td>
            <td class="pl-0"><button id="jiameng" type="submit" class="btn btn-primary btn-block rounded-0">加盟</button></td>
        </tr>
    </table>
</nav>
<!-- 底部按钮 -->

<script type="text/javascript">
    var target=null;
    $(function () {
        $("#checkall").click(function () {
            if (target=="checked"){
                target=null;
                $("#table input[type='checkbox']").prop("checked",target);
                $('#checkall').text("全 选");
            }
            else{
                target="checked";
                $("#table input[type='checkbox']").prop("checked",target);
                $('#checkall').text("不 选");
            }
        });
        $('#jiameng').click(function () {
            if($("input:checkbox[name='tobeselected[]']:checked").length>0){
                $.post("{{ $_SERVER['REQUEST_URI'] }}",$("#myform").serialize(),function(result){
                    for(var i=0;i<result.length;i++){
                        $("#row_"+result[i]).find(".badge").removeClass("badge-success");
                        $("#row_"+result[i]).find(".badge").addClass("badge-danger");
                        $("#row_"+result[i]).find(".badge").text("申请中");
                        $("#row_"+result[i]).find(".withdraw").removeClass("invisible");
                        $("#row_"+result[i]).find("input").prop("checked",null);
                        $('#checkall').text("全 选");
                    }
                });
            }
            else
                alert('请选择申请加盟的机构');
        });
        
        $('.withdraw').click(function () {
            var agencyid = $(this).parent().parent().find('input').val();
            $.post("{{ $_SERVER['REQUEST_URI'] }}",{_method:"put",_token:$("input[name='_token']").val(),agencyid:agencyid},function(result){
                $("#row_"+result[0]).find(".badge").text("");
                $("#row_"+result[0]).find(".withdraw").addClass("invisible");
            });
        });

    });
    
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      $("#modal-body").html("<p class='text-center'>数据读取中...</>");
      $.get(button.val(),function(result){
          $("#modal-body").text(result['introduction']);
          $("#modal-body").append('<small><hr>地址:'+result['address']+' 电话:'+result['phone']+'</small>');
      });
      var recipient = button.data('whatever');
      var modal = $(this);
      modal.find('.modal-title').text(recipient);
    })
</script>
@endsection