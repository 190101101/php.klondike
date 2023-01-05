<?php $post = $data->post; ?>
<?php $notice = $data->notice; ?>
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
        <!-- <form action="/panel/post/update" method="POST" class="general_form" enctype="multipart/form-data"> -->
        <form data-action="/panel/post/update" class="general_form data_form">
            
            <div class="form_box">
                <label>image</label>
                <input type="file" name="post_image" id="uploadimage" onchange="imageupload()">
            </div>

            <div class="form_box">
                <progress class="tagprogress" id="progressBar" value="0" max="100"></progress>
                <span id="uploadstatus">отчет загруженных файлов</span>
            </div>

            <div class="form_box">
                <label>post title</label>
                <input type="text" name="post_title" value="<?php echo $post->post_title; ?>" required>
            </div>

            <div class="form_box">
                <label>notice</label>
                <select name="notice_id" required>
                    <option value="<?php echo $post->notice_id; ?>">
                        <?php echo $post->notice; ?>
                    </option>
                    <?php foreach($data->notice as $notice): ?>
                        <option value="<?php echo $notice->notice_id; ?>">
                            <?php echo $notice->notice; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form_box">
                <textarea name="post_content" id="editor1"><?php echo $post->post_content; ?></textarea>
                 <script>
                    CKEDITOR.replace( 'editor1' );
                </script>
            </div>

            <div class="form_box">
                <label>post link</label>
                <input type="text" value="<?php echo $post->post_link; ?>">
            </div>

            <div class="form_box">
                <label>post updated at</label>
                <input type="text" value="<?php echo $post->post_updated_at; ?>" readonly>
            </div>

            <div class="form_box">
                <label>post created at</label>
                <input type="text" value="<?php echo $post->post_created_at; ?>" readonly>
            </div>

            <div class="form_box">
                <input type="hidden" name="post_id" value="<?php echo $post->post_id; ?>" readonly required>
                <input type="hidden" name="image_delete" value="<?php echo $post->post_image; ?>" readonly>
                <input type="hidden" name="post_updated_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
                <button>update</button>
            </div>
        </form>
        <!--  -->
    </div>
