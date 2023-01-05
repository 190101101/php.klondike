<!-- content -->
<div class="page-container">
    <div class="category-content">
        <div class="card">
            <img class="card-img" src="<?php echo IMAGE ?>category_bg.jpg">
            <div class="card-img-overlay">
                <div class="post-content-title-info">
                    <div class="post-content-title-box">
                        <img src="<?php echo SVG1; ?>category.svg" class="cat-title-img">
                        <span class="post-content-title"> all categories </span> 
                    </div>
                    <div class="post-content-category-count">
                        <span>in the database</span>
                        <span>10</span>
                        <span>categories</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="block">
        <?php while($category = $data->category->fetch(PDO::FETCH_OBJ)): ?>
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <div class="card_image_box">
                        <img src="<?php echo IMAGES; ?><?php echo $category->category_image; ?>">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card_content">
                        <div class="card_body">
                            <div class="card_head">
                                <div>
                                    <a href="/category/<?php echo $category->section_slug; ?>/<?php echo $category->category_slug; ?>" class="card_title"><?php echo $category->category_title; ?></a>
                                </div>
                                <div class="card_head_info">
                                    <div class="box">
                                        <span><?php echo date_ymd($category->category_created_at); ?></span>
                                    </div>
                                    <div class="box">
                                        <span>
                                            <img src="<?php echo SVG1; ?><?php echo $category->category_icon; ?>">
                                            <img src="<?php echo SVG1; ?><?php echo $category->category_icon; ?>">
                                        </span>
                                        <span><?php echo $category->category; ?></span>
                                    </div>
                                    <div class="box">
                                        <div>
                                            <span>
                                                <img src="<?php echo SVG1; ?>down.svg">
                                            </span>
                                            <span><?php echo db()->t1wherecount('article', 'article_id', 'article_status=1 AND category_id=?', [$category->category_id])->count; ?></span>
                                            <span>статьи</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card_text_box">
                                <span><?php echo remove_tags(substr($category->category_content, 0, 425)); ?></span>
                            </div>
                        </div>
                        <div class="card_footer">
                            <div class="card_button_group">
                                <a href="/category/<?php echo $category->section_slug; ?>/<?php echo $category->category_slug; ?>">detailed</a>
                            </div>
                            <!--  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>

     <!-- paginator -->
    <?php if($data->page->count > 0): ?>
    <section id="paginator">
        <div class="title_box">
            <span>pages</span>
            <hr>
        </div>
        <div class="paginator_box">
            <a href="/category/page/1">START</a>
            <?php \library\pagination::selector($data->page, 'category/'); ?>
            <a href="/category/page/<?php echo $data->page->length ? $data->page->length : 1; ?>">END</a>
       </div>
    </section>
    <?php endif; ?>
    <!-- paginator -->

</div>

<!-- content -->
