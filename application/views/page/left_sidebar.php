<div class="sidebar-box">
    <h3 class="sidebar-title">Danh mục sản phẩm</h3>
    <ul class="sidebar-categories">
        <?php foreach($categories as $category):?>
        <li><a href="<?php echo $category['slug']; ?>"><?php echo $category['name']; ?></a></li>
        <?php endforeach;?>
    </ul>
</div>