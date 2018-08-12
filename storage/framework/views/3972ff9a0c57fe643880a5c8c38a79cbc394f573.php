<?php $__env->startSection('top_title'); ?>
<a class="navbar-brand" href="<?php echo e(route('userHome')); ?>"><i class="fa fa-chevron-left"></i></a><span class="text-white">我的发布</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form id="myform" action="" method="post">
    <input type="hidden" name="user_id" value="<?php echo e(Auth::id()); ?>">
    <?php echo csrf_field(); ?>
<div class="container">
    <div class="row">
        <!-- <ul id="OA_task_1" class="mui-table-view">
                
            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="mui-table-view-cell">
                    <div class="mui-slider-right mui-disabled">
                        <a class="mui-btn mui-btn-red">删除</a>
                    </div>
                    <div class="mui-row mui-slider-handle">
                        <div class="mui-col-sm-1 mui-col-xs-1 mui-checkbox"><input name="tobedeleted[]" value="<?php echo e($t->id); ?>" type="checkbox" style="right:10px;top: 0px"></div>
                        <div class="mui-col-sm-5 mui-col-xs-5"><a href="<?php echo e(route('buyHouseEdit', ['id' => $t->id])); ?>" style="color: #3982ba;"><?php echo e($t->community); ?></a></div>
                        <div class="mui-col-sm-3 mui-col-xs-3" style="text-align: right"><?php echo e($t->price/10000); ?></div>
                        <div class="mui-col-sm-1 mui-col-xs-1" style="margin-bottom:1px"><h6>万元</h6></div>
                        <div class="mui-col-sm-2 mui-col-xs-2"><span class="mui-badge mui-badge-primary">买入</span></div>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
         -->
<style type="text/css">
    a{color: #3982ba;"}
</style>          
        <table class="table table-striped w-100" id="table">
            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="row_<?php echo e($t->id); ?>">
                <td align="center"><input name="tobedeleted[]" value="<?php echo e($t->id); ?>" type="checkbox"></td>
            <?php if($t->transaction == 'buy'): ?>
                <td><a href="<?php echo e(route('buyHouseEdit', ['id' => $t->id])); ?>"><?php echo e($t->community); ?></a></td>
                <td align="right"><?php echo e($t->price/10000); ?> <small class="text-black-50">万元</small></td>
                <td style="width: 50px"><span class="badge badge-danger">买</span></td>
            <?php elseif($t->transaction == 'sale'): ?>
                <td><a href="<?php echo e(route('saleHouseEdit', ['id' => $t->id])); ?>"><?php echo e($t->community); ?></a></td>
                <td align="right"><?php echo e($t->price/10000); ?> <small class="text-black-50">万元</small></td>
                <td style="width: 50px"><span class="badge badge-success">卖</span></td>
            <?php elseif($t->transaction == 'rent'): ?>
                <td><a href="<?php echo e(route('rentHouseEdit', ['id' => $t->id])); ?>"><?php echo e($t->community); ?></a></td>
                <td align="right"><?php echo e($t->price); ?> <small class="text-black-50">元/月</small></td>
                <td style="width: 50px"><span class="badge badge-danger">求租</span></td>
            <?php elseif($t->transaction == 'let'): ?>
                <td><a href="<?php echo e(route('letHouseEdit', ['id' => $t->id])); ?>"><?php echo e($t->community); ?></a></td>
                <td align="right"><?php echo e($t->price); ?> <small class="text-black-50">元/月</small></td>
                <td style="width: 50px"><span class="badge bade-success">出租</span></td>
            <?php endif; ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
</div>
</form>
<br>
<!-- 底部按钮 -->
<nav class="navbar fixed-bottom p-0">
    <table class="bg-white w-100">
        <tr style="border-spacing:0;margin: 0px;padding: 0px;">
            <td class="pl-0"><button id="checkall" type="button" class="btn btn-primary btn-block rounded-0">全 选</button></td>
            <td class="pl-0"><button id="shanchu" type="button" class="btn btn-primary btn-block rounded-0">删 除</button></td>
        </tr>
    </table>
</nav>
<!-- 底部按钮 -->

<script type="text/javascript">
    var target=null;
    $(function () {
        $('#checkall').click(function () {
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
                alert("start ajax");
                $('#myform').post("<?php echo e($_SERVER['REQUEST_URI']); ?>",function(result){
                    alert(result);});
            }
            else
                alert('请选择需要删除的信息');
        });
        
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.baseframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>