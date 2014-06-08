<?php
$notnew = isset($data['form_data']) && $data['form_data'];
if ($notnew) $formData = $data['form_data'];
?>

<div class="row-fluid">
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left"><?php echo $title ?></div>
            <div class="pull-right">
                <a class="badge badge-info" href="/admin/category">List Danh mục</a>
            </div>
        </div>
        <div class="block-content collapse in">
            <?php echo validation_errors(); ?>
            <form action="/admin/category/form" method="post">
                <?php if ($notnew): ?>
                    <input type="hidden" name="id" value="<?php echo $formData->id ?>"/>
                <?php endif; ?>
                <div class="row-fluid">
                    <div class="span6">
                        <label for="name">Tên danh mục</label>
                        <input type="text" name="name" id="name"
                               value="<?php echo $notnew ? $formData->name : '' ?>" required/>
                    </div>
                    <div class="span6">
                        <label for="root">Danh mục cha</label>
                        <?php echo form_dropdown('root', $data['dropdownlist'], $notnew ? $formData->root : array(), 'required') ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" value="<?php echo $notnew ? $formData->slug : '' ?>"
                               required/>
                    </div>
                    <div class="span6">
                        <label for="page_title">Tiêu đề trang</label>
                        <input type="text" name="page_title" id="page_title"
                               value="<?php echo $notnew ? $formData->page_title : '' ?>" required/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <label for="description">Mô tả</label>
                        <textarea name="description" id="description"
                                  required><?php echo $notnew ? $formData->description : '' ?></textarea>
                    </div>
                    <div class="span6">
                        <label for="content_tag">Tags</label>
                        <textarea name="content_tag" id="content_tag"
                                  required><?php echo $notnew ? $formData->content_tag : '' ?></textarea>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <label for="category_type">Kiểu danh mục</label>
                        <select name="category_type" id="category_type" required>
                            <option value=""></option>
                            <option
                                value="0"<?php echo ($notnew && ($formData->category_type == 0)) ? " selected" : '' ?>>
                                Danh mục sản phẩm
                            </option>
                            <option
                                value="1"<?php echo ($notnew && ($formData->category_type == 1)) ? " selected" : '' ?>>
                                Danh mục từ thiện
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <button type="submit" class="btn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
