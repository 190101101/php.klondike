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
        <!-- <form action="/panel/post/create" method="POST" class="general_form" enctype="multipart/form-data"> -->
        <form data-action="/panel/post/create" class="general_form data_form">

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
                <input type="text" name="post_title" placeholder="post title" required>
            </div>

            <div class="form_box">
                <label>notice</label>
                <select name="notice_id" required>
                    <?php foreach($data->notice as $notice): ?>
                        <option value="<?php echo $notice->notice_id; ?>"><?php echo $notice->notice; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form_box">
                <textarea name="post_content" id="editor1"></textarea>
                 <script>
                    CKEDITOR.replace( 'editor1' );
                </script>
            </div>

            <div class="form_box">
                <label>post link</label>
                <input type="text" name="post_link" placeholder="post link">
            </div>      


            <div class="form_box">
                <button>create</button>
            </div>

        </form>
        <!--  -->
    </div>
