<!-- content -->
<div class="page-container">
    <div class="category-content">
        <div class="card">
            <img class="card-img" src="<?php echo IMAGE ?>category_bg.jpg">
            <div class="card-img-overlay">
                <div class="post-content-title-info">
                    <div class="post-content-title-box">
                        <img src="<?php echo SVG1; ?>search.svg" class="cat-title-img">
                        <span class="post-content-title">вы искали : <?php echo $data->search['search']; ?></span>
                    </div>
                    <div class="post-content-category-count">
                        <span>в этом категории</span>
                        <span><?php echo count($data->article); ?></span>
                        <span>постов </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="block">
        <?php foreach($data->article as $article): ?>
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
                                            <img src="<?php echo SVG1; ?>flame.svg">
                                            <img src="<?php echo SVG1; ?>flame.svg">
                                        </span>
                                        <span><?php echo $article->category; ?></span>
                                    </div>
                                    <div class="box">
                                        <div>
                                            <span>
                                                <img src="<?php echo SVG1; ?>down.svg">
                                            </span>
                                            <span class="levin"><?php echo $article->article_download; ?></span>
                                            <span>скачиваний</span>
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
                                <?php if(!empty($article->article_archivesize)): ?>
                                <a href="/article/<?php echo $article->section_slug; ?>/<?php echo $article->category_slug; ?>/<?php echo $article->article_slug; ?>"><span>скачать <span><?php echo $article->article_archivesize; ?></span></a>
                                <?php endif; ?>
                                <a href="/article/<?php echo $article->section_slug; ?>/<?php echo $article->category_slug; ?>/<?php echo $article->article_slug; ?>">подробное</a>
                            </div>
                            <!--  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>
<!-- content -->
