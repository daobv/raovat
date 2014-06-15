<div class="row-fluid">
    <form action="<?php echo base_url('admin/setting') ?>" method="post">
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Cài đặt hệ thống</div>
                <div class="pull-right">
                    <button type="submit" class="badge">Lưu cài đặt</button>
                </div>
            </div>

            <div class="block-content collapse in">
                <?php echo validation_errors(); ?>
                <?php foreach ($data['config'] as $key => $config): ?>
                    <div class="field">
                        <div class="span4">
                            <label for="<?php echo $key ?>"><?php echo $config['label'] ?></label>
                        </div>
                        <div class="span8">
                            <input type="text" id="<?php echo $key ?>" name="<?php echo $key ?>"
                                   value="<?php echo isset($data['db'][$key]) ? $data['db'][$key] : '' ?>" />
                        </div>
                    </div>
                <?php endforeach; ?>
                <button class="btn btn-primary" type="submit">Lưu cài đặt</button>
            </div>
        </div>
    </form>
</div>
