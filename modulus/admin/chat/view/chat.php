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
                    <th>user</th>
                    <th>chat</th>
                    <th>created at</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data->chat as $chat): ?>
                <tr>
                    <td aria-label='delete'>
                        <a data-del="/panel/chat/delete/<?php echo $chat->chat_id; ?>" class="this-del">
                            <img src="<?php echo SVG1; ?>delete.svg">
                        </a>
                    </td>
                    <td aria-label='id'># <?php echo $chat->chat_id; ?></td>
                    <td aria-label='user'><?php echo $chat->user_login; ?></td>
                    <td aria-label='chat'><?php echo $chat->chat_text; ?></td>
                    <td aria-label='created at'><?php echo $chat->chat_created_at; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- paginator -->
        <section id="paginator">
            <div class="paginator_box">
                <a href="/panel/chat/page/1">НАЧАЛО</a>
                <?php \library\pagination::selector($data->page, 'panel/chat/'); ?>
                <a href="/panel/chat/page/<?php echo $data->page->length ? $data->page->length : 1; ?>">КОНЕЦ</a>
           </div>
        </section>
        <!-- paginator -->
    </div>
</div>


<script>
    $('.history_btn').on('click', function(){
    
        load_create_form('/panel/chat/create');
    
    });  

    $('.search-btn').on('click', function(){
    
        load_search_form('/panel/chat/search');
    
    });
</script>
