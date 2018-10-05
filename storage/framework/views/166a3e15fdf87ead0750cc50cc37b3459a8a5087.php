<?php $__env->startSection('top'); ?>
<div class="text-secondary h6">我爱我家 > 数据表 > <?php echo e($tablealias); ?></div>
<div class="row">
  <div class="col">
    <ul class="pagination pagination-sm">
      <li class="page-item"><a class="page-link" href="#">Prev</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">4</a></li>
      <li class="page-item"><a class="page-link" href="#">5</a></li>
      <li class="page-item"><a class="page-link" href="#">6</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
  </div>
  <div class="col">
    <button id="checkall" type="button" class="btn btn-info btn-sm">全 选</button> <button id="shanchu" type="submit" class="btn btn-info btn-sm">删 除</button>
  </div>
</div>
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('content'); ?>
<style type="text/css">
    a{color: #3982ba;"}
</style>          
<form id="myform">
    <?php echo csrf_field(); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <table class="table table-striped small w-100">
                <tr align="center">
                  <td>选择</td><td>ID</td><td>账户</td><td>姓名</td><td>性别</td><td>邮箱</td><td>身份证</td><td>身份照片</td><td>账户状态</td><td>密码</td><td>建立时间</td><td>更新时间</td><td>操作</td>
                </tr>
            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr align="center">
                    <td>
                        <input type="checkbox" name="del">
                    </td>
                    <td>
                        <?php echo e($user->id); ?>

                    </td>
                    <td>
                        <?php echo e($user->account_phone); ?>

                    </td>
                    <td>
                        <?php echo e($user->real_name); ?>

                    </td>
                    <td>
                        <?php echo e($user->sex); ?>

                    </td>
                    <td>
                        <?php echo e($user->email); ?>

                    </td>
                    <td>
                        <?php echo e($user->id_number); ?>

                    </td>
                    <td>
                        <?php echo e($user->id_picture); ?>

                    </td>
                    <td>
                        <?php echo e($user->active); ?>

                    </td>
                    <td>
                        **********
                    </td>
                    <td>
                        <?php echo e(date("Y-m-d H:i",strtotime($user->created_at))); ?>

                    </td>
                    <td>
                        <?php echo e(date("Y-m-d H:i",strtotime($user->updated_at))); ?>

                    </td>
                    <td>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                $('#checkall').text("全 选");
            }
            else{
                target=true;
                $("table input[type='checkbox']").prop("checked",target);
                $('#checkall').text("不 选");
            }
        });
        $('#shanchu').click(function () {
            if($("input:checkbox[name='tobedeleted[]']:checked").length>0){
                $.post("<?php echo e($_SERVER['REQUEST_URI']); ?>",$("#myform").serialize(),function(result){
                    for(var i=0;i<result.length;i++){
                        $("#row_"+result[i]).remove();
                    }
                });
            }
            else
                alert('请选择需要删除的信息');
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simplebaseframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>