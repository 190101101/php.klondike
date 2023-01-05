function chat_create(json, arg = false, code)
{
    chat = json.chat;

    $('.chat-content-box').append(` 
        
        <div class="chat-container">
        
            <div class="chat-container-img-box">
        
                <img src="${image}user.jpg" class="chat-person-img">
        
            </div>
        
            <div class="chat-container-box">
        
                <div class="chat-container-box-inner">
        
                    <span style="color: ${chat.user_color} !important;">${chat.user_login}</span>
        
                    <span>${chat.chat_date}</span>
        
                </div>
        
                <div class="chat-container-msg">
        
                    <span>${chat.chat_text}</span>
        
                </div>
        
            </div>
        
        </div>
    `);

    chat_scroll();
}


function comment_create(json, arg = false, code)
{
    comment = json.comment;

    if(comment.user_level < 99){
        $('.comment_btn').prop('disabled', true);
    }

    html = [];
    html +=

        `<div class="comment_read comments">

            <div class="read_content">

                <div class="image_box">

                    <img src="${image}user.jpg">

                </div>

                <div class="read_box">

                    <div class="info">

                        <div>

                            <span>${comment.user_login}</span>

                            <span>${comment.comment_date}</span>

                        </div>`;

                        if(comment.user_level == 99){

                html +=    
                        `<div>

                            <a data-get="/comment/delete/${comment.comment_id}" class="data-get">

                                <img src="${svg2}delete.svg">

                            </a>

                        </div>`;
                    }

            html+=

                `</div>

                    <div class="text_content">

                        <div class="comment_text">

                            ${comment.comment_text}

                        </div>

                        <div class="wrap_reply">

                             <div class="grade">

                                <span>

                                    <a data-get="/comment/rating/like/${comment.comment_id}" class="data-get">

                                        <img src="${svg1}like.svg">

                                        <span>${comment.comment_like}</span>

                                    </a>

                                </span>

                                <span>

                                    <a data-get="/comment/rating/dislike/${comment.comment_id}" class="data-get">

                                        <img src="${svg1}dislike.svg">

                                        <span>${comment.comment_dislike}</span>

                                    </a>

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    `;

    $('.comment_wrap').prepend(html);
    $('#autoresizing').css('height', 30+'px');

    setTimeout(function(){
        $('.comment_btn').prop('disabled', false);
    }, 1000);
}

function voting_create(json, arg = false, code)
{
    voting = json.voting;

    $('.voteprogressbox').html(`

        <div class="voteaprgbox vboxa">

            <span class="voteaprga vboxa" style="width: ${voting.voting_vote_percent_a}% !important;" >

                ${voting.voting_vote_count_a}

            </span>

            <span class="voteaprgaperca"> ${voting.voting_vote_percent_a} %</span>

        </div>

        <div class="voteaprgbox vboxb">

            <span class="voteaprgb vboxb" style="width: ${voting.voting_vote_percent_b}% !important;">

                ${voting.voting_vote_count_b}

            </span>

            <span class="voteaprgapercb">${voting.voting_vote_percent_b} %</span>

        </div>

    `);
}

function comment_like(json, arg = false, code)
{
    comment = json.comment;

    $(arg).find('span').html(comment.comment_like);

}

function comment_dislike(json, arg = false, code)
{
    comment = json.comment;

    $(arg).find('span').html(comment.comment_dislike);

}

function comment_delete(json, arg = false, code)
{
    $('.data-get').prop('disabled', false);

    $(arg).parents('.comment_read').hide();
}

