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
                    <th>title</th>
                    <th>image</th>
                    <th>status</th>
                    <th>created at</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data->notice as $notice): ?>
                <tr>
                    <td aria-label='delete'>
                        <a data-del="/panel/notice/delete/<?php echo $notice->notice_id; ?>" class="this-delete">
                            <img src="<?php echo SVG1; ?>delete.svg">
                        </a>
                    </td>
                    <td aria-label='update'>
                        <a data-load="/panel/notice/update/<?php echo $notice->notice_id; ?>" class="load_btn"
                            data-id="<?php echo $notice->notice_id; ?>">
                            <img src="<?php echo SVG1; ?>update.svg">
                        </a>
                    </td>
                    <td aria-label='id'># <?php echo $notice->notice_id; ?></td>
                    <td aria-label='notice'><?php echo $notice->notice; ?></td>
                    <td aria-label='title'><?php echo $notice->notice_title; ?></td>
                    <td aria-label='image'>
                        <img src="<?php echo IMAGES; ?><?php echo $notice->notice_image; ?>">
                    </td>
                    <td aria-label='status'>
                        <label class="switch">
                        <input type="checkbox" class="this-status" 
                                data-status="/panel/notice/status/<?php echo $notice->notice_id; ?>" 
                            <?php echo $notice->notice_status == 1 ? 'checked' : NULL; ?> > 
                        <span class="slider round"></span>
                        </label>
                    </td>
                    <td aria-label='created at'><?php echo $notice->notice_created_at; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
       

        <!-- paginator -->
        <section id="paginator">
            <div class="paginator_box">
                <a href="/panel/notice/page/1">НАЧАЛО</a>
                <?php \library\pagination::selector($data->page, 'panel/notice/'); ?>
                <a href="/panel/notice/page/<?php echo $data->page->length ? $data->page->length : 1; ?>">КОНЕЦ</a>
           </div>
        </section>
        <!-- paginator -->
    </div>
</div>

<script>
    $('.history_btn').on('click', function(){
    
        load_create_form('/panel/notice/create');
    
    });  

    $('.search-btn').on('click', function(){
    
        load_search_form('/panel/notice/search');
    
    });
</script>
