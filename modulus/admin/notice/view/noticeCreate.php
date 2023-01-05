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
        <!-- <form action="/panel/notice/create" method="POST" class="general_form" enctype="multipart/form-data"> -->
        <form data-action="/panel/notice/create" class="general_form data_form">

            <div class="form_box">
                <input type="file" name="notice_image" id="uploadimage" onchange="imageupload()">
            </div>

            <div class="form_box">
                <progress class="tagprogress" id="progressBar" value="0" max="100"></progress>
                <span id="uploadstatus">отчет загруженных файлов</span>
            </div>


            <div class="form_box">
                <label>notice</label>
                <input type="text" name="notice" placeholder="notice" required>
            </div>

            <div class="form_box">
                <label>notice title</label>
                <input type="text" name="notice_title" placeholder="notice title" required>
            </div>

            <div class="form_box">
                <label>notice subtitle</label>
                <input type="text" name="notice_subtitle" placeholder="notice subtitle" required>
            </div>

            <div class="form_box">
                <button>create</button>
            </div>

        </form>
        <!--  -->
    </div>
