<?php $section = $data->section; ?>
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
                    <th>category</th>
                    <th>image</th>
                    <th>title</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data->category as $category): ?>
                <tr>
                    <td aria-label='delete'>
                        <a data-del="/panel/category/delete/<?php echo $category->category_id; ?>"
                            class="this-delete">
                            <img src="<?php echo SVG1; ?>delete.svg">
                        </a>
                    </td>
                    <td aria-label='update'>
                        <a data-load="/panel/category/update/<?php echo $category->category_id; ?>" class="load_btn">
                            <img src="<?php echo SVG1; ?>update.svg">
                        </a>
                    </td>
                    <td aria-label='id'># <?php echo $category->category_id; ?></td>
                    <td aria-label='category'>
                        <a href="/panel/article/category/<?php echo $category->section_slug; ?>/<?php echo $category->category_slug; ?>">
                            <?php echo $category->category; ?>
                        </a>
                    </td>
                    <td aria-label='image'>
                        <img src="<?php echo IMAGES; ?>/<?php echo $category->category_image; ?>">
                    </td>
                    <td aria-label='title'><?php echo substr($category->category_title, 0, 30); ?></td>
                    <td aria-label='status'>
                        <label class="switch">
                        <input type="checkbox" class="this-status" 
                            data-status="/panel/category/status/<?php echo $category->category_id; ?>" 
                            <?php echo $category->category_status == 1 ? 'checked' : NULL; ?>
                             > 
                        <span class="slider round"></span>
                        </label>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <!-- paginator -->
        <section id="paginator">
            <div class="paginator_box">
                <a href="/panel/category/section/<?php echo $section->section; ?>/page/1">НАЧАЛО</a>
                <?php \library\pagination::selector($data->page, "panel/category/section/{$section->section}/"); ?>
                <a href="/panel/category/section/<?php echo $section->section; ?>/page/<?php echo $data->page->length ? $data->page->length : 1; ?>">КОНЕЦ</a>
           </div>
        </section>
        <!-- paginator -->
    </div>
</div>


<script>
    $('.history_btn').on('click', function(){
    
        load_create_form('/panel/category/create');
    
    });  

    $('.search-btn').on('click', function(){
    
        load_search_form('/panel/category/search');
    
    });
</script>
