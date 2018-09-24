<?php $__env->startSection('top_title'); ?>
<a class="navbar-brand" href="<?php echo e(route('agentHome')); ?>#xiaoxi"><i class="fa fa-chevron-left"></i></a><span class="text-white"><span class="badge badge-danger"><?php echo e($new_count.'/'.$count); ?></span> 来自客户的消息</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">
    a{color: #3982ba;"}
</style>          
<form id="myform">
    <?php echo csrf_field(); ?>
<div class="container">
    <div class="row">
        <table class="table table-striped w-100">
            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td align="center">
                        <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="customCheck<?php echo e($message->message_id); ?>">
                              <label class="custom-control-label" for="customCheck<?php echo e($message->message_id); ?>">&nbsp;</label>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo e($message->subject); ?>" value="<?php echo e(route('userDetail', ['id' => $message->user_id])); ?>"><?php echo e($message->real_name); ?></button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo e($message->subject); ?>" value="<?php echo e(route('messageDetail', ['id' => $message->message_id])); ?>"><?php echo e($message->subject==""?$message->message_type:''); ?></button>
                    </td>
                    <td align="right">
                    <?php if($message->readed==1): ?>
                        <i class="fa fa-envelope-open text-primary"></i> 
                    <?php else: ?>
                        <i class="fa fa-envelope text-primary"></i>
                    <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <td class="pl-0"><button id="shanchu" type="submit" class="btn btn-primary btn-block rounded-0">删 除</button></td>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.baseframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>