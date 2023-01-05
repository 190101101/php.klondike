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
                    <th>section</th>
                    <th>title</th>
                    <th>status</th>
                    <th>created at</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data->section as $section): ?>
                <tr>
                    <td aria-label='delete'>
                        <a data-del="/panel/section/delete/<?php echo $section->section_id > 4 ? $section->section_id : 0; ?>"
                            class="this-delete">                            
                            <img src="<?php echo SVG1; ?>delete.svg">
                        </a>
                    </td>
                    <td aria-label='update'>
                        <a data-load="/panel/section/update/<?php echo $section->section_id; ?>" class="load_btn"
                            data-id="<?php echo $section->section_id; ?>">
                            <img src="<?php echo SVG1; ?>update.svg">
                        </a>
                    </td>
                    <td aria-label='id'># <?php echo $section->section_id; ?></td>
                    <td aria-label='section'>
                        <a href="/panel/category/section/<?php echo $section->section_slug; ?>/page/1">
                            <?php echo $section->section; ?>
                        </a>
                    </td>
                    <td aria-label='title'><?php echo $section->section_title; ?></td>
                    <td aria-label='status'>
                        <label class="switch">
                        <input type="checkbox" class="this-status" 
                            data-status="/panel/section/status/<?php echo $section->section_id; ?>" 
                            <?php echo $section->section_status == 1 ? 'checked' : 0; ?> > 
                        <span class="slider round"></span>
                        </label>
                    </td>
                    <td aria-label='created at'><?php echo $section->section_created_at; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
       

        <!-- paginator -->
        <section id="paginator">
            <div class="paginator_box">
                <a href="/panel/section/page/1">НАЧАЛО</a>
                <?php \library\pagination::selector($data->page, 'panel/section/'); ?>
                <a href="/panel/section/page/<?php echo $data->page->length ? $data->page->length : 1; ?>">КОНЕЦ</a>
           </div>
        </section>
        <!-- paginator -->
    </div>
</div>

<script>
    $('.history_btn').on('click', function(){
    
        load_create_form('/panel/section/create');
    
    }); 

    $('.search-btn').on('click', function(){
    
        load_search_form('/panel/section/search');
    
    }); 
</script>
