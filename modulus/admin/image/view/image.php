<div class="page_content">
    <div class="page_head">
        <?php echo bread_cump(); ?>
    </div>
    <div class="table_content">
        <table class="table-media">
            <thead>
                <tr>
                    <th>id</th>
                    <th>article</th>
                    <th>name</th>
                    <th>image</th>
                    <th>
                        <img src="<?php echo SVG1; ?>delete.svg">
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data->image as $image): ?>
                <tr>
                    <td aria-label='id'># <?php echo $image->image_id; ?></td>
                    <td aria-label='article'><?php echo $image->article_id; ?></td>
                    <td aria-label='name'><?php echo $image->image_image; ?></td>
                    <td aria-label='image'>
                        <img src="<?php echo IMAGES; ?><?php echo $image->image_image; ?>">
                    </td>
                    <td aria-label='delete'>
                        <a data-del="/panel/image/delete/<?php echo $image->image_id; ?>" class="this-del">
                            <img src="<?php echo SVG1; ?>delete.svg">
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
       

        <!-- paginator -->
        <section id="paginator">
            <div class="paginator_box">
                <a href="/panel/image/page/1">НАЧАЛО</a>
                <?php \library\pagination::selector($data->page, 'panel/image/'); ?>
                <a href="/panel/image/page/<?php echo $data->page->length ? $data->page->length : 1; ?>">КОНЕЦ</a>
           </div>
        </section>
        <!-- paginator -->
    </div>
</div>

<script>
    $('.history_btn').on('click', function(){
        close_history();
    });  
    
    $('.search-btn').on('click', function(){
    
        load_search_form('/panel/image/search');
    
    });    
</script>
