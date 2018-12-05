<?php $__env->startSection('top_title'); ?>
<a class="navbar-brand" href="<?php echo e(route('agentHome')); ?>"><i class="fa fa-chevron-left"></i></a><span class="text-white">修改密码</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<br>
<form id="changePassword">
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <?php echo e(csrf_field()); ?>

            <div class="row form-group">
                <div class="col-md-12 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-user-o fa-fw"></i></div>
                    </div>
                    <input type="tel" class="form-control" autocomplete="on" placeholder="手机号码" aria-label="请输入11位手机号" aria-describedby="btnGroupAddon" id="account_phone" class="form-control" name="account_phone" value="<?php echo e(isset($username) ? $username : old('account_phone')); ?>" required autofocus>
                </div>
            </div>
            <?php if($errors->has('account_phone')): ?>
            <div class="row">
                <div class="col-md-12">
                    <span class="text-danger"><strong><?php echo e($errors->first('account_phone')); ?></strong></span>
                </div>
            </div>
            <?php endif; ?>


            <div class="row form-group">
                <div class="col-md-12 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text" id="btnGroupAddon1"><i class="fa fa-unlock-alt fa-fw"></i></div>
                    </div>
                    <input placeholder="旧密码" autocomplete="off" type="password" aria-describedby="btnGroupAddon1" id="password" class="form-control" name="password" value="<?php echo e(isset($password) ? $password : ''); ?>" required>
                </div>
            </div>
            <?php if($errors->has('password')): ?>
            <div class="row">
                <div class="col-md-12">
                    <span class="text-danger"><strong><?php echo e($errors->first('password')); ?></strong></span>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="row form-group">
                <div class="col-md-12 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text" id="btnGroupAddon2"><i class="fa fa-key fa-fw"></i></div>
                    </div>
                    <input placeholder="新密码" autocomplete="off" type="password" aria-describedby="btnGroupAddon2" id="newpassword" class="form-control" name="newpassword" required>
                </div>
            </div>
            
            <div class="row form-group">
                <div class="col-md-12 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text" id="btnGroupAddon3"><i class="fa fa-keyboard-o fa-fw"></i></div>
                    </div>
                    <input placeholder="重输新密码" autocomplete="off" type="password" aria-describedby="btnGroupAddon3" id="retypepassword" class="form-control" name="retypepassword" required>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- modal开始 -->
<div class="modal fade" tabindex="-1" id="tips" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">提示</h5>
      </div>
      <div class="modal-body text-center" id="modal-body">
          <h6><span id="tiptext"></span><br><br></h6>
      </div>
      
    </div>
  </div>
</div>
<!-- modal结束 -->
<!-- 底部按钮开始 -->
<nav class="navbar fixed-bottom p-0">
    <table class="bg-white w-100">
        <tr style="border-spacing:0;margin: 0px;padding: 0px;">
            <td class="pl-0"><button id="reset" type="reset" class="btn btn-primary btn-block rounded-0">重 填</button></td>
            <td class="pl-0"><button id="submit" type="button" class="btn btn-primary btn-block rounded-0">修 改</button></td>
        </tr>
    </table>
</nav>
<!-- 底部按钮结束 -->
</form>
<script type="text/javascript">
    $(function () {
        $('#submit').click(function () {
            var allfilled=true;
            $("input").each(function() {
                if($(this).val()=="") {
                    alert('请填写'+$(this).attr('placeholder'));
                    $(this).focus();
                    allfilled=false;
                    return false;
                }
            });
            if (allfilled) {
                $.post("<?php echo e($_SERVER['REQUEST_URI']); ?>",$("#changePassword").serialize(),function(result){
                    if(result==1){
                        $('#tiptext').html('密码修改成功~')
                    }
                    else{
                        $('#tiptext').html('密码修改失败~')
                    }
                    $('#tips').modal('show')
                })
            }
        });
    });
    
    $('#tips').on('shown.bs.modal', function (event) {
         var timeout=setTimeout(function () {
              $('#tips').fadeOut()
              $('#tips').modal('hide')
          }, 2000);
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.baseframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>