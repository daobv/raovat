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
            <?php $this->load->view('filter/manufacturer') ?>
            <?php $this->load->view('filter/price') ?>
            <?php $this->load->view('filter/product') ?>
        </div>
        <!-- END LEFT SIDEBAR -->

        <!-- BEGIN RIGHT SIDEBAR (.span3) -->
        <div id="right-sidebar">
            <?php $this->load->view('page/support'); ?>
            <?php $this->load->view('page/login_block'); ?>
            <?php $this->load->view('page/latest_product'); ?>
            <?php $this->load->view('page/friend') ?>
        </div>
        <!-- END RIGHT SIDEBAR -->

        <!-- BEGIN MAIN CONTENT (.span6) -->
        <div id="main-content">
            <hr class="top-hr">
            <h2 class="main-title">Sản phẩm</h2>

            <div class="product-list">
                <div class="product-item">
                    <a href=""><img class="product-thumbnail" src="uploads/dienthoai-02.jpg"
                                    alt="New design touch flag pen"></a>

                    <div class="product-content">
                        <h3 class="product-title"><a href="">New design touch flag pen</a></h3>

                        <p><strong>US $0.1-0.5 / Piece</strong> ( FOB Price)</p>

                        <p><strong>1000 Pieces</strong> (Min. Order) </p>

                        <div class="product-description clearfix"><strong>Details:</strong>

                            <div class="product-description-content">Place of Origin: CN;ZHE ; Brand Name: DILICN ; Material:
                                Plastic ; Use: Mobile Phone ; Use: Tablet ; Length: 11 cm ; Model Number: DL-S007
                            </div>
                            <div class="clearfix">
                                <a class="btn btn-detail pull-right" href="">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-item">
                    <a href=""><img class="product-thumbnail" src="uploads/dienthoai-02.jpg"
                                    alt="New design touch flag pen"></a>

                    <div class="product-content">
                        <h3 class="product-title"><a href="">New design touch flag pen</a></h3>

                        <p><strong>US $0.1-0.5 / Piece</strong> ( FOB Price)</p>

                        <p><strong>1000 Pieces</strong> (Min. Order) </p>

                        <div class="product-description clearfix"><strong>Details:</strong>

                            <div class="product-description-content">Place of Origin: CN;ZHE ; Brand Name: DILICN ; Material:
                                Plastic ; Use: Mobile Phone ; Use: Tablet ; Length: 11 cm ; Model Number: DL-S007
                            </div>
                            <div class="clearfix">
                                <a class="btn btn-detail pull-right" href="">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-item">
                    <a href=""><img class="product-thumbnail" src="uploads/dienthoai-02.jpg"
                                    alt="New design touch flag pen"></a>

                    <div class="product-content">
                        <h3 class="product-title"><a href="">New design touch flag pen</a></h3>

                        <p><strong>US $0.1-0.5 / Piece</strong> ( FOB Price)</p>

                        <p><strong>1000 Pieces</strong> (Min. Order) </p>

                        <div class="product-description clearfix"><strong>Details:</strong>

                            <div class="product-description-content">Place of Origin: CN;ZHE ; Brand Name: DILICN ; Material:
                                Plastic ; Use: Mobile Phone ; Use: Tablet ; Length: 11 cm ; Model Number: DL-S007
                            </div>
                            <div class="clearfix">
                                <a class="btn btn-detail pull-right" href="">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination">
                <ul>
                    <li class="prev"><a href="#">Trước</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li class="active"><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li class="next"><a href="#">Sau</a></li>
                </ul>
            </div>
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