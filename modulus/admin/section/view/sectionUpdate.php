<?php $section = $data->section; ?>
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
        <!-- <form action="/panel/section/update" method="POST" class="general_form" enctype="multipart/form-data"> -->
        <form data-action="/panel/section/update" class="general_form data_form">

            <div class="form_box">
                <label>section</label>
                <input type="text" name="section" value="<?php echo $section->section; ?>" required>
            </div>

            <div class="form_box">
                <label>section title</label>
                <input type="text" name="section_title" value="<?php echo $section->section_title; ?>" required>
            </div>

            <div class="form_box">
                <label>icon</label>
                <select name="section_icon" required>
                    <option value="<?php echo $section->section_icon; ?>" selected>
                        <?php echo $section->section_icon; ?>
                    </option>
                    <?php foreach(svg_list() as $icon): ?>
                        <option value="<?php echo $icon; ?>"><?php echo $icon; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form_box">
                <label>section updated at</label>
                <input type="text" value="<?php echo $section->section_updated_at; ?>" readonly>
            </div>

            <div class="form_box">
                <label>section created at</label>
                <input type="text" value="<?php echo $section->section_created_at; ?>" readonly>
            </div>

            <div class="form_box">
                <input type="hidden" name="section_id" value="<?php echo $section->section_id; ?>" readonly required>
                <input type="hidden" name="section_updated_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
                <button>update</button>
            </div>
        </form>
        <!--  -->
    </div>
