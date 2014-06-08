<link href="<?php echo base_url('assets/jquery.dataTables.min.css') ?>" rel="stylesheet" media="screen">
<script src="<?php echo base_url('vendors/jquery-1.9.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/jquery.dataTables.min.js') ?>"></script>
<table id="datatable" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID#</th>
            <th>Tên danh mục</th>
            <th>Danh mục cha</th>
            <th>Mô tả</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID#</th>
            <th>Tên danh mục</th>
            <th>Danh mục cha</th>
            <th>Mô tả</th>
        </tr>
    </tfoot>
</table>
<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "<?php echo base_url('admin/category/datatable') ?>"
        });
    });
</script>