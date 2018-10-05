<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
</head>
<body>
<style type="text/css">
    .btn{line-height: 1.8}
    body{background-color:transparent;padding: 5px;margin: 0px;}
</style>
<!-- 顶部导航 -->
    <nav class="navbar navbar-dark sticky-top border-bottom" style="padding-top: 0.2rem;padding-bottom: 0em;">
        <?php echo $__env->yieldContent('top'); ?>
    </nav>
<!-- 顶部导航 -->
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->yieldContent('bottom'); ?>
</body>
</html>