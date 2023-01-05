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
        <!-- <form action="/panel/user/create" method="POST" class="general_form"> -->
        <form data-action="/panel/user/create" class="general_form data_form">

            <div class="form_box">
                <label>user login</label>
                <input type="text" name="user_login" placeholder="user login" required>
            </div>

            <div class="form_box">
                <label>user password</label>
                <input type="text" name="user_password" placeholder="user password" required>
            </div>

            <div class="form_box">
                <label>user level</label>
                <input type="number" min="1" max="7" name="user_level" value="1" required>
            </div>

            <div class="form_box">
                <input type="color" name="user_color" value="#FFFFFF" required>
            </div>

            <div class="form_box">
                <button>create</button>
            </div>
        
        </form>
        <!--  -->
    </div>
