<?php $__env->startSection('top_title'); ?>
<a class="navbar-brand" href="<?php echo e(route('userHome')); ?>"><i class="fa fa-chevron-left"></i></a><span class="text-white">我的发布</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form id="myform" name="myform" action="" method="post">
    <?php echo csrf_field(); ?>
<div class="container">
    <div class="row">
        
    <style type="text/css">
        a{color: #3982ba;"}
    </style>          
        <table class="table table-striped w-100" id="table">
            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="row_<?php echo e($t->id); ?>">
                <td align="center"><input name="tobedeleted[]" value="<?php echo e($t->id); ?>" type="checkbox"></td>
            <?php if($t->transaction == 'buy'): ?>
                <td><a href="<?php echo e(route('userBuyHouseEdit', ['id' => $t->id])); ?>"><?php echo e($t->community); ?></a></td>
                <td align="right"><?php echo e($t->price/10000); ?> <small class="text-black-50">万元</small></td>
                <td style="width: 50px"><span class="badge badge-danger">买房</span></td>
            <?php elseif($t->transaction == 'sale'): ?>
                <td><a href="<?php echo e(route('userSaleHouseEdit', ['id' => $t->id])); ?>"><?php echo e($t->community); ?></a></td>
                <td align="right"><?php echo e($t->price/10000); ?> <small class="text-black-50">万元</small></td>
                <td style="width: 50px"><span class="badge badge-success">卖房</span></td>
            <?php elseif($t->transaction == 'rent'): ?>
                <td><a href="<?php echo e(route('userRentHouseEdit', ['id' => $t->id])); ?>"><?php echo e($t->community); ?></a></td>
                <td align="right"><?php echo e($t->price); ?> <small class="text-black-50">元/月</small></td>
                <td style="width: 50px"><span class="badge badge-danger">求租</span></td>
            <?php elseif($t->transaction == 'let'): ?>
                <td><a href="<?php echo e(route('userLetHouseEdit', ['id' => $t->id])); ?>"><?php echo e($t->community); ?></a></td>
                <td align="right"><?php echo e($t->price); ?> <small class="text-black-50">元/月</small></td>
                <td style="width: 50px"><span class="badge badge-success">出租</span></td>
            <?php endif; ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
</div>
</form>
<br>
<!-- 底部按钮开始 -->
<nav class="navbar fixed-bottom p-0">
    <table class="bg-white w-100">
        <tr style="border-spacing:0;margin: 0px;padding: 0px;">
            <td class="pl-0"><button id="checkall" type="button" class="btn btn-primary btn-block rounded-0">全 选</button></td>
            <td class="pl-0"><button id="shanchu" type="submit" class="btn btn-primary btn-block rounded-0">删 除</button></td>
        </tr>
    </table>
</nav>
<!-- 底部按钮结束 -->

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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.baseframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>