<?php 
    use library\guest;
    $model = new modulus\admin\requires\model\requireModel();
    $sections = $model->section();
    $categories = $model->category();
    $notices = $model->notice();
    $posts = $model->post();
    $download = $model->download();
    $file = $model->file();
?>
<div class="sidebar">
    <div class="online">
        <table>
            <thead>
                <tr class="online-first-tr">
                    <th><span class="pulse-1"></span></th>
                    <th title="interval 5 min"><?php echo guest::counter(); ?></th>
                    <th><span class="pulse-2"></span></th>
                    <th><?php echo $file; ?></th>
                    <th><span class="pulse-3"></span></th>
                    <th><?php echo $download; ?></th>
                </tr>
            </thead>
            <tbody>
                <tr class="online-second-tr">
                    <td></td>
                    <td>Онлайн</td>
                    <td></td>
                    <td>файлов</td>
                    <td></td>
                    <td>скачиваний</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="cat-head">
        <h4>категории</h4>
        <hr class="hr-line">
    </div>
    <div class="cat" id="category">
        <ul class="cat-btn-ul">
            <li class="cat-btn-li" data-toggle="collapse" data-target="#settingscollapse">
                <img src="<?php echo SVG1; ?>paw.svg" class="cat-img">
                <img src="<?php echo SVG1; ?>paw.svg" class="filter">
                <div class="cat-word-box">
                    <span>инфо</span>
                </div>
                <span class="cat-circle"></span>
            </li>
            <div id="settingscollapse" class="collapse" aria-labelledby="headingone" data-parent="#category">
                <li class="cat-li">
                    <a href="/panel/admin" class="cat-link">panel</a>
                    <span>system</span>
                </li>
                <li class="cat-li">
                    <a href="/panel/setting" class="cat-link">setting</a>
                    <span>settings</span>
                </li>
                <li class="cat-li">
                    <a href="/panel/guest" class="cat-link">guest</a>
                    <span>categories</span>
                </li>
                <li class="cat-li">
                    <a href="/panel/user" class="cat-link">users</a>
                    <span>users</span>
                </li>
                <li class="cat-li">
                    <a href="/panel/ad" class="cat-link">advertising</a>
                    <span>ad links</span>
                </li>
                <li class="cat-li">
                    <a href="/panel/download" class="cat-link">download</a>
                    <span>download</span>
                </li>
                <li class="cat-li">
                    <a href="/panel/voting" class="cat-link">voting</a>
                    <span>votings</span>
                </li>
                <li class="cat-li">
                    <a href="/panel/chat" class="cat-link">chat</a>
                    <span>chat</span>
                </li>
                <li class="cat-li">
                    <a href="/panel/comment" class="cat-link">comment</a>
                    <span>Комментарии</span>
                </li>
                <li class="cat-li">
                    <a href="/panel/image" class="cat-link">images</a>
                    <span>images by articles</span>
                </li>
            </div>
        </ul>

        <ul class="cat-btn-ul">
            <li class="cat-btn-li" data-toggle="collapse" data-target="#catetoriescollapse">
                <img src="<?php echo SVG1; ?>category.svg" class="cat-img">
                <img src="<?php echo SVG1; ?>category.svg" class="filter">
                <div class="cat-word-box">
                    <span>CATEGORIES AND SECTIONS</span>
                </div>
                <span class="cat-circle"></span>
            </li>
            <div id="catetoriescollapse" class="collapse" aria-labelledby="headingone" data-parent="#category">
                <li class="cat-li">
                    <a href="/panel/section" class="cat-link">section</a>
                    <span>sections</span>
                </li>
                <li class="cat-li">
                    <a href="/panel/category" class="cat-link">category</a>
                    <span>categories</span>
                </li>
                <li class="cat-li">
                    <a href="/panel/article" class="cat-link">article</a>
                    <span>articles</span>
                </li>
                <li class="cat-li">
                    <a href="/panel/notice" class="cat-link">notice</a>
                    <span>notices</span>
                </li>
                <li class="cat-li">
                    <a href="/panel/post" class="cat-link">post</a>
                    <span>posts</span>
                </li>
            </div>
        </ul>

        <?php foreach($sections as $section): ?>
        <ul class="cat-btn-ul">
            <li class="cat-btn-li" data-toggle="collapse" data-target="#<?php echo $section->section; ?>">
                <img src="<?php echo SVG1; ?><?php echo $section->section_icon; ?>" class="cat-img">
                <img src="<?php echo SVG1; ?><?php echo $section->section_icon; ?>" class="filter">
                <div class="cat-word-box">
                    <span><?php echo $section->section_title; ?></span>
                </div>
                <span class="cat-circle"></span>
            </li>
            <div id="<?php echo $section->section; ?>" class="collapse" aria-labelledby="headingone" data-parent="#category">
                <?php foreach($categories as $category): ?>
                <?php if($category->section_id == $section->section_id){ ?>
                <li class="cat-li">
                    <a href="/panel/article/category/<?php echo $section->section_slug; ?>/<?php echo $category->category_slug; ?>" class="cat-link click">
                        <?php echo $category->category_title; ?>
                    </a>
                    <span><?php echo $category->category_subtitle ?></span>
                </li>
                <?php } endforeach; ?>
            </div>
        </ul>
        <?php endforeach; ?>
    
    </div>
    
    <div class="sidebar_option">
        <a>
            <img src="<?php echo SVG1; ?>user.svg">
            <span><?php echo user_login(); ?></span>
        </a>
        <a href='/logout'>
            <img src="<?php echo SVG1; ?>logout.svg">
            <span>logout</span>
        </a>
    </div>

    <!-- notice -->
    <div id="wrappernotice">
        <?php foreach($notices as $notice): ?>
        <div class="notice" id="notice">
            <div class="card">
                <div class="card-header" id="noticeOne">
                    <div class="card-header-img-box">
                        <img src="<?php echo IMAGES; ?><?php echo $notice->notice_image; ?>" class="card-header-img">
                    </div>
                    <div class="not-card-header-title-box">
                        <div class="not-card-head">
                            <a href="/panel/post/notice/<?php echo $notice->notice; ?>/page/1">
                                <span><?php echo $notice->notice; ?></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="notice-card-body " aria-labelledby="noticeOne" data-parent="#notice">
                    <div class="card-body">
                        <?php foreach($posts as $post): ?>
                            <?php if($post->notice_id == $notice->notice_id):?>
                                <div class="not-card-content">
                                    <div class="card-content-head">
                                        <div>
                                            <span><?php echo date_ymd($post->post_created_at); ?></span>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-content-inner">
                                            <span><?php echo $post->post_content; ?></span>
                                        </div>
                                        <div class="card-content-url-box">
                                            <a class="card-content-url" href="https://www.youtube.com/">
                                                <span><?php echo $post->post_link; ?></span>
                                            </a>
                                        </div>
                                        <div  class="notice-card-img-box">
                                            <img src="<?php echo IMAGES; ?><?php echo $post->post_image; ?>" class="notice-card-img">
                                        </div>
                                        <hr class="notice-card-img-hr-under">
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <!-- notice -->
</div>
