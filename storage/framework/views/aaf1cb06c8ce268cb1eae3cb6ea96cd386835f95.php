<?php $__env->startSection('top_title'); ?>
<a class="navbar-brand" href="<?php echo e(route('/')); ?>"><img alt="Brand" src="<?php echo e(asset('img/wawj.svg')); ?>" width="30" height="30" class="d-inline-block align-top"> 我爱我家</a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<style type="text/css">
.myul {
padding-left: 0;
padding-top: 10px;
list-style: none;
text-align: center;
}
.myul>li >a{
color:#555555;
text-decoration: none;
width: 25%;
float: left;
padding-top: 20px;
}
.myul i{
color:#eb4e3d;
}

</style>

<!-- 中间显示栏 -->
<div class="tab-content" id="pills-tabContent">
  	<!-- 第1个tab -->
	<div class="tab-pane show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    	<ul class="myul">
		    <li><a href="<?php echo e(route('buyHouse')); ?>"><i class="fa fa-credit-card fa-2x"></i><div>我要买房</div></a></li>
		    <li><a href="<?php echo e(route('saleHouse')); ?>"><i class="fa fa-legal fa-2x"></i><div>我要卖房</div></a></li>
		    <li><a href="<?php echo e(route('postList', ['id' => Auth::id()])); ?>"><i class="fa fa-file-text-o fa-2x"></i><div>我的发布</div></a></li>
		    <li><a href="<?php echo e(route('rentHouse')); ?>"><i class="fa fa-bed fa-2x"></i><div>我要租房</div></a></li>
	  	    <li><a href="<?php echo e(route('letHouse')); ?>"><i class="fa fa-institution fa-2x"></i><div>我要出租</div></a></li>
		    <li><a href="<?php echo e(route('employAgent')); ?>"><i class="fa fa-black-tie fa-2x"></i><div>聘请代理</div></a></li>
		    <li><a href="#"><i class="fa fa-heart fa-2x"></i><div>setting</div></a></li>
		    <li><a href="#"><i class="fa fa-user-circle fa-2x"></i><div>about</div></a></li>
	  	</ul>
	</div>
	<!-- 第1个tab -->

	<!-- 第2个tab -->
	<div class="tab-pane" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
		2222222
	</div>
	<!-- 第2个tab -->
	

	<div class="tab-pane" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">jjjjjjj</div>
	<div class="tab-pane" id="pills-contacts" role="tabpanel" aria-labelledby="pills-contacts-tab">ssssss</div>
</div>
<!-- 中间显示栏 -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom'); ?>
<!-- 底部固定栏 -->
    <style type="text/css">
    a {color: #a2a2a2;}
    .nav-pills .nav-link.active,.nav-pills .show > .nav-link{color: #3d85db;background-color: #f8f9fa;}
    .nav-link:hover{color: #a2a2a2;}
    </style>

    <nav class="navbar-toggle fixed-bottom navbar-light bg-light border-top">
      <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist" style="font-size:12px;-webkit-transform: scale(0.90);line-height:12px;">
        <li class="nav-item"><a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fa fa-home fa-2x"></i><div>首页</div></a></li>
        <li class="nav-item"><a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fa fa-telegram fa-2x"></i><div>消息</div></a></li>
        <li class="nav-item"><a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fa fa-heart fa-2x"></i><div>关注</div></a></li>
        <li class="nav-item"><a class="nav-link" id="pills-contacts-tab" data-toggle="pill" href="#pills-contacts" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fa fa-user-circle fa-2x"></i><div>我的</div></a></li>
      </ul>
    </nav>
<!-- 底部固定栏 -->
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.baseframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>