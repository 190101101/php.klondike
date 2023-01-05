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
                    <th>login</th>
                    <th>password</th>
                    <th>status</th>
                    <th>level</th>
                    <th>ip</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data->user as $user): ?>
                <tr>
                    <td aria-label='delete'>
                        <a data-del="/panel/user/delete/<?php echo $user->user_id; ?>" class="this-del">
                            <img src="<?php echo SVG1; ?>delete.svg">
                        </a>
                    </td>
                    <td aria-label='update'>
                        <a data-load="/panel/user/update/<?php echo $user->user_id; ?>" class="load_btn"
                            data-id="<?php echo $user->user_id; ?>">
                            <img src="<?php echo SVG1; ?>update.svg">
                        </a>
                    </td>
                    <td aria-label='id'># <?php echo $user->user_id; ?></td>
                    <td aria-label='login'><?php echo $user->user_login; ?></td>
                    <td aria-label='password'><?php echo $user->user_password; ?></td>
                    <td aria-label='status'>
                        <label class="switch">
                        <input type="checkbox" class="this-status" 
                            data-status="/panel/user/status/<?php echo $user->user_id; ?>" 
                            <?php echo $user->user_status == 1 ? 'checked' : NULL; ?> > 
                        <span class="slider round"></span>
                        </label>
                    </td>
                    <td aria-label='level'><?php echo $user->user_level; ?></td>
                    <td aria-label='ip'><?php echo $user->user_ip; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
       
        <!-- paginator -->
        <section id="paginator">
            <div class="paginator_box">
                <a href="/panel/user/page/1">НАЧАЛО</a>
                <?php \library\pagination::selector($data->page, 'panel/user/'); ?>
                <a href="/panel/user/page/<?php echo $data->page->length ? $data->page->length : 1; ?>">КОНЕЦ</a>
           </div>
        </section>
        <!-- paginator -->

    </div>
    
</div>

<script>
    $('.history_btn').on('click', function(){
    
        load_create_form('/panel/user/create');
    
    });  

    $('.search-btn').on('click', function(){
    
        load_search_form('/panel/user/search');
    
    });

</script>
