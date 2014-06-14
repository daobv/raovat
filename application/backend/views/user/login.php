<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('bootstrap/css/bootstrap-responsive.min.css')?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('assets/styles.css')?>" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo base_url('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js')?>"></script>
</head>
<body id="login">
<div class="container">
    <form class="form-signin" action="<?php echo base_url('admin/loginpost') ?>" method="post">
        <h2 class="form-signin-heading">Đăng nhập</h2>
        <input name="username" type="text" class="input-block-level" placeholder="Tên đăng nhập">
        <input name="password" type="password" class="input-block-level" placeholder="Mật khẩu">
        <button class="btn btn-large btn-primary" type="submit">Đăng nhập</button>
    </form>

</div> <!-- /container -->
<script src="<?php echo base_url('vendors/jquery-1.9.1.min.js')?>"></script>
<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js')?>"></script>
</body>
</html>