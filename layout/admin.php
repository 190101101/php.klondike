<?php $admin = new core\controller; ?>
<!doctype html>
<html lang="en">
    <head>
        <?php $admin->view('admin', 'requires', 'admin/css'); ?>
    </head>
    <body>
        <div id="wrapper">
            <?php $admin->view('admin', 'requires', 'admin/history'); ?>
            <?php $admin->view('admin', 'requires', 'admin/navbar'); ?>
            <div class="wrap">
                <div class="main_content">
                    <div class="inner_content">
                        <?php $admin->view('admin', 'requires', 'admin/sidebar'); ?>
                        <?php echo $data['VIEW']; ?> 
                    </div>
                </div>
            </div>
        </div>
        <?php $admin->view('admin', 'requires', 'admin/js'); ?>
    </body>
</html>

