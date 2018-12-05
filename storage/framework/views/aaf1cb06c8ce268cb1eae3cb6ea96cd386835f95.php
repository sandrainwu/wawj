<?php $__env->startSection('top_title'); ?>
<a class="navbar-brand" href="<?php echo e(route('/')); ?>"><img alt="Brand" src="<?php echo e(asset('img/wawj.svg')); ?>" width="30" height="30" class="d-inline-block align-top"> WAWJ.COM</a>
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

<!-- 中间显示栏开始 -->
<div class="tab-content" id="pills-tabContent">
  	<!-- 第1个tab -->
	<div class="tab-pane show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    	<ul class="myul">
		    <li><a href="<?php echo e(route('userBuyHouse')); ?>"><i class="fa fa-credit-card fa-2x"></i><div>我要买房</div></a></li>
		    <li><a href="<?php echo e(route('userSaleHouse')); ?>"><i class="fa fa-legal fa-2x"></i><div>我要卖房</div></a></li>
		    <li><a href="<?php echo e(route('userPostList')); ?>"><i class="fa fa-file-text-o fa-2x"></i><div>我的发布</div></a></li>
		    <li><a href="<?php echo e(route('userRentHouse')); ?>"><i class="fa fa-bed fa-2x"></i><div>我要租房</div></a></li>
	  	    <li><a href="<?php echo e(route('userLetHouse')); ?>"><i class="fa fa-institution fa-2x"></i><div>我要出租</div></a></li>
		    <li><a href="<?php echo e(route('userEmployAgent')); ?>"><i class="fa fa-black-tie fa-2x"></i><div>聘请代理</div></a></li>
	  	</ul>
	</div>
	<!-- 第1个tab -->

	<!-- 第2个tab -->
	<div class="tab-pane" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
		2222222
	</div>
	<!-- 第2个tab -->
	
	<!-- 第3个tab -->
	<div class="tab-pane" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">jjjjjjj</div>
	<!-- 第3个tab -->
	
	<!-- 第4个tab -->
	<div class="tab-pane" id="pills-contacts" role="tabpanel" aria-labelledby="pills-contacts-tab">
		<br>
		<div class="container">
			<div class="row border-top">
				<div class="col my-2">
				    <a href="<?php echo e(route('changePassword')); ?>" class="text-secondary">
	                    <table class="w-100"><tr><td>修改密码</td><td align="right"><i class="fa fa-key fa-fw"></i> <i class="fa fa-chevron-right"></i></td></tr>
	                    </table>
	                </a>
	            </div>
			</div>
			<div class="row border-top text-secondary">
			    <div class="col my-2"><a href="#none" class="text-secondary">身份认证</a></div>
			    <div class="col my-2 text-right"><a href="#none" class="text-secondary"><i class="fa fa-id-card-o fa-fw"></i> <i class="fa fa-chevron-right"></i></a></div>
			</div>
			<div class="row border-top border-bottom">
			    <div class="col my-2"><a href="#none" class="text-secondary">我的二维码</a></div>
			    <div class="col my-2 text-right"><a href="#none" class="text-secondary"><i class="fa fa-qrcode fa-fw"></i> <i class="fa fa-chevron-right"></i></a></div>
			</div>
			<br>
			<div class="row border-top border-bottom">
			    <div class="w-100 my-2 text-center"><a href="<?php echo e(route('logout','user')); ?>" class="text-secondary">退出登录<i class="fa fa-lock fa-fw"></i></a></div>
			</div>
		</div>
	</div>
	<!-- 第4个tab -->
	
</div>
<!-- 中间显示栏结束 -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom'); ?>
<!-- 底部固定栏开始 -->
    <style type="text/css">
    .nav-link {color: #a2a2a2;}
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
<!-- 底部固定栏结束 -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.baseframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>