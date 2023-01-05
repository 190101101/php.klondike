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
        <!-- <form action="/panel/notice/update" method="POST" class="general_form" enctype="multipart/form-data"> -->
        <form data-action="/panel/notice/update" class="general_form data_form">

            <div class="form_box">
                <input type="file" name="notice_image" id="uploadimage" onchange="imageupload()">
            </div>

            <div class="form_box">
                <progress class="tagprogress" id="progressBar" value="0" max="100"></progress>
                <span id="uploadstatus">отчет загруженных файлов</span>
            </div>

            <div class="form_box">
                <label>notice</label>
                <input type="text" name="notice" value="<?php echo $notice->notice; ?>" required>
            </div>

            <div class="form_box">
                <label>notice title</label>
                <input type="text" name="notice_title" value="<?php echo $notice->notice_title; ?>" required>
            </div>

            <div class="form_box">
                <label>notice updated at</label>
                <input type="text" value="<?php echo $notice->notice_updated_at; ?>" readonly>
            </div>

            <div class="form_box">
                <label>notice created at</label>
                <input type="text" value="<?php echo $notice->notice_created_at; ?>" readonly>
            </div>

            <div class="form_box">
                <input type="hidden" name="notice_id" value="<?php echo $notice->notice_id; ?>" readonly required>
                <input type="hidden" name="image_delete" value="<?php echo $notice->notice_image; ?>" readonly>
                <input type="hidden" name="notice_updated_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
                <button>update</button>
            </div>
        </form>
        <!--  -->
    </div>
