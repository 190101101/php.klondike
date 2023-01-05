<?php $category = $data->category; ?>
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
    <!-- <form action="/panel/category/update" method="POST" class="general_form" enctype="multipart/form-data"> -->
    <form data-action="/panel/category/update" class="general_form data_form">

        <div class="form_box">
            <input type="file" name="category_image" id="uploadimage" onchange="imageupload()">
        </div>

        <div class="form_box">
            <progress class="tagprogress" id="progressBar" value="0" max="100"></progress>
            <span id="uploadstatus">отчет загруженных файлов</span>
        </div>

        <div class="form_box">
            <label>category</label>
            <input type="text" name="category" value="<?php echo $category->category; ?>" required>
        </div>

        <div class="form_box">
            <label>title</label>
            <input type="text" name="category_title" value="<?php echo $category->category_title; ?>" required>
        </div>

        <div class="form_box">
            <label>sub title</label>
            <input type="text" name="category_subtitle" value="<?php echo $category->category_subtitle; ?>" required>
        </div>

        <div class="form_box">
            <label>icon</label>
            <select name="category_icon" required>
                <option value="<?php echo $category->category_icon; ?>" selected>
                    <?php echo $category->category_icon; ?>
                </option>
                <?php foreach(svg_list() as $icon): ?>
                    <option value="<?php echo $icon; ?>"><?php echo $icon; ?></option>
                <?php endforeach; ?>
            </select>
        </div>


        <div class="form_box">
            <label>section</label>
            <select name="section_id" required>
                <option value="<?php echo $category->section_id; ?>">
                    <?php echo $category->section; ?>
                </option>
                <?php foreach($data->section as $section): ?>
                    <option value="<?php echo $section->section_id; ?>">
                        <?php echo $section->section; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form_box">
            <textarea name="category_content" class="middle"><?php echo $category->category_content; ?></textarea>
        </div>

        <div class="form_box">
            <label>category updated at</label>
            <input type="text" value="<?php echo $category->category_updated_at; ?>" readonly>
        </div>

        <div class="form_box">
            <label>category created at</label>
            <input type="text" value="<?php echo $category->category_created_at; ?>" readonly>
        </div>

        <div class="form_box">
            <input type="hidden" name="category_id" value="<?php echo $category->category_id; ?>" readonly required>
            <input type="hidden" name="image_delete" value="<?php echo $category->category_image; ?>" readonly>
            <button>update</button>
        </div>
    </form>
    <!--  -->
</div>
