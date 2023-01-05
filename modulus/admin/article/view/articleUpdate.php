<?php $article = $data->article; ?>
<?php $category = $data->category; ?>
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
    <form data-action="/panel/article/update" class="general_form data_form">
    <!-- <form action="/panel/article/update" method="POST" class="general_form"> -->
  
        <div class="form_box">
            <input type="file" name="article_image" id="uploadimage" onchange="imageupload()">
        </div>

        <div class="form_box">
            <progress class="tagprogress" id="progressBar" value="0" max="100"></progress>
            <span id="uploadstatus">отчет загруженных файлов</span>
        </div>

        <div class="form_box">
            <label>article title</label>
            <input type="text" name="article_title" value="<?php echo $article->article_title; ?>" required>
        </div>

        <div class="form_box">
            <label>category</label>
            <select name="category_id" required>
                <option value="<?php echo $article->category_id; ?>">
                    <?php echo $article->category; ?>
                </option>
                <?php foreach($data->category as $category): ?>
                    <option value="<?php echo $category->category_id; ?>">
                        <?php echo $category->category; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form_box">
            <textarea name="article_content" class='middle' placeholder="article content"><?php echo $article->article_content; ?></textarea>
        </div>

        <div class="form_box">
            <div class="input_group">
                <input style="--width: 79%;" type="text" name="article_archive"
                value="<?php echo $article->article_archive; ?>">
                <input style="--width: 20%;" type="text" name="article_archivesize"
                value="<?php echo $article->article_archivesize; ?>">
            </div>
        </div>

        <div class="form_box">
            <label>article video</label>
            <input type="text" name="article_video" value="<?php echo $article->article_video; ?>">
        </div>

        <div class="form_box">
            <label>article updated at</label>
            <input type="text" value="<?php echo $article->article_updated_at; ?>" readonly>
        </div>

        <div class="form_box">
            <label>article created at</label>
            <input type="text" value="<?php echo $article->article_created_at; ?>" readonly>
        </div>

        <div class="form_box">
            <input type="hidden" name="article_id" value="<?php echo $article->article_id; ?>" readonly required>
            <input type="hidden" name="image_delete" value="<?php echo $article->article_image; ?>" readonly required>
            <button>update</button>
        </div>
    </form>
    <!--  -->
</div>
