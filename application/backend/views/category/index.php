<div class="row-fluid">
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left"><?php echo $title ?></div>
            <div class="pull-right">
                <a class="badge badge-info" href="/admin/category/form">Thêm danh mục</a>
            </div>
        </div>
        <div class="block-content collapse in">
            <?php if (count($data) == 0): ?>
                <p>Không có danh mục nào</p>
            <?php else: ?>
                <p class="pagination"><?php echo $links ?></p>
                <table class="data-table" style="width: 100%">
                    <thead>
                    <tr>
                        <td>ID#</td>
                        <td>Tên danh mục</td>
                        <td>Danh mục cha</td>
                        <td>Mô tả</td>
                        <td>Kiểu danh mục</td>
                        <td>Sửa | Xóa</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $cate): ?>
                        <tr>
                            <td><?php echo $cate['id'] ?></td>
                            <td><?php echo $cate['name'] ?></td>
                            <td><?php echo $cate['root'] ?></td>
                            <td><?php echo $cate['description'] ?></td>
                            <td><?php echo $cate['category_type'] ?></td>
                            <td><a href="/admin/category/form?id=<?php echo $cate['id'] ?>">Sửa</a> | <a
                                    href="/admin/category/del?id=<?php echo $cate['id'] ?>"
                                    onclick="deleteConfirm(this);return false;">Xóa</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <p class="pagination"><?php echo $links ?></p>
                <script type="text/javascript">
                    function deleteConfirm(el) {
                        if (confirm('Bạn có thật sự muốn xóa danh mục này?')) {
                            location.href = $(el).attr('href');
                        }
                    }
                </script>
            <?php endif; ?>
        </div>
    </div>
</div>
