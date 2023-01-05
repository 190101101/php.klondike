<div class="page_content">
    <div class="page_head">
        <?php echo bread_cump(); ?>
    </div>
    <div class="table_content">
        <table class="table-media">
            <thead>
                <tr>
                    <th>
                        <img src="<?php echo SVG1; ?>delete.svg">
                    </th>
                    <th>
                        <img src="<?php echo SVG1; ?>update.svg">
                    </th>
                    <th>id</th>
                    <th>title</th>
                    <th>link</th>
                    <th>content</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data->ad as $ad): ?>
                <tr>
                    <td aria-label='delete'>
                        <a data-del="/panel/ad/delete/<?php echo $ad->ad_id; ?>" class="this-del">
                            <img src="<?php echo SVG1; ?>delete.svg">
                        </a>
                    </td>
                    <td aria-label='update'>
                        <a data-load="/panel/ad/update/<?php echo $ad->ad_id; ?>" class="load_btn" 
                            data-id="<?php echo $ad->ad_id; ?>">
                            <img src="<?php echo SVG1; ?>update.svg">
                        </a>
                    </td>
                    <td aria-label='id'># <?php echo $ad->ad_id; ?></td>
                    <td aria-label='title'><?php echo substr($ad->ad_title, 0, 30); ?></td>
                    <td aria-label='link'>
                        <a href="<?php echo $ad->ad_link; ?>"><?php echo substr($ad->ad_link, 0, 30); ?></a>
                    </td>
                    <td aria-label='content'><?php echo substr($ad->ad_content, 0, 50); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
       

        <!-- paginator -->
        <section id="paginator">
            <div class="paginator_box">
                <a href="/panel/ad/page/1">НАЧАЛО</a>
                <?php \library\pagination::selector($data->page, 'panel/ad/'); ?>
                <a href="/panel/ad/page/<?php echo $data->page->length ? $data->page->length : 1; ?>">КОНЕЦ</a>
           </div>
        </section>
        <!-- paginator -->
    </div>
</div>

<script>
    $('.history_btn').on('click', function(){
    
        load_create_form('/panel/ad/create');
    
    });  

    $('.search-btn').on('click', function(){
    
        load_search_form('/panel/ad/search');
    
    });

</script>
