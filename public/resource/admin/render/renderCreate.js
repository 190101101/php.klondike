function user_create(json, arg = false)
{
    user = json.user;
    
    $('.table-media').prepend(` 

        <tr>

            <td aria-label='delete'>

                <a data-del="/panel/user/delete/${user.user_id}" class="this-del">

                    <img src="${svg1}delete.svg">

                </a>

            </td>

            <td aria-label='update'>

                <a data-load="/panel/user/update/${user.user_id}" class="load_btn"

                    data-id="${user.user_id}">

                    <img src="${svg1}update.svg">

                </a>

            </td>

            <td aria-label='id'># ${user.user_id}</td>

            <td aria-label='login'>${user.user_login}</td>

            <td aria-label='password'>${user.user_password}</td>

            <td aria-label='status'>
            
                <label class="switch">
            
                <input type="checkbox" class="this-status" 
            
                    data-status="/panel/user/status/${user.user_id}" checked> 
            
                <span class="slider round"></span>
            
                </label>
            
            </td>

            <td aria-label='level'>${user.user_level}</td>     

        </tr>

    `);
}

function ad_create(json, arg = false)
{
    ad = json.ad;

    $('.table-media').prepend(` 

        <tr>
        
            <td aria-label='delete'>
        
                <a data-del="/panel/ad/delete/${ad.ad_id}" class="this-del">
        
                    <img src="${svg1}delete.svg">
        
                </a>
        
            </td>
        
            <td aria-label='update'>
        
                <a data-load="/panel/ad/update/${ad.ad_id}" class="load_btn"
        
                    data-id="${ad.ad_id}">
        
                    <img src="${svg1}update.svg">
        
                </a>
        
            </td>
        
            <td aria-label='id'># ${ad.ad_id}</td>
        
            <td aria-label='title'>${ad.ad_title.substring(0, 30)}</td>
        
            <td aria-label='link'>${ad.ad_link.substring(0, 30)}</td>
        
            <td aria-label='content'>${ad.ad_content.substring(0, 50)}</td>
        
        </tr>
    `);
}

function chat_create(json, arg = false)
{
    chat = json.chat;

    $('.table-media').prepend(` 
        
        <tr>
            
            <td aria-label='delete'>
                
                <a data-del="/panel/chat/delete/${chat.chat_id}" class="this-del">
                
                    <img src="${svg1}delete.svg">
                
                </a>
            </td>
            
            <td aria-label='id'># ${chat.chat_id}</td>
            
            <td aria-label='user'>${chat.user_login}</td>
            
            <td aria-label='chat'>${chat.chat_text}</td>
            
            <td aria-label='created at'>${chat.chat_created_at}</td>
        
        </tr>

    `);
}

function voting_create(json, arg = false)
{
    voting = json.voting;

    $('.table-media').prepend(` 

        <tr>
        
            <td aria-label='delete'>
        
                <a data-del="/panel/voting/delete/${voting.voting_id}" class="this-delete">
        
                    <img src="${svg1}delete.svg">
        
                </a>
        
            </td>
        
            <td aria-label='update'>
        
                <a data-load="/panel/voting/update/${voting.voting_id}" class="load_btn"

                    data-id="${voting.voting_id}">
        
                    <img src="${svg1}update.svg">
        
                </a>
        
            </td>
        
            <td aria-label='id'># ${voting.voting_id}</td>
        
            <td aria-label='content'>${voting.voting_content}</td>
        
            <td aria-label='count a'>${voting.voting_vote_count_a}</td>
        
            <td aria-label='count b'>${voting.voting_vote_count_b}</td>
        
            <td aria-label='count total'>${voting.voting_vote_count_total}</td>
        
            <td aria-label='option a'>${voting.voting_option_a}</td>
        
            <td aria-label='option b'>${voting.voting_option_b}</td>
        
            <td aria-label='status'>
        
                <label class="switch">
        
                <input type="checkbox" class="this-status" checked
        
                    data-status="/panel/voting/status/${voting.voting_id}" >
        
                <span class="slider round"></span>
        
                </label>
        
            </td>
        
            <td aria-label='type'>${voting.voting_type}</td>
        
        </tr>
    `);
}


function section_create(json, arg = false)
{
    section = json.section;

    $('.table-media').prepend(`
        <tr>

            <td aria-label='delete'>

                <a data-del="/panel/section/delete/${section.section_id}"

                    class="this-delete">                            

                    <img src="${svg1}delete.svg">

                </a>

            </td>

            <td aria-label='update'>

                <a data-load="/panel/section/update/${section.section_id}" class="load_btn"

                    data-id="${section.section_id}">

                    <img src="${svg1}update.svg">

                </a>

            </td>

            <td aria-label='id'># ${section.section_id}</td>

            <td aria-label='section'>

                <a href="/panel/category/section/${section.section}/page/1">

                    ${section.section}

                </a>

            </td>

            <td aria-label='title'>${section.section_title.substring(0, 20)}</td>

            <td aria-label='status'>

                <label class="switch">

                <input type="checkbox" class="this-status" checked

                    data-status="/panel/section/status/${section.section_id}"> 

                <span class="slider round"></span>

                </label>

            </td>

            <td aria-label='created at'><${section.section_created_at}</td>

        </tr>
            
    `);
}


function comment_create(json, arg = false)
{
    comment = json.comment;

    $('.comment-table').prepend(`

        <tr data-tr="/panel/comment/load/more/${comment.article_id}/${comment.comment_id}" class="data-tr">

            <td aria-label='id'># ${comment.comment_id}</td>

            <td aria-label='user'>${comment.user_login}</td>

            <td aria-label='comment'>

                <div>

                    ${comment.comment_text}

                </div>

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

            </td>

            <td aria-label='delete'>

                <a data-del="/panel/comment/delete/${comment.comment_id}" class="this-del">

                    <img src="${svg1}delete.svg">

                </a>

            </td>

        </tr>
    `);
}


function image_create(json, arg = false)
{
    json.image.forEach((element) => {
        
    $('.image-table').prepend(`

        <tr data-tr="/panel/image/load/more/${element.article_id}/${element.image_id}" class="data-tr">
        
            <td aria-label='id'># ${element.image_id}</td>
        
            <td aria-label='article'>${element.article_id}</td>
        
            <td aria-label='name'>${element.image_image}</td>
        
            <td aria-label='image'>
        
                <img src="${images}${element.image_image}">
        
            </td>
        
            <td aria-label='delete'>
        
                <a data-del="/panel/image/delete/${element.image_id}" class="this-del">
        
                    <img src="files/system/svg/svg1/delete.svg">
        
                </a>
        
            </td>
        
        </tr>
    `);

    });
}

function category_create(json, arg = false)
{
    category = json.category;

    $('.table-media').prepend(`
        
        <tr>
        
            <td aria-label='delete'>
        
                <a data-del="/panel/category/delete/${category.category_id}"
        
                    class="this-delete">
        
                    <img src="${svg1}delete.svg">
        
                </a>
        
            </td>
        
            <td aria-label='update'>
        
                <a data-load="/panel/category/update/${category.category_id}" class="load_btn"

                    data-id="${category.category_id}">
        
                    <img src="${svg1}update.svg">
        
                </a>
        
            </td>
        
            <td aria-label='id'># ${category.category_id}</td>
        
            <td aria-label='image'>
        
                <img src="${images}${category.category_image}">
        
            </td>
        
           <td aria-label='category'>
        
                <a href="/panel/article/category/${category.section_slug}/${category.category_slug}">
        
                    ${category.category}
        
                </a>
        
            </td>
        
            <td aria-label='title'>${category.category_title.substring(0, 20)}</td>
        
            <td aria-label='sub title'>${category.category_subtitle.substring(0, 20)}</td>
        
            <td aria-label='status'>
        
                <label class="switch">
        
                <input type="checkbox" class="this-status" checked
        
                    data-status="/panel/category/status/${category.category_id}"> 
        
                <span class="slider round"></span>
        
                </label>
        
            </td>
        
            <td>${category.category_created_at}</td>
        
        </tr>
    `);
}

function article_create(json, arg = false)
{
    article = json.article;

    $('.table-media').prepend(`

        <tr>
        
            <td aria-label='delete'>
        
                <a data-del="/panel/article/delete/${article.article_id}" 
        
                    class="this-delete">
        
                    <img src="${svg1}delete.svg">
        
                </a>
        
            </td>
        
            <td aria-label='update'>
        
                <a data-load="/panel/article/update/${article.article_id}" 
        
                    class="load_btn"
        
                    data-id="${article.article_id}">
        
                    <img src="${svg1}update.svg">
        
                </a>
        
            </td>
        
            <td aria-label='images'>
        
                <a data-load="/panel/image/article/${article.article_id}" 
        
                    class="load_btn"
        
                    data-id="${article.article_id}">
        
                    <img src="${svg1}file.svg">
        
                </a>
        
            </td>
        
            <td aria-label='comment'>
        
                <a data-load="/panel/comment/article/${article.article_id}" class="load_btn">
        
                    <img src="${svg1}comment.svg">
        
                </a>
        
            </td>
        
            <td aria-label='id'># ${article.article_id}</td>
        
            <td aria-label='category'>
        
                <a href="/category/${article.section_slug}/${article.category_slug}">
        
                    ${article.category}
        
                </a>
        
            </td>
        
            <td aria-label='image'>
            
                <img src="${images}${article.article_image}">
            
            </td>
            
            <td aria-label='title'>${article.article_title.substring(0, 20)}</td>
            
            <td aria-label='status'>
            
                <label class="switch">
            
                <input type="checkbox" class="this-status" checked
            
                    data-status="/panel/article/status/${article.article_id}"> 
            
                <span class="slider round"></span>
            
                </label>
            
            </td>
            

            <td aria-label='view'>
            
                <a href="/article/${article.section_slug}/${article.category_slug}/${article.article_slug}" target="_blank">
            
                    <img src="${svg1}link.svg">
            
                </a>
            
            </td>
            
        </tr>
    `);
}

function notice_create(json, arg = false)
{
    notice = json.notice;

    $('.table-media').prepend(`

        <tr>
        
            <td aria-label='delete'>
        
                <a data-del="/panel/notice/delete/${notice.notice_id}" class="this-delete">
        
                    <img src="${svg1}delete.svg">
        
                </a>
        
            </td>
        
            <td aria-label='update'>
        
                <a data-load="/panel/notice/update/${notice.notice_id}" class="load_btn"
        
                    data-id="${notice.notice_id}">
        
                    <img src="${svg1}update.svg">
        
                </a>
        
            </td>
        
            <td aria-label='id'># ${notice.notice_id}</td>
        
            <td aria-label='notice'>${notice.notice}</td>
        
            <td aria-label='title'>${notice.notice_title.substring(0, 20)}</td>
        
            <td aria-label='image'>
        
                <img src="${images}${notice.notice_image}">
        
            </td>
        
            <td aria-label='status'>
        
                <label class="switch">
        
                <input type="checkbox" class="this-status" checked
        
                        data-status="/panel/notice/status/${notice.notice_id}" >
        
                <span class="slider round"></span>
        
                </label>
        
            </td>
        
            <td aria-label='created at'>${notice.notice_created_at}</td>
        
        </tr>
    `);
}


function post_create(json, arg = false)
{
    post = json.post;

    $('.table-media').prepend(`
        
        <tr>
        
            <td aria-label="delete">
        
                <a data-del="/panel/post/delete/${post.post_id}" class="this-delete">
        
                    <img src="${svg1}delete.svg">
        
                </a>
        
            </td>
        
            <td aria-label='update'>
        
                <a data-load="/panel/post/update/${post.post_id}" class="load_btn"
        
                    data-id="${post.post_id}">
        
                    <img src="${svg1}update.svg">
        
                </a>
        
            </td>
        
            <td aria-label="id"># ${post.post_id}</td>
        
            <td aria-label="notice">${post.notice}</td>
        
            <td aria-label="image">
        
                <img src="${images}${post.post_image}">
        
            </td>
        
            <td aria-label="title">${post.post_title.substring(0, 20)}</td>
        
            <td aria-label="status">
        
                <label class="switch">
        
                <input type="checkbox" class="this-status" data-status="/panel/post/status/${post.post_id}" checked> 
        
                <span class="slider round"></span>
        
                </label>
        
            </td>

            <td aria-label="link">${post.post_link}</td>

        </tr>
    `);
}

function comment_like(json, arg = false)
{
    comment = json.comment;

    $(arg).find('span').html(comment.comment_like);

}

function comment_dislike(json, arg = false)
{
    comment = json.comment;

    $(arg).find('span').html(comment.comment_dislike);

}
