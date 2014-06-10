<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <?php $this->load->view('page/head') ?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
<!-- BEGIN TOP HEADER -->
<div id="top-header">
    <?php $this->load->view('page/top_header') ?>
</div>
<!-- END TOP HEADER -->
<!-- BEGIN HEADER -->
<div id="header">
    <?php $this->load->view('page/header') ?>
</div>
<!-- END HEADER -->

<!-- BEGIN MAIN -->
<div id="main" class="row-fluid">
    <div class="container-fluid">
        <!-- BEGIN LEFT SIDEBAR (.span3) -->
        <div id="left-sidebar">
            <?php $this->load->view('page/left_sidebar',$categories) ?>
        </div>
        <!-- END LEFT SIDEBAR -->

        <!-- BEGIN RIGHT SIDEBAR (.span3) -->
        <div id="right-sidebar">
            <?php $this->load->view('page/right_sidebar') ?>
        </div>
        <!-- END RIGHT SIDEBAR -->

        <!-- BEGIN MAIN CONTENT (.span6) -->
        <div id="main-content">

            <?php $this->load->view($template,$content) ?>

        </div>
        <!-- END MAIN CONTENT -->
    </div>
</div>
<!-- END MAIN -->

<!-- BEGIN FOOTER -->
<div id="footer">
    <?php $this->load->view('page/footer') ?>
</div>
<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<?php $this->load->view('page/js') ?>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>