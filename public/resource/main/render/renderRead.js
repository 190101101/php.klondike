function comment_load(json, arg = false, code)
{    
    $(arg).attr('data-get', `/comment/load/more/${json.this_article_id}/${json.last_comment_id}`);
    
    comment = json.comment;

    comment.forEach((element) => {
        
    $('.comment_wrap').append(`

        <div class="comment_read comments" data-comment="/comment/load/more/${element.article_id}/${element.comment_id}">

            <div class="read_content">

                <div class="image_box">

                    <img src="${image}user.jpg">

                </div>

                <div class="read_box">

                    <div class="info">

                        <div>

                            <span>${element.user_login}</span>

                            <span>${element.comment_date}</span>

                        </div>

                        <div>

                            <a data-get="/comment/delete/${element.comment_id}" class="data-get">

                                <img src="${svg2}delete.svg">

                            </a>

                        </div>

                    </div>

                    <div class="text_content">

                        <div class="comment_text">

                            ${element.comment_text}

                        </div>

                        <div class="wrap_reply">

                             <div class="grade">

                                <span>

                                    <a data-get="/comment/rating/like/${element.comment_id}" class="data-get">

                                        <img src="/files/system/svg/svg1/like.svg">

                                        <span>${element.comment_like}</span>

                                    </a>

                                </span>

                                <span>

                                    <a data-get="/comment/rating/dislike/${element.comment_id}" class="data-get">

                                        <img src="/files/system/svg/svg1/dislike.svg">

                                        <span>${element.comment_dislike}</span>

                                    </a>

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    `);

    });
}

function chat_load(json, arg = false, code)
{
    $(arg).attr('data-get', `/chat/load/more/${json.last_chat_id}`);

    chat = json.chat;

    chat.forEach((element) => {
        
    $('.wrap_chat').prepend(`

        <div class="chat-container">
        
            <div class="chat-container-img-box">
        
                <img src="${image}user.jpg" class="chat-person-img">
        
            </div>
        
            <div class="chat-container-box">
        
                <div class="chat-container-box-inner">
        
                    <span style="color: ${element.user_color} !important;">${element.user_login}</span>
        
                    <span>${element.chat_created_at}</span>
        
                </div>
        
                <div class="chat-container-msg">
        
                    <span>${element.chat_text}</span>
        
                </div>
        
            </div>
        
        </div>
    `);
    });
}

function post_load(json, arg = false, code)
{    
    $(arg).attr('data-get', `/post/load/more/${json.this_notice_id}/${json.last_post_id}`);
    
    post = json.post;

    post.forEach((element) => {
        
    $('.notice-card-body .wrap_post').append(`

        <div class="not-card-content">
        
            <div class="card-content-head">
        
                <div>
        
                    <span>${element.post_created_at}</span>
        
                </div>
        
            </div>
        
            <div class="card-content">
        
                <div class="card-content-inner">
        
                    <span>${element.post_content}</span>
        
                </div>
        
                <div class="card-content-url-box">
        
                    <a class="card-content-url" href="https://www.youtube.com/">
        
                        <span>${element.post_link}</span>
        
                    </a>
        
                </div>
        
                <div  class="notice-card-img-box">
        
                    <img src="${images}${element.post_image}" class="notice-card-img">
        
                </div>
        
                <hr class="notice-card-img-hr-under">
        
            </div>
        
        </div>
    `);

    });

}