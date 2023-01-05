<div class="page-container">
    <div class="container-title-box">
        <span>NEW MATERIALS</span>
        <hr class="page-hr">
    </div>

    <!-- block -->
    <form action="/search" method="POST" class="search-box-content">
        <input type="text" name="search" class="search-txt" placeholder="Что ищем?...вкладки, chrome,psd" title="Разрешено использовать только латинские буквы и цифры" minlength="3" maxlength="20">
        <button id="search_href" class="search-btn">
         <img src="<?php echo SVG1; ?>search.svg" class="nav-search-icon">
        </button>
    </form>

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
                                    <a href="/article/<?php echo $article->section_slug; ?>/<?php echo $article->category_slug; ?>/<?php echo seo($article->article_slug); ?>" class="card_title">
                                        <?php echo $article->article_title; ?>
                                    </a>
                                </div>
                                <div class="card_head_info">
                                    <div class="box">
                                        <span>
                                            <?php echo date_ymd($article->article_created_at); ?>
                                        </span>
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
                                <?php if(!empty($article->article_archivesize)): ?>
                                <a href="/article/<?php echo $article->section_slug; ?>/<?php echo $article->category_slug; ?>/<?php echo $article->article_slug; ?>">download<span><?php echo $article->article_archivesize; ?></span>
                                </a>
                                <?php endif; ?>
                                <a href="/article/<?php echo $article->section_slug; ?>/<?php echo $article->category_slug; ?>/<?php echo seo($article->article_slug); ?>">detailed</a>
                            </div>
                            <!--  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <!-- block -->


     <!-- paginator -->
    <?php if($data->page->count > 0): ?>
    <section id="paginator">
        <div class="title_box">
            <span>pages</span>
            <hr>
        </div>
        <div class="paginator_box">
            <a href="/page/1">START</a>
            <?php \library\pagination::selector($data->page); ?>
            <a href="/page/<?php echo $data->page->length ? $data->page->length : 1; ?>">END</a>
       </div>
    </section>
    <?php endif; ?>
    <!-- paginator -->
</div>

