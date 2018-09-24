<?php $__env->startSection('top_title'); ?>
<a class="navbar-brand" href="<?php echo e(route('/')); ?>"><img alt="Brand" src="<?php echo e(asset('img/wawj.svg')); ?>" width="30" height="30" class="d-inline-block align-top"> 我爱我家</a><span class="text-white">登录</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
                        <form id="login_form" method="POST" action="<?php echo e(route('login')); ?>">
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
                                        <div class="input-group-text" id="btnGroupAddon1"><i class="fa fa-key fa-fw"></i></div>
                                    </div>
                                    <input placeholder="密码" autocomplete="off" type="password" aria-describedby="btnGroupAddon1" id="password" class="form-control" name="password" value="<?php echo e(isset($password) ? $password : ''); ?>" required>
                                </div>
                            </div>
                            <?php if($errors->has('password')): ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="text-danger"><strong><?php echo e($errors->first('password')); ?></strong></span>
                                </div>
                            </div>
                            <?php endif; ?>


                            <div class="row form-group mb-3">
                                
                                <div class="col-md-12 input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-user-circle-o fa-fw"></i></div>
                                    </div>
                                    <select name="role" class="custom-select">
                                        <option value="user" 
                                        <?php if(isset($role)): ?>
                                            <?php echo e($role=="user"?'selected':''); ?>

                                        <?php else: ?>
                                            <?php echo e(old('role')=='user'?'selected':''); ?> 
                                        <?php endif; ?>
                                        >我是客户</option><option value="agent"
                                        <?php if(isset($role)): ?>
                                            <?php echo e($role=="agent"?'selected':''); ?>

                                        <?php else: ?>
                                            <?php echo e(old('role')=='agent'?'selected':''); ?> 
                                        <?php endif; ?>
                                         >我是工作人员</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="custom-control custom-checkbox">
                                        <input name="remember" type="checkbox" class="custom-control-input" 
                                        <?php if(isset($remember)): ?>
                                            <?php echo e($remember=='on' ? 'checked':''); ?>

                                        <?php elseif($errors->any()): ?>
                                               <?php echo e(old('remember')); ?>

                                        <?php else: ?> 
                                            checked 
                                        <?php endif; ?>
                                          id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1" id="rememberme">记住我</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        登 录
                                    </button>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 text-center">
                                   <a href="<?php echo e(route('register')); ?> " style="color: #3982ba">注册账户</a>&emsp;|&emsp;<a href="<?php echo e(route('password.request')); ?> " style="color: #3982ba">忘记密码</a>
                                </div>
                            </div>
                        </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom'); ?>
<?php echo $__env->make('layouts.baseframebrandbottom', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.baseframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>