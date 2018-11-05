<?php $__env->startSection('top_title'); ?>
    <a class="navbar-brand" href="<?php echo e(route('/')); ?>"><img alt="Brand" src="<?php echo e(asset('img/wawj.svg')); ?>" width="30" height="30" class="d-inline-block align-top"> WAWJ.COM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExample01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#aboutus">关于我们</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#aboutweb">关于网站</a>
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
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <div class="row form-group">
                <div class="col-md-12 text-center">
                    <img style="box-shadow:0 0 8px #ccc;border:8px solid #fff;" width="95%" id="myPicture">
                </div>
            </div>
            <br>
            <div class="row form-group">
                <div class="col-md-12 mb-2">
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-block">登 录</a>
                </div>
            </div>
            
            <div class="row" style="line-height: 0">
                <div class="col-md-12 mb-0">
                    <span class="text-secondary small">使用其他账户登录:</span><hr>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group justify-content-between">
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-success"><i class="fa fa-weixin fa-lg"></i> <span class="small">微信</span></a>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-info"><i class="fa fa-qq fa-lg"></i> <span class="small">&nbsp;QQ&nbsp;&nbsp;</span></a>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-danger"><i class="fa fa-weibo fa-lg"></i> <span class="small">微博</span></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<br>

<!-- 中间内容-->
<!-- 首页内容-->
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-4 text-secondary">
            <div id="aboutus"><i class="fa fa-chevron-circle-right fa-lg"></i> 关于我们</div><hr>
            <p>我们都租过、买过房子。<br>交易中机构只提供简单的咨询、引导服务，出现问题由交易双方自行解决；信息都是用户的，为什么要为自己的信息支付高昂的代价？<br>一次不愉快的购房经历让我们陷入沉思…</p>
        </div>
        
        <div class="col-md-4 text-secondary">
            <div id="aboutweb"><i class="fa fa-chevron-circle-right fa-lg"></i> 关于网站/APP</div>
            <div><hr>网站宗旨：<br>用户信息的价值属于用户自己<br>各类个人、机构用户永久免费<br>监管各类用户以遵守既定规则</div>
        </div>

        <div class="col-md-4 text-secondary">
            <div id="abouttec"><i class="fa fa-chevron-circle-right fa-lg"></i> 关于制作</div>
            <div><hr>本网站基于以下开源技术开发<br><a href="http://www.php.net">PHP</a> | <a href="https://laravel.com">Laravel</a> | <a href="https://www.mysql.com">Mysql</a><br><a href="https://getbootstrap.com/">Bootstrap</a> | <a href="https://vuejs.org">Vue.js</a> | <a href="https://apache.org">Apache</a></div>
        </div>
    </div>
</div>
<br><br><br>
<!-- 首页内容-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom'); ?>
<?php echo $__env->make('layouts.baseframebrandbottom', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript">
window.onload = choosePic;
function choosePic() {
    var myPix = new Array("img/timg1.jpg","img/timg2.jpg","img/timg3.jpg","img/timg4.jpg","img/timg5.jpg","img/timg6.jpg","img/timg7.jpg","img/timg8.jpg");
    var randomNum = Math.floor((Math.random() * myPix.length));
    document.getElementById("myPicture").src = myPix[randomNum];
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.baseframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>