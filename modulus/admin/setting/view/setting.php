<div class="page_content">
    <div class="page_head">
        <?php echo bread_cump(); ?>
    </div>
    <div class="table_content">
        <table class="table-media">
            <thead>
                <tr>
                    <th>
                        <img src="<?php echo SVG1; ?>update.svg">
                    </th>
                    <th>id</th>
                    <th>description</th>
                    <th>key</th>
                    <th>value</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data->setting as $setting): ?>
                <tr>
                    <td aria-label='update'>
                        <a data-load="/panel/setting/update/<?php echo $setting->setting_id; ?>" 
                            class="load_btn"
                            data-id="<?php echo $setting->setting_id; ?>">
                            <img src="<?php echo SVG1; ?>update.svg">
                        </a>
                    </td>
                    <td aria-label='id'>#<?php echo $setting->setting_id; ?></td>
                    <td aria-label='description'><?php echo $setting->setting_description; ?></td>
                    <td aria-label='key'><?php echo $setting->setting_key; ?></td>
                    <td aria-label='value'><?php echo substr($setting->setting_value, 0, 50); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- paginator -->
        <section id="paginator">
            <div class="paginator_box">
                <a href="/panel/setting/page/1">НАЧАЛО</a>
                <?php \library\pagination::selector($data->page, 'panel/setting/'); ?>
                <a href="/panel/setting/page/<?php echo $data->page->length ? $data->page->length : 1; ?>">КОНЕЦ</a>
           </div>
        </section>
        <!-- paginator -->
    </div>
</div>

<script>
    $('.history_btn').on('click', function(){
        close_history();
    });  
</script>