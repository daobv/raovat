<div class="row-fluid">
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left"><?php echo $title ?></div>
            <div class="pull-right">
                <a class="badge badge-info" href="/admin/category/form">Thêm danh mục</a>
            </div>
        </div>
        <div class="block-content collapse in">
            <?php if ($data == 0): ?>
                <p>Không có danh mục nào</p>
            <?php else: ?>
                <table id="datatable" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <td>ID#</td>
                        <td>Tên danh mục</td>
                        <td>Danh mục cha</td>
                        <td>Mô tả</td>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td>ID#</td>
                        <td>Tên danh mục</td>
                        <td>Danh mục cha</td>
                        <td>Mô tả</td>
                    </tr>
                    </tfoot>
                </table>
                <script type="text/javascript">
                    $('#datatable').dataTable({
                        "processing": true,
                        "serverSide": true,
                        "ajax": "<?php echo base_url('admin/category/datatable') ?>"
                    });
                </script>
            <?php endif; ?>
        </div>
    </div>
</div>
