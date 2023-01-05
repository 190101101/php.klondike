function comment_read(json, arg = false)
{
    $(arg).attr('data-get', `/panel/comment/load/more/${json.this_article_id}/${json.last_comment_id}`);

    json.comment.forEach((element) => {
        
    $('.comment-table').append(`
        
        <tr>
            
            <td aria-label='id'># ${element.comment_id}</td>
            
            <td aria-label='user'>${element.user_login}</td>
            
            <td aria-label='comment'>
                <div>
                    ${element.comment_text}
                </div>

                <span>
                    <a data-get="/panel/comment/rating/like/${element.comment_id}" class="data-get">
                        <img src="${svg1}like.svg">
                        <span>${element.comment_like}</span>
                    </a>
                </span>

                <span>
                    <a data-get="/panel/comment/rating/dislike/${element.comment_id}" class="data-get">
                        <img src="${svg1}dislike.svg">
                        <span>${element.comment_dislike}</span>
                    </a>
                </span>
            </td>

            <td aria-label='delete'>
                
                <a data-del="/panel/comment/delete/${element.comment_id}" class="this-del">
                
                    <img src="${svg1}delete.svg">
                
                </a>

            </td>
            
        </tr>
    `);

    });

    var scroll = $('.history-sidebar');
    
    scroll.scrollTop(scroll.prop('scrollHeight'));
}

function image_read(json)
{
    $(arg).attr('data-get', `/panel/image/load/more/${json.this_article_id}/${json.last_image_id}`);
    
    json.image.forEach((element) => {
        
    $('.image-table').append(`

        <tr data-tr="/panel/image/load/more/${element.article_id}/${element.image_id}" class="data-tr">
        
            <td aria-label='id'># ${element.image_id}</td>
        
            <td aria-label='article'>${element.article_id}</td>
        
            <td aria-label='name'>${element.image_image}</td>
        
            <td aria-label='image'>
        
                <img src="/files/upload/images/${element.image_image}">
        
            </td>
        
            <td aria-label='delete'>
        
                <a data-del="/panel/image/delete/${element.image_id}" class="this-del">
        
                    <img src="${svg1}delete.svg">
        
                </a>
        
            </td>
        
        </tr>
    `);

    });

    var scroll = $('.history-sidebar');
    
    scroll.scrollTop(scroll.prop('scrollHeight'));
}


function guest_read(json, arg = false)
{
    $(arg).prop('disabled', true);
}

