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
                    <th>content</th>
                    <th>count a</th>
                    <th>count b</th>
                    <th>count total</th>
                    <th>option a</th>
                    <th>option b</th>
                    <th>status</th>
                    <th>type</th>
                  
                </tr>
            </thead>
            <tbody>
                <?php foreach($data->voting as $voting): ?>
                <tr>
                    <td aria-label='delete'>
                        <a data-del="/panel/voting/delete/<?php echo $voting->voting_id; ?>" class="this-delete">
                            <img src="<?php echo SVG1; ?>delete.svg">
                        </a>
                    </td>
                    <td aria-label='update'>
                        <a data-load="/panel/voting/update/<?php echo $voting->voting_id; ?>" 
                            class="load_btn" data-id="<?php echo $voting->voting_id; ?>">
                            <img src="<?php echo SVG1; ?>update.svg">
                        </a>
                    </td>
                    <td aria-label='id'># <?php echo $voting->voting_id; ?></td>
                    <td aria-label='content'><?php echo $voting->voting_content; ?></td>
                    <td aria-label='count a'><?php echo $voting->voting_vote_count_a; ?></td>
                    <td aria-label='count b'><?php echo $voting->voting_vote_count_b; ?></td>
                    <td aria-label='count total'><?php echo $voting->voting_vote_count_total; ?></td>
                    <td aria-label='option a'><?php echo $voting->voting_option_a; ?></td>
                    <td aria-label='option b'><?php echo $voting->voting_option_b; ?></td>
                    <td aria-label='status'>
                        <label class="switch">
                        <input type="checkbox" class="this-status" 
                            data-status="/panel/voting/status/<?php echo $voting->voting_id; ?>" 
                            <?php echo $voting->voting_status == 1 ? 'checked' : NULL; ?> > 
                        <span class="slider round"></span>
                        </label>
                    </td>
                    <td aria-label='type'><?php echo $voting->voting_type; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- paginator -->
        <section id="paginator">
            <div class="paginator_box">
                <a href="/panel/voting/page/1">НАЧАЛО</a>
                <?php \library\pagination::selector($data->page, 'panel/voting/'); ?>
                <a href="/panel/voting/page/<?php echo $data->page->length ? $data->page->length : 1; ?>">КОНЕЦ</a>
           </div>
        </section>
        <!-- paginator -->
    </div>
</div>


<script>
    $('.history_btn').on('click', function(){
    
        load_create_form('/panel/voting/create');
    
    });  
</script>
