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

    <form data-action="/panel/chat/create" class="general_form data_form">

        <div class="form_box">
            <textarea name="chat_text" class="middle" autofocus placeholder="send message"></textarea>
        </div>

        <div class="form_box">
            <button>create</button>
        </div>
    
    </form>
    <!--  -->
</div>
