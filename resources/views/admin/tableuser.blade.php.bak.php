@extends('layouts.simplebaseframe')

@section('top')
<div class="text-secondary strong">WAWJ.COM <i class="fa fa-angle-right"></i> 数据表 <i class="fa fa-angle-right"></i> {{ $tablealias }}</div>
@endsection 

@section('content')
<style type="text/css">
    a{color: #3982ba;"}
</style>          
<form id="myform">
    @CSRF
<div class="container-fluid mt-2">
    <div class="row">
      <div class="col">
          <div>
              <button id="checkall" type="button" class="btn btn-info btn-xsm"><i class="fa fa-check-square"></i> 全选</button> <button id="shanchu" type="button" class="btn btn-info btn-xsm"><i class="fa fa-trash"></i> 删除</button> <button id="insert" type="button" class="btn btn-info btn-xsm"><i class="fa fa-file-o"></i> 新增</button> 
          </div>
      </div>
      <div class="col">
          <div class="input-group input-group-sm">
            <select class="custom-select" name="searchfield" id="searchfield" style="width:40px;padding: 0.3rem;font-size: 0.6rem; line-height: 1.5;height:1.92rem">
              <option value="" selected>选择搜索字段</option>
              <option value="id">ID</option>
              <option value="account_phone">账户</option>
              <option value="real_name">姓名</option>
              <option value="sex">性别</option>
              <option value="email">邮箱</option>
              <option value="id_number">身份证</option>
              <option value="active">账户状态</option>
            </select>
            <input type="text" class="form-control" name='searchkeyword' id="searchkeyword">
            <div class="input-group-append">
              <button id="search" type="button" class="btn btn-info btn-xsm"><i class="fa fa-search"></i> 搜索</button>
            </div>
          </div>
      </div>

      <div class="col">
        <ul class="pagination pagination-sm samll float-right" style="margin-bottom: 0.5rem;">
          <li class="page-item"><a class="page-link" href="#"><i class="fa fa-chevron-left"></i></a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">4</a></li>
          <li class="page-item"><a class="page-link" href="#">5</a></li>
          <li class="page-item"><a class="page-link" href="#">6</a></li>
          <li class="page-item"><a class="page-link" href="#"><i class="fa fa-chevron-right"></i></a></li>
        </ul>
      </div>
      
    </div>    

    <div class="row">
      <div class="col-md-12">
          <table class="table small table-sm w-100">
                <tr align="center">
                  <td>选择</td><td>ID</td><td>账户</td><td>姓名</td><td>性别</td><td>邮箱</td><td>身份证</td><td>身份照片</td><td>账户状态</td><td>密码</td><td>建立时间</td><td>更新时间</td><td>操作</td>
                </tr>
            @forelse($list as $user)
                <tr align="center">
                    <td>
                        <input type="checkbox" name="del">
                    </td>
                    <td>
                        {{ $user->id }}
                    </td>
                    <td>
                        {{ $user->account_phone }}
                    </td>
                    <td>
                        {{ $user->real_name }}
                    </td>
                    <td>
                        {{ $user->sex }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ $user->id_number }}
                    </td>
                    <td>
                        {{ $user->id_picture }}
                    </td>
                    <td>
                        {{ $user->active }}
                    </td>
                    <td>
                        *****
                    </td>
                    <td>
                        {{ date("Y-m-d H:i",strtotime($user->created_at)) }}
                    </td>
                    <td>
                        {{ date("Y-m-d H:i",strtotime($user->updated_at)) }}
                    </td>
                    <td><a href="" title="编辑"><i class="fa fa-edit fa-fw fa-lg"></i></a><a href=""  title="删除"><i class="fa fa-trash-o fa-fw fa-lg"></i></a>
                    </td>
                </tr>
            @empty
              <tr><td colspan="13" align="center"><br><br><h5 class="text-danger">没有搜索结果</h5></td></tr>
            @endforelse
        </table>
      </div>
    </div>
</div>
</form>
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
        <span id="actions"></span> <button type="button" class="btn btn-secondary" data-dismiss="modal">关 闭</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="tips" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">提示</h5>
      </div>
      <div class="modal-body text-center" id="modal-body">
          <h6>你的回复已经成功发送~<br><br></h6>
      </div>
      
    </div>
  </div>
</div>
<!-- modal -->

<script type="text/javascript">
    var target=null;
    $(function () {
        $("#checkall").click(function () {
            if (target==true){
                target=null;
                $("table input[type='checkbox']").prop("checked",target);
                $('#checkall').html("<i class='fa fa-check-square'></i> 全选");
            }
            else{
                target=true;
                $("table input[type='checkbox']").prop("checked",target);
                $('#checkall').html("<i class='fa fa-square'></i> 不选");
            }
        });
        $('#shanchu').click(function () {
            if($("input:checkbox[name='tobedeleted[]']:checked").length>0){
                $.post("{{ $_SERVER['REQUEST_URI'] }}",$("#myform").serialize(),function(result){
                    for(var i=0;i<result.length;i++){
                        $("#row_"+result[i]).remove();
                    }
                });
            }
            else
                alert('请选择需要删除的信息');
        });
        
        $('#search').click(function () {
                $("#myform").attr("method","GET")
                $("#myform").submit()
          });

        $("#modal-body").on("click","a",function(event){
            $(this).popover({trigger:'focus'});
            $(this).popover('toggle');
      　　});

        $('#actions').on("click",".btn",function(event){
            $("#exampleModal").modal('hide')
            $.post($("[data-dismiss='modal']").val(),{_method:"put",_token:$("input[name='_token']").val(),ps:$("#ps").val(),role:'agent',action:$(this).val()},function(result){
                if(result=='true'){
                    $("[value='"+$("[data-dismiss='modal']").val()+"']").parent().parent('tr').find('i').before('<i class="fa fa-reply  text-primary fa-flip-horizontal"></i> ')
                    $('#tips').modal('show')
                }
            });
        });
    });

    $('#tips').on('shown.bs.modal', function (event) {
         var timeout=setTimeout(function () {
              $('#tips').fadeOut()
              $('#tips').modal('hide')
          }, 2000);
    })

    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      $("[data-dismiss='modal']").val(button.val())
      $("#modal-body").html("<p class='text-center'>数据读取中...</>");
      $.get(button.val(),{'role':'agent'},function(result){
          btn=""
          btn1='<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" class="btn btn-sm btn-info btn-yewu" title="'
          if(result['message_type']=='请求代理业务'){
              $("#modal-body").html('');
              t=result['appendix']
              if(t.indexOf("all") != -1 ){
                btn=btn1+'所有业务" data-content="包括用户现已发布业务，同时包括其今后的业务">所有业务</a>'
              }
              else if(t.indexOf("before") != -1 ){
                btn=btn1+'当前业务" data-content="用户当前已发布的所有业务，不包括其今后的业务">当前业务</a>'
              }
              else if(t.indexOf("after") != -1 ){
                btn=btn1+'今后业务" data-content="用户今后发布的所有业务，不包括其当前已发布的业务">今后业务</a>'
              }
              else{
                t=t.slice(1,-1)
                arr=t.split('||')
                for (i=0;i<arr.length ;i++ ){
                  btn=btn+btn1+result['message_type']+'" data-content="包括用户现已发布业务，同时包括其今后的业务">业务'+(i+1)+'</a> ';
              
                }
              }
              $("#modal-body").append(btn+'<br><br>'+result['real_name']+' 请求将以上业务交由我代理');
              $("#actions").html('留言:<input id="ps" type="text"> <button type="button" class="btn btn-primary" value="同意">同 意</button>&nbsp;&nbsp;<button type="button" class="btn btn-primary" value="拒绝">拒 绝</button>');
              $("#modal-body").append('<small><hr>'+result['real_name']+':'+result['email']+result['phone']+'</small>');
          }
      });
      var recipient = button.data('whatever');
      var modal = $(this);
      modal.find('.modal-title').text(recipient);
    })
</script>
@endsection