<div class="page_head">
    <?php echo bread_cump(); ?>
</div>
<div class="table_content">
    <div class="table_content_head">
        <ul class="nav nav-tab">
            <li>
                <a>
                    <img src="<?php echo SVG1; ?>update.svg">
                    <span>create</span>
                </a>
            </li>
        </ul>
    </div>

    <form data-action="/panel/category/create" class="general_form data_form">
    <!-- <form action="/panel/category/create" method="POST" class="general_form"> -->

        <div class="form_box">
            <input type="file" name="category_image" id="uploadimage" onchange="imageupload()">
        </div>

        <div class="form_box">
            <progress class="tagprogress" id="progressBar" value="0" max="100"></progress>
            <span id="uploadstatus">отчет загруженных файлов</span>
        </div>

        <div class="form_box">
            <label>category</label>
            <input type="text" name="category" placeholder="category" required>
        </div>      

        <div class="form_box">
            <label>title</label>
            <input type="text" name="category_title" placeholder="category title" required>
        </div>

        <div class="form_box">
            <label>sub title</label>
            <input type="text" name="category_subtitle" placeholder="category sub title" required>
        </div>

        <div class="form_box">
            <label>icon</label>
            <select name="category_icon" required>
                <?php foreach(svg_list() as $icon): ?>
                    <option value="<?php echo $icon; ?>"><?php echo $icon; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form_box">
            <label>section</label>
            <select name="section_id" required>
                <?php foreach($data->section as $section): ?>
                    <option value="<?php echo $section->section_id; ?>"><?php echo $section->section; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form_box">
            <label>icon</label>
            <select name="category_icon" required>
                <?php foreach(svg_list() as $icon): ?>
                    <option value="<?php echo $icon; ?>"><?php echo $icon; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form_box">
            <textarea name="category_content" id="editor1"></textarea>
             <script>
                CKEDITOR.replace( 'editor1' );
            </script>
        </div>

        <div class="form_box">
            <button>create</button>
        </div>

    </form>
    <!--  -->
</div>
