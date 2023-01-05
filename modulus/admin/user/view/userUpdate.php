<?php $user = $data->user; ?>
<div class="page_head">
    <?php echo bread_cump(); ?>
</div>
<div class="table_content">
    <div class="table_content_head">
        <ul class="nav nav-tab">
            <li>
                <a>
                    <img src="<?php echo SVG1; ?>update.svg">
                    <span>update</span>
                </a>
            </li>
        </ul>
    </div>

    <!--  -->
    <!-- <form action="/panel/user/update" method="POST" class="general_form"> -->
    <!-- <form class="general_form user_update" data-action="/panel/user/update"> -->
    <form data-action="/panel/user/update" class="general_form data_form">

        <div class="form_box">
            <label>user login</label>
            <input type="text" name="user_login" value="<?php echo $user->user_login; ?>" required>
        </div>

        <div class="form_box">
            <label>user password</label>
            <input type="text" name="user_password" value="<?php echo $user->user_password; ?>" required>
        </div>

        <div class="form_box">
            <input type="color" name="user_color" value="<?php echo $user->user_color; ?>" required>
        </div>

        <div class="form_box">
            <label>user level</label>
            <input type="text" name="user_level" value="<?php echo $user->user_level; ?>" required>
        </div>

        <div class="form_box">
            <label>user updated at</label>
            <input type="text" value="<?php echo $user->user_updated_at; ?>" readonly>
        </div>

        <div class="form_box">
            <label>user created at</label>
            <input type="text" value="<?php echo $user->user_created_at; ?>" readonly>
        </div>

        <div class="form_box">
            <input type="hidden" name="user_id" value="<?php echo $user->user_id; ?>" readonly required>
            <input type="hidden" name="user_updated_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
            <button>update</button>
        </div>
    </form>
    <!--  -->
</div>

