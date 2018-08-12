<?php $__env->startSection('top_title'); ?>
<a class="navbar-brand" href="<?php echo e(route('/')); ?>"><img alt="Brand" src="<?php echo e(asset('img/wawj.svg')); ?>" width="30" height="30" class="d-inline-block align-top"> 我爱我家</a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('right_title'); ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExample01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#aboutus">关于我们 <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#aboutsite">关于网站</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#abouttec">关于制作</a>
          </li>
        </ul>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<!-- 中间内容 -->
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <div class="row form-group">
                <div class="col-md-12 text-center">
                    <img src="img/icon4.png">
                </div>
            </div>
            
            <div class="row form-group">
                <div class="col-md-12">
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-block">登 录</a>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12">
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-block">游 客</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 中间内容-->
<!-- 首页内容-->
<div class="mui-content">
    <div class="mui-row" style="height: 300px">
        <div class="mui-col-sm-6 mui-col-xs-6" style="padding-left:8px;padding-right: 8px">
            <div id="policy" class="mui-text-center">关于我们</div>
            <div class="mui-text-center"><hr><span class="mui-icon mui-icon-checkmarkempty"></span>不利用公众信息牟利<br><span class="mui-icon mui-icon-checkmarkempty"></span>只提供免费信息平台<br><span class="mui-icon mui-icon-checkmarkempty"></span>不收取任何信息费用<br><span class="mui-icon mui-icon mui-icon-checkmarkempty"></span>中介为交易流程服务</div>
        </div>
        
        <div class="mui-col-sm-6 mui-col-xs-6" style="padding-left:8px;padding-right: 8px">
            <div id="about" class="mui-text-center">关于网站</div>
            <div class="mui-text-center"><hr>基于以下开源技术开发<br><a style="color: #3982ba" href="http://www.php.net">PHP <img src="img/php.png" align="baseline"></a> | <a href="https://laravel.com" style="color: #3982ba">Laravel</a> <img src="img/laravel.png" align="baseline"> | <a href="https://www.mysql.com" style="color: #3982ba">Mysql</a> <img src="img/mysql.png" align="baseline"><br><a href="http://dev.dcloud.net.cn/mui/" style="color: #3982ba">MUI</a> <img src="img/mui.png" align="baseline">| <a href="http://www.phpmyadmin.net" style="color: #3982ba">phpMyAdmin</a> <img src="img/phpmyadmin.png" align="baseline"> | <a href="https://apache.org" style="color: #3982ba">Apache</a> <img src="img/apache.png" align="baseline"></div>
        </div>
    </div>
</div>
<!-- 首页内容-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.baseframebrandbottom', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.baseframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>