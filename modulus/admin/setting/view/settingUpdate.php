<?php $setting = $data->setting; ?>
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

    <!-- <form action="/panel/setting/update" method="POST" class="general_form"> -->
    <form data-action="/panel/setting/update" class="general_form data_form">

        <div class="form_box">
            <label>description</label>
            <input type="text" name="setting_description" value="<?php echo $setting->setting_description; ?>" required>
        </div>

        <div class="form_box">
            <label>setting key</label>
            <input type="text" name="setting_key" value="<?php echo $setting->setting_key; ?>" required>
        </div>

        <div class="form_box">
            <textarea name="setting_value" class='middle' placeholder="setting value"><?php echo $setting->setting_value; ?></textarea>
        </div>

        <div class="form_box">
            <label>updated at</label>
            <input type="text" value="<?php echo $setting->setting_updated_at; ?>" readonly>
        </div>

        <div class="form_box">
            <input type="hidden" name="setting_id" value="<?php echo $setting->setting_id; ?>" readonly required>
            <button>update</button>
        </div>
    </form>
</div>
