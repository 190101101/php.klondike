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

    <!-- <form action="/panel/ad/create" method="POST" class="general_form"> -->
    <form data-action="/panel/ad/create" class="general_form data_form">

        <div class="form_box">
            <label>ad title</label>
            <input type="text" name="ad_title" placeholder="ad title" required>
        </div>

        <div class="form_box">
            <label>ad link</label>
            <input type="url" name="ad_link" placeholder="ad link" required>
        </div>

        <div class="form_box">
            <label>ad content</label>
            <input type="text" name="ad_content" placeholder="ad content" required>
        </div>

        <div class="form_box">
            <button>create</button>
        </div>
    
    </form>
    <!--  -->
</div>
