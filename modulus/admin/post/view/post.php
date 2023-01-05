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
                    <th>notice</th>
                    <th>image</th>
                    <th>title</th>
                    <th>status</th>
                    <th>link</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data->post as $post): ?>
                <tr>
                    <td aria-label='delete'>
                        <a data-del="/panel/post/delete/<?php echo $post->post_id; ?>" class="this-delete">
                            <img src="<?php echo SVG1; ?>delete.svg">
                        </a>
                    </td>
                    <td aria-label='update'>
                        <a data-load="/panel/post/update/<?php echo $post->post_id; ?>" class="load_btn"
                            data-id="<?php echo $post->post_id; ?>">
                            <img src="<?php echo SVG1; ?>update.svg">
                        </a>
                    </td>
                    <td aria-label='id'># <?php echo $post->post_id; ?></td>
                    <td aria-label='notice'><?php echo $post->notice; ?></td>
                    <td aria-label='image'>
                        <img src="<?php echo IMAGES; ?>/<?php echo $post->post_image; ?>">
                    </td>
                    <td aria-label='title'><?php echo substr($post->post_title, 0, 30); ?></td>
                    <td aria-label='status'>
                        <label class="switch">
                        <input type="checkbox" class="this-status" 
                            data-status="/panel/post/status/<?php echo $post->post_id; ?>" 
                            <?php echo $post->post_status == 1 ? 'checked' : NULL; ?> > 
                        <span class="slider round"></span>
                        </label>
                    </td>
                    <td aria-label='link'><?php echo substr($post->post_link, 0, 30); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <!-- paginator -->
        <section id="paginator">
            <div class="paginator_box">
                <a href="/panel/post/page/1">НАЧАЛО</a>
                <?php \library\pagination::selector($data->page, 'panel/post/'); ?>
                <a href="/panel/post/page/<?php echo $data->page->length ? $data->page->length : 1; ?>">КОНЕЦ</a>
           </div>
        </section>
        <!-- paginator -->
    </div>
</div>

<script>
    $('.history_btn').on('click', function(){
    
        load_create_form('/panel/post/create');
    
    });  


    $('.search-btn').on('click', function(){
    
        load_search_form('/panel/post/search');
    
    });
</script>
