<?php $main = new core\controller; ?>
<!doctype html>
<html lang="en">
    <head>
        <?php $main->view('main', 'requires', 'main/css'); ?>
    </head>
    <body class="body">
        <div id="wrapper">
            <?php $main->view('main', 'requires', 'main/navbar'); ?>
            <?php $main->view('main', 'requires', 'main/sidebar'); ?>
            <div class="wrap">
                <div class="content section">
                    <div class="page-content inner-not-vh">
                        <?php echo $data['VIEW']; ?> 
                    </div>
                </div>
                <?php $main->view('main', 'requires', 'main/section'); ?>
            </div>
        </div>
        <?php $main->view('main', 'requires', 'main/footer'); ?>
        <?php $main->view('main', 'requires', 'about/js'); ?>
    </body>
</html>

