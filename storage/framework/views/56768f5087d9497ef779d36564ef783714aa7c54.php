<?php $__env->startSection('top_title'); ?>
<a class="navbar-brand" href="<?php echo e(route('userHome')); ?>"><i class="fa fa-chevron-left"></i></a><span class="text-white">我要买房</span>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Login</div>

                <div class="card-body">
                    
                        <div class="form-group row justify-content-center">
                            <div class="input-group col-md-8">
                                <label>信息发布成功！</label>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.baseframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>