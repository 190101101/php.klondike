<div class="page_head">
    <?php echo bread_cump(); ?>
</div>
<div class="table_content">
    <!-- <form action="/panel/post/search" method="POST" class="general_form" style="padding-bottom: 7px;"> -->
    <form data-post="/panel/post/search" class="general_form data_post" style="padding-bottom: 7px;">
        <div class="form_box">
            <input type="text" name="search" placeholder="Что ищем?...вкладки, chrome,psd">
        </div>
    </form>

    <table class="table-media horizontal">
        <thead>
            <tr>
                <th>
                    <img src="<?php echo SVG1; ?>delete.svg">
                </th>
                <th>
                    <img src="<?php echo SVG1; ?>update.svg">
                </th>
                <th>id</th>
                <th>notice</th>
                <th>image</th>
                <th>title</th>
                <th>status</th>
                <th>link</th>
            </tr>
        </thead>
        <tbody class="search_table"></tbody>
    </table>

</div>

