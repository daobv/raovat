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
                        <td><strong>ID#</strong></td>
                        <td><strong>Tên danh mục</strong></td>
                        <td><strong>Danh mục cha</strong></td>
                        <td><strong>Mô tả</strong></td>
                        <td><strong>Sửa | Xóa</strong></td>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td><strong>ID#</strong></td>
                        <td><strong>Tên danh mục</strong></td>
                        <td><strong>Danh mục cha</strong></td>
                        <td><strong>Mô tả</strong></td>
                        <td><strong>Sửa | Xóa</strong></td>
                    </tr>
                    </tfoot>
                </table>
                <script type="text/javascript">
                    $('#datatable').dataTable({
                        "processing": true,
                        "serverSide": true,
                        "ajax": "<?php echo base_url('admin/category/datatable') ?>",
                        "columnDefs": [
                            {
                                "render": function ( data, type, row ) {
                                    return '<a class="btn-edit" href="/admin/category/form?id=' + data + '">Sửa</a>'
                                        + ' | <a onclick="return confirmDelete(this)" class="btn-delete" href="/admin/category/del?id=' + data + '">Xóa</a>';
                                },
                                "targets": 4
                            },
                            { "sortable": false,  "targets": 4 }
                        ]
                    });

                    function confirmDelete(el) {
                        if (confirm("Bạn có đồng ý xóa danh mục này không?")) {
                            location.href = $(el).attr('href');
                        }
                        return false;
                    }
                </script>
            <?php endif; ?>
        </div>
    </div>
</div>
