<?php $guest_last = $data->guest_last; ?>
<div class="page_content">
    <div class="page_head">
        <?php echo bread_cump(); ?>
    </div>
    <div class="table_content">
        <table class="table-media">
            <thead>
                <tr>
                     <th aria-label='delete'>
                        <img src="<?php echo SVG1; ?>delete.svg">
                    </th>
                    <th>
                        <img src="<?php echo SVG1; ?>update.svg">
                    </th>
                    <th>id</th>
                    <th>ip address</th>
                    <?php if($guest_last != false): ?>
                    <th aria-label='status'>
                        <label class="switch">
                        <input type="checkbox" data-get="/panel/guest/status" class="data-get"
                            <?php echo $guest_last->guest_status == 1 ? 'checked' : NULL; ?> > 
                        <span class="slider round"></span>
                        </label>
                    </th>
                    <?php else: ?>
                    <th aria-label='status'>
                        <label class="switch">
                            <input type="checkbox" data-get="/panel/guest/status" class="data-get" checked disabled>
                            <span class="slider round"></span>
                        </label>
                    </th>
                    <?php endif; ?>
                    <th>type</th>
                    <th>mode</th>
                    <th>created at</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data->guest as $guest): ?>
                <tr>
                    <td aria-label='delete'>
                        <a data-del="/panel/guest/delete/<?php echo $guest->guest_id; ?>" 
                            class="this-del">
                            <img src="<?php echo SVG1; ?>delete.svg">
                        </a>
                    </td>
                    <td aria-label='read'>
                        <a data-load="/panel/guest/read/<?php echo $guest->guest_id; ?>" 
                            class="load_btn" data-id="<?php echo $article->article_id; ?>">
                            <img src="<?php echo SVG1; ?>update.svg">
                        </a>
                    </td>
                    <td aria-label='id'># <?php echo $guest->guest_id; ?></td>
                    <td aria-label='ip address'><?php echo $guest->guest_ip; ?></td>
                    <td aria-label='status'>
                        <label class="switch">
                        <input type="checkbox" disabled
                            <?php echo $guest->guest_status == 1 ? 'checked' : NULL; ?> > 
                        <span class="slider round"></span>
                        </label>
                    </td>
                    <td aria-label='type'><?php echo $guest->guest_type; ?></td>
                    <td aria-label='mode'><?php echo $guest->guest_mode; ?></td>
                    <td aria-label='created at'><?php echo $guest->guest_created_at; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- paginator -->
        <section id="paginator">
            <div class="paginator_box">
                <a href="/panel/guest/page/1">НАЧАЛО</a>
                <?php \library\pagination::selector($data->page, 'panel/guest/'); ?>
                <a href="/panel/guest/page/<?php echo $data->page->length ? $data->page->length : 1; ?>">КОНЕЦ</a>
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
    
        load_search_form('/panel/guest/search');
    
    });    
</script>
