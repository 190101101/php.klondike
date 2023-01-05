function article_search(json, arg = false)
{
    template = [];
    html = [];

    json.article.forEach((element) => {
        html += 
        `  
            <tr>
                <td aria-label='delete'>
                    <a data-del="/panel/article/delete/${element.article_id}" 
                        class="this-delete">
                        <img src="${svg1}delete.svg">
                    </a>
                </td>
                <td aria-label='update'>
                    <a data-load="/panel/article/update/${element.article_id}" 
                        class="load_btn"
                        data-id="${element.article_id}">
                        <img src="${svg1}update.svg">
                    </a>
                </td>
                <td aria-label='images'>
                    <a data-load="/panel/image/article/${element.article_id}" 
                        class="load_btn"
                        data-id="${element.article_id}">
                        <img src="${svg1}file.svg">
                    </a>
                </td>
                <td aria-label='comment'>
                    <a data-load="/panel/comment/article/${element.article_id}" class="load_btn">
                        <img src="${svg1}comment.svg">
                    </a>
                </td>
                <td aria-label='id'># ${element.article_id}</td>
            <td aria-label='category'>
                    <a href="/category/${element.section}/${element.category}">
                        ${element.category}
                    </a>
                </td>
                <td aria-label='image'>
                    <img src="${images}/${element.article_image}">
                </td>
                <td aria-label='title'>${element.article_title}</td>
                <td aria-label='status'>
                    <label class="switch">
                    <input type="checkbox" class="this-status" checked
                        data-status="/panel/article/status/${element.article_id}"> 
                    <span class="slider round"></span>
                    </label>
                </td>
                <td aria-label='view'>
                    <a href="/article/${element.section}/${element.category}/${element.article_slug}" target="_blank">
                        <img src="${svg1}link.svg">
                    </a>
                </td>
            </tr>
        `;
    });

    $('.search_table').html(html);
}

function category_search(json, arg = false)
{
    html = [];

    json.category.forEach((element) => {
    html += 
    `  
        <tr>
            <td aria-label='delete'>
                <a data-del="/panel/category/delete/${element.category_id}"
                    class="this-delete">
                    <img src="${svg1}delete.svg">
                </a>
            </td>
            <td aria-label='update'>
                <a data-load="/panel/category/update/${element.category_id}" class="load_btn" data-id="${element.category_id}">
                    <img src="${svg1}update.svg">
                </a>
            </td>
            <td aria-label='id'># ${element.category_id}</td>
            <td aria-label='image'>
                <img src="${images}/${element.category_image}">
            </td>
           <td aria-label='category'>
                <a href="/panel/article/category/${element.section}/${element.category}">
                    ${element.category}
                </a>
            </td>
            <td aria-label='title'>${element.category_title}</td>
            <td aria-label='sub title'>${element.category_subtitle}</td>
            <td aria-label='status'>
                <label class="switch">
                <input type="checkbox" class="this-status" checked
                    data-status="/panel/category/status/${element.category_id}"> 
                <span class="slider round"></span>
                </label>
            </td>
            <td>${element.category_created_at}</td>
        </tr>
        `;
    });

    $('.search_table').html(html);
}

function post_search(json, arg = false)
{
    html = [];

    json.post.forEach((element) => {
        html += 
        `  
            <tr>
                <td aria-label='delete'>
                    <a data-del="/panel/post/delete/${element.post_id}" class="this-delete">
                        <img src="${svg1}delete.svg">
                    </a>
                </td>
                <td aria-label='update'>
                    <a data-load="/panel/post/update/${element.post_id}" class="load_btn"
                        data-id="${element.post_id}">
                        <img src="${svg1}update.svg">
                    </a>
                </td>
                <td aria-label='id'># ${element.post_id}</td>
                <td aria-label='notice'>${element.notice}</td>
                <td aria-label='image'>
                    <img src="${images}/${element.post_image}">
                </td>
                <td aria-label='title'>${element.post_title}</td>
                <td aria-label='status'>
                    <label class="switch">
                    <input type="checkbox" class="this-status" checked
                        data-status="/panel/post/status/${element.post_id}">
                    <span class="slider round"></span>
                    </label>
                </td>
                <td aria-label='link'>${element.post_link}</td>
            </tr>
        `;
    });

    $('.search_table').html(html);
}


function user_search(json, arg = false)
{
    html = [];

    json.user.forEach((element) => {
        html += 
        `  
            <tr>
                <td aria-label='delete'>
                    <a data-del="/panel/user/delete/${element.user_id}" class="this-del">
                        <img src="${svg1}delete.svg">
                    </a>
                </td>
                <td aria-label='update'>
                    <a data-load="/panel/user/update/${element.user_id}" class="load_btn"
                        data-id="${element.user_id}">
                        <img src="${svg1}update.svg">
                    </a>
                </td>
                <td aria-label='id'># ${element.user_id}</td>
                <td aria-label='login'>${element.user_login}</td>
                <td aria-label='password'>${element.user_password}</td>
                <td aria-label='status'>
                    <label class="switch">
                    <input type="checkbox" class="this-status" checked
                        data-status="/panel/user/status/${element.user_id}">
                    <span class="slider round"></span>
                    </label>
                </td>
                <td aria-label='level'>${element.user_level}</td>
                <td aria-label='ip'>${element.user_ip}</td>
            </tr>
        `;
    });

    $('.search_table').html(html);
}

function ad_search(json, arg = false)
{
    html = [];

    json.ad.forEach((element) => {
        html += 
        `  
           <tr>
                <td aria-label='delete'>
                    <a data-del="/panel/ad/delete/${element.ad_id}" class="this-del">
                        <img src="${svg1}delete.svg">
                    </a>
                </td>
                <td aria-label='update'>
                    <a data-load="/panel/ad/update/${element.ad_id}" class="load_btn" 
                        data-id="${element.ad_id}">
                        <img src="${svg1}update.svg">
                    </a>
                </td>
                <td aria-label='id'># ${element.ad_id}</td>
                <td aria-label='title'>${element.ad_title}</td>
                <td aria-label='link'>
                    <a href="${element.ad_link}" target="_blank">${element.ad_link}</a>
                </td>
                <td aria-label='content'>${element.ad_content}</td>
            </tr>
        `;
    });

    $('.search_table').append(html);
}

function notice_search(json, arg = false)
{
    html = [];

    json.notice.forEach((element) => {
        html += 
        `  
            <tr>
                <td aria-label='delete'>
                    <a data-del="/panel/notice/delete/${element.notice_id}" 
                        class="this-delete">
                        <img src="${svg1}delete.svg">
                    </a>
                </td>
                <td aria-label='update'>
                    <a data-load="/panel/notice/update/${element.notice_id}" 
                        class="load_btn"
                        data-id="${element.notice_id}">
                        <img src="${svg1}update.svg">
                    </a>
                </td>
                <td aria-label='images'>
                    <a data-load="/panel/image/notice/${element.notice_id}" 
                        class="load_btn"
                        data-id="${element.notice_id}">
                        <img src="${svg1}file.svg">
                    </a>
                </td>
                <td aria-label='comment'>
                    <a data-load="/panel/comment/notice/${element.notice_id}" class="load_btn">
                        <img src="${svg1}comment.svg">
                    </a>
                </td>
                <td aria-label='id'># ${element.notice_id}</td>
            <td aria-label='category'>
                    <a href="/category/${element.section}/${element.category}">
                        ${element.category}
                    </a>
                </td>
                <td aria-label='image'>
                    <img src="${images}/${element.notice_image}">
                </td>
                <td aria-label='title'>${element.notice_title}</td>
                <td aria-label='status'>
                    <label class="switch">
                    <input type="checkbox" class="this-status" checked
                        data-status="/panel/notice/status/${element.notice_id}"> 
                    <span class="slider round"></span>
                    </label>
                </td>
                <td aria-label='view'>
                    <a href="/notice/${element.section}/${element.category}/${element.notice_slug}" target="_blank">
                        <img src="${svg1}link.svg">
                    </a>
                </td>
            </tr>
        `;
    });

    $('.search_table').html(html);
}

function section_search(json, arg = false)
{
    html = [];

    json.section.forEach((element) => {
    html += 
    `  
           <tr>

            <td aria-label='delete'>

                <a data-del="/panel/section/delete/${element.section_id}"

                    class="this-delete">                            

                    <img src="${svg1}delete.svg">

                </a>

            </td>

            <td aria-label='update'>

                <a data-load="/panel/section/update/${element.section_id}" class="load_btn"

                    data-id="${element.section_id}">

                    <img src="${svg1}update.svg">

                </a>

            </td>

            <td aria-label='id'># ${element.section_id}</td>

            <td aria-label='section'>

                <a href="/panel/category/section/${element.section}/page/1">

                    ${element.section}

                </a>

            </td>

            <td aria-label='title'>${element.section_title.substring(0, 20)}</td>

            <td aria-label='status'>

                <label class="switch">

                <input type="checkbox" class="this-status" checked

                    data-status="/panel/section/status/${element.section_id}"> 

                <span class="slider round"></span>

                </label>

            </td>

            <td aria-label='created at'><${element.section_created_at}</td>

        </tr>
        `;
    });

    $('.search_table').html(html);
}

function image_search(json, arg = false)
{
    html = [];

    json.image.forEach((element) => {
        html += 
        `  
            
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
        `;
    });

    $('.search_table').html(html);
}

function guest_search(json, arg = false)
{
    html = [];

    json.guest.forEach((element) => {
        html += 
        `  
            <tr>
                <td aria-label='id'># ${element.guest_id}</td>
                <td aria-label='ip address'>${element.guest_ip}</td>
                <td aria-label='last visit'>${element.guest_last_visit}</td>
                <td aria-label='country'>${element.guest_country}</td>
                <td aria-label='code'>${element.guest_country_code}</td>
                <td aria-label='city'>${element.guest_city}</td>
                <td aria-label='lat'>${element.guest_lat}</td>
                <td aria-label='lon'>${element.guest_lon}</td>
                <td aria-label='isp'>${element.guest_isp}</td>
                <td aria-label='as'>${element.guest_as}</td>
                <td aria-label='query'>${element.guest_query}</td>
                <td aria-label='type'>${element.guest_type}</td>
                <td aria-label='mode'>${element.guest_mode}</td>
                <td aria-label='created at'>${element.guest_created_at}</td>
            </tr>
        `;
    });

    $('.search_table').html(html);
}

function chat_search(json, arg = false)
{
    html = [];

    json.chat.forEach((element) => {
        html += 
        `  
        <tr>
            
            <td aria-label='delete'>
                
                <a data-del="/panel/chat/delete/${element.chat_id}" class="this-del">
                
                    <img src="${svg1}delete.svg">
                
                </a>
            </td>
            
            <td aria-label='id'># ${element.chat_id}</td>
            
            <td aria-label='user'>${element.user_login}</td>
            
            <td aria-label='chat'>${element.chat_text}</td>
            
            <td aria-label='created at'>${element.chat_created_at}</td>
        
        </tr>
        `;
    });

    $('.search_table').html(html);
}

function comment_search(json, arg = false)
{
    html = [];

    json.comment.forEach((element) => {
        html += 
        `  

        <tr data-tr="/panel/comment/load/more/${element.article_id}/${element.comment_id}" class="data-tr">

            <td aria-label='id'># ${element.comment_id}</td>

            <td aria-label='user'>${element.user_login}</td>

            <td aria-label='comment'>

                <div>

                    ${element.comment_text}

                </div>

               <span>

                    <a data-get="/comment/rating/like/${element.comment_id}" class="data-get">

                        <img src="${svg1}like.svg">

                        <span>${element.comment_like}</span>

                    </a>

                </span>

                <span>

                    <a data-get="/comment/rating/dislike/${element.comment_id}" class="data-get">

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
        `;
    });

    $('.search_table').html(html);
}

function ad_search(json, arg = false)
{
    html = [];

    json.ad.forEach((element) => {
        html += 
        `  
       <tr>
        
            <td aria-label='delete'>
        
                <a data-del="/panel/ad/delete/${element.ad_id}" class="this-del">
        
                    <img src="${svg1}delete.svg">
        
                </a>
        
            </td>
        
            <td aria-label='update'>
        
                <a data-load="/panel/ad/update/${element.ad_id}" class="load_btn"
        
                    data-id="${element.ad_id}">
        
                    <img src="${svg1}update.svg">
        
                </a>
        
            </td>
        
            <td aria-label='id'># ${element.ad_id}</td>
        
            <td aria-label='title'>${element.ad_title.substring(0, 30)}</td>
        
            <td aria-label='link'>${element.ad_link.substring(0, 30)}</td>
        
            <td aria-label='content'>${element.ad_content.substring(0, 50)}</td>
        
        </tr>
        `;
    });

    $('.search_table').html(html);
}
