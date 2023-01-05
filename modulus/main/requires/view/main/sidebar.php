<?php 
    use \library\guest;
    $model = new modulus\main\requires\model\requireModel();
    $sections = $model->section();
    $categories = $model->category();
    $notices = $model->notice();
    $posts = $model->post();
    $voting = $model->voting();
    $messages = $model->chat();
    $download = $model->download();
    $file = $model->file();

    if($messages != FALSE){
        $reverse_message = array_reverse($messages);
        $last_chat_id = $reverse_message[count($reverse_message)-1]->chat_id; 
    }

    if($posts != FALSE){
        $last_post_id = $posts[count($posts)-1]->post_id; 
    }

?>
<div class="sidebar" id="sidebar">
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
                    <td>online</td>
                    <td></td>
                    <td>files</td>
                    <td></td>
                    <td>download</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="cat-head">
        <h4>categories</h4>
        <hr class="hr-line">
    </div>
    <div class="cat" id="category">
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
                    <a href="/category/<?php echo $section->section_slug; ?>/<?php echo $category->category_slug; ?>" class="cat-link click">
                    <?php echo $category->category_title; ?>
                    </a>
                    <span><?php echo $category->category_subtitle ?></span>
                </li>
                <?php } endforeach; ?>
            </div>
        </ul>
        <?php endforeach; ?>
        <ul class="cat-btn-ul">
            <li class="cat-btn-li"> 
                <img src="<?php echo SVG1; ?>category.svg" class="cat-img">
                <img src="<?php echo SVG1; ?>category.svg" class="filter">
                <a href="/category" class="cathref click"><span>all categories</span> </a>
                <span class="cat-link-circle"></span>
            </li>
        </ul>
    </div>


    <!-- auth -->    
    <?php if(user_info()): ?>
        
        <div class="sidebar-option">
            <a class="option">
            <img src="<?php echo SVG1; ?>user.svg">
            <span><?php echo user_login(); ?></span>
            </a>
            <a href="/logout" class="option">
            <img src="<?php echo SVG1; ?>logout.svg">
            <span>logout</span>
            </a>
        </div>

    <?php else: ?>

    <div class="sidebar-option">
        <a class="option"></a>
        <a id='signin' class="option">
            <img src="<?php echo SVG1; ?>logout.svg">
            <span>log in</span>
        </a>
    </div>


    <div class="sidebar-login-box signinform">
      <form action="/auth" method="POST">
        <div class="form-signin">
          <input type="text" name="user_login" class="sidebar-login" placeholder="login">
        </div>
        <div class="form-signin">
          <input type="password" name="user_password" class="sidebar-login" placeholder="password">
        </div>
        <div class="form-signin sign-in-btn-box">
            <button type="submit" class="sign-btn">sign in</button>
        </div>
      </form>
    </div>
    <?php endif; ?>
    <!-- auth -->    



    <div class="vote-under">
        <hr class="vote-hr-line">
    </div>
    
    <?php if($voting): ?>
    <div class="votings">
        <div class="votecontent">
            <div class="votecontentbox">
                <div class="votetext" style="color: <?php echo $voting->voting_color; ?> !important;">
                    <?php echo $voting->voting_content; ?>
                </div>
            </div>
            <div class="vote_box">
                <div>
                    <a data-get="/voting/vote/a/<?php echo $voting->voting_id; ?>" class="vote_btn vote_a data-get">
                        <span><?php echo $voting->voting_option_a; ?></span>
                    </a>
                </div>

                <div>
                    <a data-get="/voting/vote/b/<?php echo $voting->voting_id; ?>" class="vote_btn vote_b data-get">
                        <span><?php echo $voting->voting_option_b; ?></span>
                    </a>
                </div>
            </div>
            
            <div class="voteprogressbox">
                <div class="voteaprgbox vboxa">
                    <span class="voteaprga vboxa" style="width: <?php echo $voting->voting_vote_percent_a; ?>% !important;" >
                        <?php echo $voting->voting_vote_count_a; ?>
                    </span>
                    <span class="voteaprgaperca"> <?php echo $voting->voting_vote_percent_a; ?> %</span>
                </div>
                <div class="voteaprgbox vboxb">
                    <span class="voteaprgb vboxb" style="width: <?php echo $voting->voting_vote_percent_b; ?>% !important;">
                        <?php echo $voting->voting_vote_count_b; ?>
                    </span>
                    <span class="voteaprgapercb"><?php echo $voting->voting_vote_percent_b; ?> %</span>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!-- voting -->

    <!-- chat -->
    <div class="chat-content" style="height: 500px;">
        <div class="chat-content-box">
            <?php if(count($messages) > 50): ?>
                <button class="data-get load_more" data-get="/chat/load/more/<?php echo $last_chat_id; ?>">load more</button>
            <?php endif; ?>
            <div class="wrap_chat">
                <?php foreach($messages as $message): ?>
                 <div class="chat-container" data-chat="/chat/load/more/<?php echo $message->chat_id; ?>">
                    <div class="chat-container-img-box">
                        <img src="<?php echo IMAGE; ?>user.jpg" class="chat-person-img">
                    </div>
                    <div class="chat-container-box">
                        <div class="chat-container-box-inner">
                            <span style="color: <?php echo $message->user_color; ?> !important;"><?php echo $message->user_login; ?></span>
                            <span><?php echo date_ymd($message->chat_created_at); ?></span>
                        </div>
                        <div class="chat-container-msg">
                            <span><?php echo $message->chat_text; ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php if(user_info()): ?>
        <div class="chat-area-box">
            <div class="chat-area">
                <form data-action="/chat" class="data_form chat-form">
                    <textarea name="chat_text" placeholder="напишите сообщения" minlength="2" maxlength="300" required></textarea>
                    <button class="chat-send-btn">
                        <img src="<?php echo SVG1; ?>send.png">
                    </button>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <!-- chat -->

    <!-- notice -->
    <?php if(count($posts) > 0): ?>
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
                            <span><?php echo $notice->notice; ?></span>
                        </div>
                    </div>
                </div>
                <div class="notice-card-body " aria-labelledby="noticeOne" data-parent="#notice">
                    <div class="card-body">
                        <div class="wrap_post">
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
                        <?php if(count($posts) > 10): ?>
                        <button class="data-get load_more" data-get="/post/load/more/<?php echo $notice->notice_id; ?>/<?php echo $last_post_id; ?>">load more</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <img src="<?php echo GIF; ?>cote.gif" class="cote2" title="meow :) hello i am Cookie meow">
</div>
