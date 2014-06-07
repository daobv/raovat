<footer>
    <p>&copy; Vincent Gabriel 2013</p>
</footer>
</div>
<!--/.fluid-container-->
<script src="<?php echo base_url('vendors/jquery-1.9.1.min.js') ?>"></script>
<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('vendors/easypiechart/jquery.easy-pie-chart.js') ?>"></script>
<script src="<?php echo base_url('assets/scripts.js') ?>"></script>
<script>
    $(function () {
        // Easy pie charts
        $('.chart').easyPieChart({animate: 1000});
    });
</script>