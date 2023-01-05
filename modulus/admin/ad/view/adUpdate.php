<?php $ad = $data->ad; ?>
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
        <!-- <form action="/panel/ad/update" method="POST" class="general_form"> -->
        <form class="general_form update_form" data-action="/panel/ad/update">

            <div class="form_box">
                <label>ad title</label>
                <input type="text" name="ad_title" value="<?php echo $ad->ad_title; ?>" required>
            </div>

            <div class="form_box">
                <label>ad link</label>
                <input type="url" name="ad_link" value="<?php echo $ad->ad_link; ?>" required>
            </div>

            <div class="form_box">
                <label>ad content</label>
                <input type="text" name="ad_content" value="<?php echo $ad->ad_content; ?>" required>
            </div>

            <div class="form_box">
                <input type="hidden" name="ad_id" value="<?php echo $ad->ad_id; ?>" required>
                <button>update</button>
            </div>
        
        </form>
        <!--  -->
    </div>
