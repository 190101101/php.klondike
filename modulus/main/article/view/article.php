<?php 
$article = $data->article; 
$images = [];
$images = array_merge([(object)['image_image' => $article->article_image]], $data->image);
?>

<!-- content -->
<div class="row">
    <div class="col-lg-12">
        <div class="post-content">
            <?php if($data->image == FALSE): ?>
            <div class="card">
                <img class="card-img" src="<?php echo IMAGES; ?><?php echo $article->article_image; ?>">
                <div class="card-img-overlay">
                    <div class="post-content-title-info">
                        <div class="post-content-title-box">
                            <span class="post-content-title"><?php echo $article->article_title; ?></span>
                        </div>
                        <div class="post-content-info-box">
                            <div class="post-content-info-date">
                                <span>Published:</span>
                                <span><?php echo date_ymd($article->article_created_at); ?></span>
                            </div>
                            <div class="post-content-info-count">
                                <div class="spheadimgbox">
                                    <img src="<?php echo SVG1; ?><?php echo $article->category_icon; ?>">
                                    <span><?php echo $article->category; ?></span>
                                </div>
                                <div class="spheadimgbox">
                                    <img src="<?php echo SVG1; ?>down.svg">
                                    <span class="levin"><?php echo $article->article_download; ?> скачивания</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="card">
                <div class="card-img-overlay">
                    <div class="post-content-title-info">
                        <div class="post-content-title-box">
                            <span class="post-content-title"><?php echo $article->article_title; ?></span>
                        </div>
                        <div class="post-content-info-box">
                            <div class="post-content-info-date">
                                <span>Published:</span>
                                <span><?php echo date_ymd($article->article_created_at); ?></span>
                            </div>
                            <div class="post-content-info-count">
                                <div class="spheadimgbox">
                                    <img src="<?php echo SVG1; ?><?php echo $article->category_icon; ?>">
                                    <span><?php echo $article->category; ?></span>
                                </div>
                                <div class="spheadimgbox">
                                    <img src="<?php echo SVG1; ?>down.svg">
                                    <span class="levin"><?php echo $article->article_download; ?> скачивания</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="articleimage" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php $i = 0; foreach ($images as $image): ?>
                        <div class="carousel-item <?php echo $i++ == 0 ? 'active' : ''; ?> ">
                            <img class="d-block card-img" src="<?php echo IMAGES; ?><?php echo $image->image_image; ?>">
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#articleimage" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#articleimage" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <?php endif; ?>

            <div class="story-content-menu">
                <ul class="nav">
                    <li>
                        <a href="#descriptions" class="nav-active" data-toggle="pill">
                        <img src="<?php echo SVG2; ?>blog.svg">
                        <span>descriptions</span>
                        </a>
                    </li>
                    <?php if(!empty($article->article_archive) && !empty($article->article_archivesize)): ?>
                    <li>
                        <a href="#download" class="download" data-toggle="pill">
                        <img src="<?php echo SVG2; ?>down.svg">
                        <span>download (<?php echo $article->article_archivesize; ?>)</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <li>
                        <a href="#comments" data-toggle="pill">
                        <img src="<?php echo SVG2; ?>comment.svg">
                        <span>comments</span>
                        </a>
                    </li>
                    <?php if(!empty($article->article_video)): ?>
                    <li>
                        <a href="#iframe" data-toggle="pill">
                        <img src="<?php echo SVG2; ?>rss.svg">
                        <span>video</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane show active" id="descriptions" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="post-container-content-under">
                    <div class="post_head">
                        <span> <img src="<?php echo SVG2; ?>blog.svg"> </span>
                        <span>descriptions</span>
                    </div>
                    <div class="post-container-content">
                        <div class="post-info-text-box">
                            <div>
                                <?php echo $article->article_content; ?>
                            </div> 
                        </div>
                    </div>
                </div>
                <!--  -->
                <?php if(count($data->ad) > 0): ?>
                <div class="post-container-content-under">
                    <div class="post-content-down-link">
                        <span><img src="<?php echo SVG2; ?>rss.svg"></span>
                        <span>ADVERTISING LINKS</span>
                    </div>
                    <div class="post-content-down-link-under">
                        <table>
                            <tbody>
                                <?php foreach($data->ad as $ad): ?>
                                <tr>
                                    <th><span></span></th>
                                    <th>
                                        <a href="<?php echo $ad->ad_link; ?>" target="_blank">
                                        • <?php echo $ad->ad_content; ?>
                                        </a>
                                    </th>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; ?>
                <!--  -->
            </div>

            <?php if(!empty($article->article_archive) && !empty($article->article_archivesize)): ?>
            <div class="tab-pane" id="download" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="post-container-content-under">
                    <div class="post_head">
                        <span><img src="<?php echo SVG1; ?>down.svg"></span>
                        <span>DOWNLOAD</span>
                    </div>
                    <div class="post-btn-group-box">
                        <div class="timer_box">
                            <div class="time_text">
                                <span>Скачивание автоматически начнётся через</span>
                            </div>
                            <div class="downloadtimer" data-download="/article/download/<?php echo $article->article_id; ?>" countdown="60"></div>
                        </div>

                        <?php if(!empty($article->article_archive) && !empty($article->article_archivesize)): ?>
                        <button id="down" class="post-btn-group" onclick="downloadprogress()">
                            <div>
                                <span>
                                <img src="<?php echo SVG1; ?>down.svg">
                                </span>
                            </div>
                            <div>
                                <span>DOWNLOAD</span>
                                <span>file size <?php echo $article->article_archivesize; ?></span>
                            </div>
                        </button>
                        <?php else: ?>
                         <button class="post-btn-group">
                            <div>
                                <span>
                                <img src="<?php echo SVG1; ?>down.svg">
                                </span>
                            </div>
                            <div>
                                <span>пусто </span>
                                <span>file size 0</span>
                            </div>
                        </button>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if(count($data->similar) > 3): ?>
                <div class="post-container-content-under">
                    <div class="post-content-down-link">
                        <span><img src="<?php echo SVG2; ?>rss.svg"></span>
                        <span>SIMILAR MATERIALS</span>
                    </div>
                    <div class="post-content-down-link-under">
                        <div id="similararticle" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <!--  -->
                                <?php $x = 0; foreach($data->similar as $similar): ?>
                                <div class="carousel-item <?php echo $x++ == 1 ? 'active' : ''; ?>">
                                    <div class="card">
                                        <div class="row no-gutters">
                                            <div class="col-md-5">
                                                <div class="card_image_box">
                                                    <img src="<?php echo IMAGES; ?><?php echo $similar->article_image; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card_content">
                                                    <div class="card_body">
                                                        <div class="card_head">
                                                            <div>
                                                                <a href="/article/<?php echo $similar->section_slug; ?>/<?php echo $similar->category_slug; ?>/<?php echo $similar->article_slug; ?>" class="card_title"><?php echo $similar->article_title; ?></a>
                                                            </div>
                                                            <div class="card_head_info">
                                                                <div class="box">
                                                                    <span><?php echo date_ymd($similar->article_created_at); ?></span>
                                                                </div>
                                                                <div class="box">
                                                                    <span>
                                                                    <img src="<?php echo SVG1; ?>flame.svg">
                                                                    <img src="<?php echo SVG1; ?>flame.svg">
                                                                    </span>
                                                                    <span>category</span>
                                                                </div>
                                                                <div class="box">
                                                                    <div>
                                                                        <span>
                                                                        <img src="<?php echo SVG1; ?>down.svg">
                                                                        </span>
                                                                        <span class="levin"><?php echo $similar->article_download; ?></span>
                                                                        <span>скачиваний</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card_text_box">
                                                            <span><?php echo remove_tags(substr($similar->article_content), 0, 425); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <!--  -->
                            </div>
                            <a class="carousel-control-prev" href="#similararticle" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#similararticle" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--  -->
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            
            <div class="tab-pane" id="comments" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="post-container-content-under">
                    <div class="post_head">
                        <span><img src="<?php echo SVG2; ?>comment.svg"></span>
                        <span>COMMENTS</span>
                    </div>
                    <div class="comment_wrapper">
                        <div class="comment_block">
                            <?php if(user_info()): ?>
                            <div class="comment_write">
                                <div class="comment_img_box">
                                    <img src="<?php echo IMAGE; ?>user.jpg">
                                </div>
                                <form data-action="/comment" class="data_form comment_text_box">
                                <!-- <form action="/comment" method="POST" class="comment_text_box"> -->
                                    <div>
                                        <input type="hidden" name="article_id" value="<?php echo $article->article_id; ?>" readonly required>
                                        <textarea name="comment_text" id="autoresizing" placeholder="введите текст комментариев" maxlength="3000" minlength="2" required></textarea> 
                                    </div>
                                    <div>
                                        <button class="comment_btn">Write a comment</button>
                                    </div>
                                </form>
                            </div>
                            <?php endif; ?>
                            
                        <!-- comment  -->
                        <div class="comment_wrap">
                            <?php foreach($data->comment as $comment): ?>
                                <div class="comment_read comments">
                                    <div class="read_content">
                                        <div class="image_box">
                                            <img src="<?php echo IMAGES; ?>user.jpg">
                                        </div>
                                        <div class="read_box">
                                            <div class="info">
                                                <div>
                                                    <span><?php echo $comment->user_login; ?></span>
                                                    <span><?php echo $comment->comment_date; ?></span>
                                                </div>
                                                <div>
                                                    <?php if(user_level() >= 99): ?>
                                                        <a data-get="/comment/delete/<?php echo $comment->comment_id; ?>" class="data-get">
                                                            <img src="<?php echo SVG2; ?>delete.svg">
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="text_content">
                                                <div class="comment_text">
                                                    <?php echo $comment->comment_text; ?>
                                                </div>
                                                <div class="wrap_reply">
                                                     <div class="grade">
                                                        <span>
                                                            <a data-get="/comment/rating/like/<?php echo $comment->comment_id; ?>" class="data-get">
                                                                <img src="<?php echo SVG1; ?>like.svg">
                                                                <span><?php echo $comment->comment_like; ?></span>
                                                            </a>
                                                        </span>

                                                        <span>
                                                            <a data-get="/comment/rating/dislike/<?php echo $comment->comment_id; ?>" class="data-get">
                                                                <img src="<?php echo SVG1; ?>dislike.svg">
                                                                <span><?php echo $comment->comment_dislike; ?></span>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php if(count($data->comment) > 9): ?>
                            <div class="d-block">                                
                                <button style="width: 100%;" class="data-get load_more"
                                    data-get="/comment/load/more/<?php echo $article->article_id; ?>/<?php echo $comment->comment_id; ?>">load more</button>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
    
            <?php if(!empty($article->article_video)): ?>
            <div class="tab-pane" id="iframe" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="post-container-content-under">
                    <div class="post_head">
                        <span><img src="<?php echo SVG2; ?>rss.svg"></span>
                        <span>video</span>
                    </div>
                    <div class="post-content-down-link-under">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" 
                            src="https://www.youtube.com/embed/<?php echo $article->article_video; ?>" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- content -->
