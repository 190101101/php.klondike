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
                    <th>image</th>
                    <th>comment</th>
                    <th>id</th>
                    <th>category</th>
                    <th>image</th>
                    <th>title</th>
                    <th>status</th>
                    <th>view</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data->article as $article): ?>
                <tr>
                    <td aria-label='delete'>
                        <a data-del="/panel/article/delete/<?php echo $article->article_id; ?>" 
                            class="this-delete">
                            <img src="<?php echo SVG1; ?>delete.svg">
                        </a>
                    </td>
                    <td aria-label='update'>
                        <a data-load="/panel/article/update/<?php echo $article->article_id; ?>" 
                            class="load_btn"
                            data-id="<?php echo $article->article_id; ?>">
                            <img src="<?php echo SVG1; ?>update.svg">
                        </a>
                    </td>
                    <td aria-label='images'>
                        <a data-load="/panel/image/article/<?php echo $article->article_id; ?>" 
                            class="load_btn"
                            data-id="<?php echo $article->article_id; ?>">
                            <img src="<?php echo SVG1; ?>file.svg">
                        </a>
                    </td>
                    <td aria-label='comment'>
                        <a data-load="/panel/comment/article/<?php echo $article->article_id; ?>" class="load_btn">
                            <img src="<?php echo SVG1; ?>comment.svg">
                        </a>
                    </td>
                    <td aria-label='id'># <?php echo $article->article_id; ?></td>
                    <td aria-label='category'>
                        <a href="/category/<?php echo $article->section_slug; ?>/<?php echo $article->category_slug; ?>">
                            <?php echo $article->category; ?>
                        </a>
                    </td>
                    <td aria-label='image'>
                        <img src="<?php echo IMAGES; ?>/<?php echo $article->article_image; ?>">
                    </td>
                    <td aria-label='title'><?php echo substr($article->article_title, 0, 30); ?></td>
                    <td aria-label='status'>
                        <label class="switch">
                        <input type="checkbox" class="this-status" 
                            data-status="/panel/article/status/<?php echo $article->article_id; ?>" 
                            <?php echo $article->article_status == 1 ? 'checked' : NULL; ?> > 
                        <span class="slider round"></span>
                        </label>
                    </td>
                    <td aria-label='view'>
                        <a href="/article/<?php echo $article->section_slug; ?>/<?php echo $article->category_slug; ?>/<?php echo $article->article_slug; ?>" target="_blank">
                            <img src="<?php echo SVG1; ?>link.svg">
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <!-- paginator -->
        <section id="paginator">
            <div class="paginator_box">
                <a href="/panel/article/page/1">НАЧАЛО</a>
                <?php \library\pagination::selector($data->page, 'panel/article/'); ?>
                <a href="/panel/article/page/<?php echo $data->page->length ? $data->page->length : 1; ?>">КОНЕЦ</a>
           </div>
        </section>
        <!-- paginator -->
    </div>
</div>


<script>
    $('.history_btn').on('click', function(){
    
        load_create_form('/panel/article/create');
    
    });  

    $('.search-btn').on('click', function(){
    
        load_search_form('/panel/article/search');
    
    });    
</script>

