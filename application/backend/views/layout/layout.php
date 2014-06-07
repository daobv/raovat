<!DOCTYPE html>
<html class="no-js">

<head>
    <title><?php echo $title; ?></title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url('bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('bootstrap/css/bootstrap-responsive.min.css') ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('vendors/easypiechart/jquery.easy-pie-chart.css')?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('assets/styles.css') ?>" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo base_url('vendors/modernizr-2.6.2-respond-1.1.0.min.js')?>"></script>
</head>
<body>
    <?php $this->load->view("layout/navigation");?>
    <div class="container-fluid">
    <div class="row-fluid">
         <?php $this->load->view("layout/dashboard");?>
         <div class="span9" id="content">
                <?php $this->load->view("layout/breadcrumb");?>
                <?php
                        $this->load->view($template,$data);
                ?>
         </div>
    </div>
    </div>
    <hr>
    <?php $this->load->view("layout/footer");?>
</body>
</html>