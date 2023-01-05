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
    <!-- <form action="/panel/section/create" method="POST" class="general_form"> -->
    <form data-action="/panel/section/create" class="general_form data_form">

        <div class="form_box">
            <label>section</label>
            <input type="text" name="section" placeholder="section" required>
        </div>

        <div class="form_box">
            <label>section title</label>
            <input type="text" name="section_title" placeholder="section title" required>
        </div>

        <div class="form_box">
            <label>icon</label>
            <select name="section_icon" required>
                <?php foreach(svg_list() as $icon): ?>
                    <option value="<?php echo $icon; ?>"><?php echo $icon; ?></option>
                <?php endforeach; ?>
            </select>
        </div>


        <div class="form_box">
            <button>create</button>
        </div>

    </form>
    <!--  -->
</div>
