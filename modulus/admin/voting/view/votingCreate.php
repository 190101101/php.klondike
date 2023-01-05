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
    <!-- <form action="/panel/voting/create" method="POST" class="general_form"> -->
    <form data-action="/panel/voting/create" class="general_form data_form">

        <div class="form_box">
            <label>voting content</label>
            <input type="text" name="voting_content" placeholder="voting content" required>
        </div>

        <div class="form_box">
            <label>option a</label>
            <input type="text" name="voting_option_a" placeholder="option a" required>
        </div>

        <div class="form_box">
            <label>option b</label>
            <input type="text" name="voting_option_b" placeholder="option b" required>
        </div>

        <div class="form_box">
            <select name="voting_type">
                <option value="simple">simple</option>
                <option value="main">main</option>
            </select>
        </div>

        <div class="form_box">
            <input type="color" name="voting_color" value="#FF1493" required>
        </div>

        <div class="form_box">
            <button>create</button>
        </div>
    
    </form>
    <!--  -->
</div>
