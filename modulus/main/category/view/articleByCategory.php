<!-- content -->
<?php $category = $data->category; ?>
<div class="page-container">
    <div class="category-content">
        <div class="card">
            <img class="card-img" src="<?php echo IMAGES ?><?php echo $category->category_image; ?>">
            <div class="card-img-overlay">
                <div class="post-content-title-info">
                    <div class="post-content-title-box">
                        <img src="<?php echo SVG1; ?>flame.svg" class="cat-title-img">
                        <span class="post-content-title"><?php echo $category->category; ?></span>
                    </div>
                    <div class="post-content-category-count">
                        <span>there are</span>
                        <span><?php echo $data->page->count; ?></span>
                        <span>posts in this category</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="block">
        <?php while($article = $data->article->fetch(PDO::FETCH_OBJ)): ?>
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <div class="card_image_box">
                        <img src="<?php echo IMAGES; ?><?php echo $article->article_image; ?>">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card_content">
                        <div class="card_body">
                            <div class="card_head">
                                <div>
                                    <a href="/article/<?php echo $article->section_slug; ?>/<?php echo $article->category_slug; ?>/<?php echo $article->article_slug; ?>" class="card_title">
                                        <?php echo $article->article_title; ?>
                                    </a>
                                </div>
                                <div class="card_head_info">
                                    <div class="box">
                                        <span><?php echo date_ymd($article->article_created_at); ?></span>
                                    </div>
                                    <div class="box">
                                        <span>
                                            <img src="<?php echo SVG1; ?><?php echo $article->category_icon; ?>">
                                            <img src="<?php echo SVG1; ?><?php echo $article->category_icon; ?>">
                                        </span>
                                        <span><?php echo $article->category; ?></span>
                                    </div>
                                    <div class="box">
                                        <div>
                                            <span>
                                                <img src="<?php echo SVG1; ?>down.svg">
                                            </span>
                                            <span class="levin"><?php echo $article->article_download; ?></span>
                                            <span>downloads</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card_text_box">
                                <span><?php echo remove_tags(substr($article->article_content, 0, 425)); ?></span>
                            </div>
                        </div>
                        <div class="card_footer">
                            <div class="card_button_group">
                                <?php if($article->article_archivesize != FALSE): ?>
                                <a href="/article/<?php echo $article->section_slug; ?>/<?php echo $article->category_slug; ?>/<?php echo $article->article_slug; ?>">download <span><?php echo $article->article_archivesize; ?></span></a>
                                <?php endif; ?>
                                <a href="/article/<?php echo $article->section_slug; ?>/<?php echo $article->category_slug; ?>/<?php echo $article->article_slug; ?>">detailed</a>
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
            <a href="/category/<?php echo $category->section_slug; ?>/<?php echo $category->category_slug; ?>/page/1">START</a>
            <?php \library\pagination::selector($data->page, "category/{$category->section_slug}/{$category->category_slug}/"); ?>
            <a href="/category/<?php echo $category->section_slug; ?>/<?php echo $category->category_slug; ?>/page/<?php echo $data->page->length ? $data->page->length : 1; ?>">END</a>
       </div>
    </section>
    <?php endif; ?>
    <!-- paginator -->
</div>
<!-- content -->
