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
                    <th>id</th>
                    <th>article</th>
                    <th>user</th>
                    <th>comment</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data->comment as $comment): ?>
                <tr>
                    <td aria-label='delete'>
                        <a data-del="/panel/comment/delete/<?php echo $comment->comment_id; ?>" class="this-del">
                            <img src="<?php echo SVG1; ?>delete.svg">
                        </a>
                    </td>
                    <td aria-label='id'># <?php echo $comment->comment_id; ?></td>
                    <td aria-label='article'><?php echo $comment->article_id; ?></td>
                    <td aria-label='user'><?php echo $comment->user_login; ?></td>
                    <td aria-label='comment'><?php echo substr($comment->comment_text, 0, 50); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
       

        <!-- paginator -->
        <section id="paginator">
            <div class="paginator_box">
                <a href="/panel/comment/page/1">НАЧАЛО</a>
                <?php \library\pagination::selector($data->page, 'panel/comment/'); ?>
                <a href="/panel/comment/page/<?php echo $data->page->length ? $data->page->length : 1; ?>">КОНЕЦ</a>
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
    
        load_search_form('/panel/comment/search');
    
    });
</script>
