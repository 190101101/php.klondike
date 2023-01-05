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

    <!--  -->
    <form data-action="/panel/article/create" class="general_form data_form">
    <!-- <form action="/panel/article/create" method="POST" class="general_form"> -->

        <div class="form_box">
            <input type="file" name="article_image" id="uploadimage" onchange="imageupload()">
        </div>

        <div class="form_box">
            <progress class="tagprogress" id="progressBar" value="0" max="100"></progress>
            <span id="uploadstatus">отчет загруженных файлов</span>
        </div>

        <div class="form_box">
            <label>article title</label>
            <input type="text" name="article_title" placeholder="article title" required>
        </div>

        <div class="form_box">
            <label>category</label>
            <select name="category_id" required>
                <?php foreach($data->category as $category): ?>
                    <option value="<?php echo $category->category_id; ?>"><?php echo $category->category; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form_box">
            <textarea name="article_content" class='middle' placeholder="article content"></textarea>
        </div>

        <div class="form_box">
            <div class="input_group">
                <input style="--width: 79%;" type="text" name="article_archive"
                placeholder="google file id">
                <input style="--width: 20%;" type="text" name="article_archivesize"
                placeholder="size">
            </div>
        </div>

        <div class="form_box">
            <label>article video</label>
            <input type="text" name="article_video" placeholder="article video">
        </div>

        <div class="form_box">
            <button>create</button>
        </div>

    </form>
    <!--  -->
</div>

