<?php $__env->startSection('top_title'); ?>
<a class="navbar-brand" href="<?php echo e(isset($backto) ? $backto : route('userHome')); ?>"><i class="fa fa-chevron-left"></i></a><span class="text-white">我要租房</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<br>
<form action="<?php echo e(route('userTransactionSave')); ?>" method="post">
    <input type="hidden" name="transaction" value="rent">
    <?php echo isset($post_id) ? '<input type="hidden" name="post_id" value="'.$post_id.'">' : ''; ?>

    <?php echo csrf_field(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <div class="row">
                 <div class="col-md-12 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">名称</span>
                    </div>
                    <input placeholder="住宅小区名称" type="text" class="form-control<?php echo e($errors->has('community') ? ' is-invalid' : ''); ?>" name="community" value="<?php echo e(isset($list->community) ? $list->community : old('community')); ?>" required autofocus aria-describedby="basic-addon1">
                </div>
            </div>
            
            <div class="row">
               <div class="col-md-12 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2">类型</span>
                    </div>
                    <select name="house_type" aria-describedby="basic-addon2" class="custom-select"> 
                    <option value="别墅" 
                    <?php if(isset($list->house_type)&& ($list->house_type == '别墅')): ?>
                        selected
                    <?php endif; ?> 
                    >别墅</option>
                    <option value="排屋"
                    <?php if(isset($list->house_type)&&($list->house_type == '排屋')): ?>
                        selected
                    <?php endif; ?> 
                    >排屋</option>
                    <option value="普通住宅"<?php if( !isset($list->house_type)): ?>
                                                selected
                                            <?php elseif($list->house_type=== '普通住宅'): ?>
                                                selected
                                            <?php endif; ?>
                    >普通住宅</option>
                    <option value="公寓"
                    <?php if(isset($list->house_type)&&($list->house_type == '公寓')): ?>
                        selected
                    <?php endif; ?> 
                    >公寓</option>
                    <option value="商住楼"
                    <?php if(isset($list->house_type)&&($list->house_type == '商住楼')): ?>
                        selected
                    <?php endif; ?> 
                    >商住楼</option>
                    <option value="写字楼" 
                    <?php if( isset($list->house_type)&&($list->house_type == '写字楼')): ?>
                        selected
                    <?php endif; ?> 
                    >写字楼</option>
                    <option value="商铺" 
                    <?php if(isset($list->house_type)&&($list->house_type == '商铺')): ?>
                        selected
                    <?php endif; ?> 
                    >商铺</option>
                    <option value="工业物业" 
                    <?php if(isset($list->house_type)&&($list->house_type == '工业物业')): ?>
                        selected
                    <?php endif; ?> 
                    >工业物业</option>
                    </select>
                </div>
            </div>
 
            <div class="row">
                <div class="col-md-12 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">面积</span>
                    </div>
                    <input placeholder="建筑面积" type="number" min="0" max="999999999999" class="form-control<?php echo e($errors->has('area') ? ' is-invalid' : ''); ?>" name="area" value="<?php echo e(isset($list->area) ? $list->area : old('area')); ?>" required aria-describedby="basic-addon3">
                    <div class="input-group-append">
                        <span class="input-group-text pl-2" style="width:50px;">m<sup>2</sup></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon4">租金</span>
                    </div>
                    <input placeholder="月租金" type="number" class="form-control<?php echo e($errors->has('price') ? ' is-invalid' : ''); ?>" name="price" value="<?php echo e(isset($list->price) ? $list->price : old('price')); ?>" required aria-describedby="basic-addon4">
                    <div class="input-group-append">
                        <span class="input-group-text pl-2" style="width:50px;">元/月</span>
                    </div>
                </div>
            </div>

            <div class="row">
               <div class="col-md-12 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon5">证号</span>
                    </div>
                    <input placeholder="房产证编号" type="text" class="form-control<?php echo e($errors->has('certificate_number') ? ' is-invalid' : ''); ?>" name="certificate_number" value="<?php echo e(isset($list->certificate_number) ? $list->certificate_number : old('certificate_number')); ?>" required aria-describedby="basic-addon5">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon6">特点</span>
                    </div>
                    <input placeholder="房屋特点,可多选" type="text" class="form-control<?php echo e($errors->has('feature') ? ' is-invalid' : ''); ?>" name="feature" value="<?php echo e(isset($list->feature) ? $list->feature : old('feature')); ?>" required aria-describedby="basic-addon6">
                </div>
            </div>

        </div>
    </div>
</div>

<nav class="navbar fixed-bottom p-0">
    <table class="bg-white w-100">
        <tr style="border-spacing:0;margin: 0px;padding: 0px;">
            <td class="pl-0"><button type="reset" class="btn btn-primary btn-block rounded-0">重 写</button></td>
            <td class="pl-0"><button type="submit" class="btn btn-primary btn-block rounded-0">保 存</button></td>
        </tr>
    </table>
</nav>

</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.baseframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>