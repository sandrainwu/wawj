<script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>


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
                    <td>
                        <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="customCheck<?php echo e($message->message_id); ?>">
                              <label class="custom-control-label" for="customCheck<?php echo e($message->message_id); ?>"></label>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo e($message->subject!=''?$message->subject:$message->message_type); ?>" value="<?php echo e(route('message', ['id' => $message->message_id])); ?>"><?php echo e($message->real_name); ?> <span class="badge badge-info"><?php echo e($message->message_type); ?></span></button>
                    </td>
                    <td>
                        <span class="badge badge-secondary"><?php echo e(date("Y-m-d H:i",strtotime($message->created_at))); ?></span>
                    </td>
                    <td align="right">
                    <?php if($message->replyed==1): ?>
                        <i class="fa fa-reply text-primary fa-flip-horizontal"></i>
                    <?php endif; ?>
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
<?php echo $__env->make('layouts.baseframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>