<?php $voting = $data->voting; ?>
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
    <form data-action="/panel/voting/update" class="general_form data_form">
    <!-- <form class="general_form" action="/panel/voting/update" method="POST"> -->

        <div class="form_box">
            <label>voting content</label>
            <input type="text" name="voting_content" value="<?php echo $voting->voting_content; ?>" required>
        </div>

        <div class="form_box">
            <label>option a</label>
            <input type="text" name="voting_option_a" value="<?php echo $voting->voting_option_a; ?>" required>
        </div>

        <div class="form_box">
            <label>option b</label>
            <input type="text" name="voting_option_b" value="<?php echo $voting->voting_option_b; ?>" required>
        </div>

        <div class="form_box">
            <label>vote count a</label>
            <input type="text" name="voting_vote_count_a" value="<?php echo $voting->voting_vote_count_a; ?>" required>
        </div>

        <div class="form_box">
            <label>vote count b</label>
            <input type="text" name="voting_vote_count_b" value="<?php echo $voting->voting_vote_count_b; ?>" required>
        </div>

        <div class="form_box">
            <label>vote count total</label>
            <input type="text" name="voting_vote_count_total" value="<?php echo $voting->voting_vote_count_total; ?>" readonly>
        </div>

        <div class="form_box">
            <label>voting vote percent a</label>
            <input type="text" name="voting_vote_percent_a" value="<?php echo $voting->voting_vote_percent_a; ?>" readonly>
        </div>

        <div class="form_box">
            <label>voting vote percent b</label>
            <input type="text" name="voting_vote_percent_b" value="<?php echo $voting->voting_vote_percent_b; ?>" readonly>
        </div>

        <div class="form_box">
            <select name="voting_type" required>
                <option value="<?php echo $voting->voting_type; ?>" selected><?php echo $voting->voting_type; ?></option>
                <option value="main">main</option>
                <option value="simple">simple</option>
            </select>
        </div>

        <div class="form_box">
            <input type="color" name="voting_color" value="#FF1493" required>
        </div>

        <div class="form_box">
            <label>voting updated at</label>
            <input type="text" value="<?php echo $voting->voting_updated_at; ?>" readonly>
        </div>

        <div class="form_box">
            <label>voting created at</label>
            <input type="text" value="<?php echo $voting->voting_created_at; ?>" readonly>
        </div>

        <div class="form_box">
            <input type="hidden" name="voting_id" value="<?php echo $voting->voting_id; ?>" readonly required>
            <button>update</button>
        </div>
    
    </form>
    <!--  -->
</div>

    