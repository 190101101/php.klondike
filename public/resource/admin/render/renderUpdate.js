function user_update(json)
{
	user = json.user;

    $('.data_form').html(`

		<div class="form_box">
		    <label>user login</label>
		    <input type="text" name="user_login" value="${user.user_login}" required>
		</div>

		<div class="form_box">
		    <label>user password</label>
		    <input type="text" name="user_password" value="${user.user_password}" required>
		</div>

		<div class="form_box">
		    <input type="color" name="user_color" value="${user.user_color}" required>
		</div>

		<div class="form_box">
		    <label>user level</label>
		    <input type="text" name="user_level" value="${user.user_level}" required>
		</div>

		<div class="form_box">
		    <label>user updated at</label>
		    <input type="text" value="${user.user_updated_at}" readonly>
		</div>

		<div class="form_box">
		    <label>user created at</label>
		    <input type="text" value="${user.user_created_at}" readonly>
		</div>

		<div class="form_box">
		    <input type="hidden" name="user_id" value="${user.user_id}" readonly required>
		    <input type="hidden" name="user_updated_at" value="">
		    <button>update</button>
		</div>

	`);

    $('.table-media tr').find("a[data-id='"+ user.user_id +"']").parents('.table-media tr').html(`
		
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
		
		    <input type="checkbox" checked class="this-status" 

		    data-status="/panel/user/status/${user.user_id}" > 
		
		    	<span class="slider round"></span>
		
		    </label>
		
		</td>
		
		<td aria-label='level'>${user.user_level}</td>    	
	`);
}


function ad_update(json)
{
	ad = json.ad;

    $('.data_form').html(`
	    <div class="form_box">
	        <label>ad title</label>
	        <input type="text" name="ad_title" value="${ad.ad_title}" required>
	    </div>

	    <div class="form_box">
	        <label>ad link</label>
	        <input type="url" name="ad_link" value="${ad.ad_link}" required>
	    </div>

	    <div class="form_box">
	        <label>ad content</label>
	        <input type="text" name="ad_content" value="${ad.ad_content}" required>
	    </div>

	    <div class="form_box">
	        <button>create</button>
	    </div>
    `);

    $('.table-media tr').find("a[data-id='"+ ad.ad_id +"']").parents('.table-media tr').html(`

        <td aria-label='delete'>
    
            <a data-del="/panel/ad/delete/${ad.ad_id}" class="this-del">
    
                <img src="${svg1}delete.svg">
    
            </a>
    
        </td>
    
        <td aria-label='update'>
    
            <a data-load="/panel/ad/update/${ad.ad_id}" 
    
                data-id="${ad.ad_id}">
    
                <img src="${svg1}update.svg">
    
            </a>
    
        </td>
    
        <td aria-label='id'># ${ad.ad_id}</td>
    
        <td aria-label='title'>${ad.ad_title}</td>
    
        <td aria-label='link'>${ad.ad_link}</td>
    
        <td aria-label='content'>${ad.ad_content}</td>
	`);

}

function voting_update(json)
{
	voting = json.voting;

    $('.data_form').html(`
		<div class="form_box">
		    <label>voting content</label>
		    <input type="text" name="voting_content" value="${voting.voting_content}" required>
		</div>

		<div class="form_box">
		    <label>option a</label>
		    <input type="text" name="voting_option_a" value="${voting.voting_option_a}" required>
		</div>

		<div class="form_box">
		    <label>option b</label>
		    <input type="text" name="voting_option_b" value="${voting.voting_option_b}" required>
		</div>

		<div class="form_box">
		    <label>vote count a</label>
		    <input type="text" name="voting_vote_count_a" value="${voting.voting_vote_count_a}" required>
		</div>

		<div class="form_box">
		    <label>vote count b</label>
		    <input type="text" name="voting_vote_count_b" value="${voting.voting_vote_count_b}" required>
		</div>

		<div class="form_box">
		    <label>vote count total</label>
		    <input type="text" name="voting_vote_count_total" value="${voting.voting_vote_count_total}" readonly>
		</div>

		<div class="form_box">
		    <label>voting vote percent a</label>
		    <input type="text" value="${voting.voting_vote_percent_a}" readonly>
		</div>

		<div class="form_box">
		    <label>voting vote percent b</label>
		    <input type="text" value="${voting.voting_vote_percent_b}" readonly>
		</div>

		<div class="form_box">
		    <select name="voting_type" required>
		        <option value="${voting.voting_type}" selected>${voting.voting_type}</option>
		        <option value="main">main</option>
		        <option value="simple">simple</option>
		    </select>
		</div>

		<div class="form_box">
		    <input type="color" name="voting_color" value="#FF1493" required>
		</div>

		<div class="form_box">
		    <label>voting updated at</label>
		    <input type="text" value="${voting.voting_updated_at}" readonly>
		</div>

		<div class="form_box">
		    <label>voting created at</label>
		    <input type="text" value="${voting.voting_created_at}" readonly>
		</div>

		<div class="form_box">
		    <input type="hidden" name="voting_id" value="${voting.voting_id}" readonly required>
		    <button>update</button>
		</div>
	`);

    $('.table-media tr').find("a[data-id='"+ voting.voting_id +"']").parents('.table-media tr').html(`
    	       
            <td aria-label='delete'>
        
                <a data-del="/panel/voting/delete/${voting.voting_id}" class="this-delete">
        
                    <img src="${svg1}delete.svg">
        
                </a>
        
            </td>
        
            <td aria-label='update'>
        
                <a data-load="/panel/voting/update/${voting.voting_id}" class="load_btn"

                	data-load="${voting.voting_id}">
        
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
	`);
}


function section_update(json, arg = false)
{
	section = json.section;
	
	icon = json.icon;

	html = [];

	html +=
		
		`
		<div class="form_box">
		    <label>section</label>
		    <input type="text" name="section" value="${section.section}" required>
		</div>

		<div class="form_box">
		    <label>section title</label>
		    <input type="text" name="section_title" value="${section.section_title}" required>
		</div>

        <div class="form_box">
            <label>icon</label>
            <select name="section_icon" required>
                <option value="${section.section_icon}" selected>${section.section_icon}</option>`;
				icon.forEach((element) => {
		    		html += `<option value="${element}">${element}</option>`;
				});

    html+=        
		    `</select>
        </div>
		<div class="form_box">
		    <label>section updated at</label>
		    <input type="text" value="${section.section_updated_at}" readonly>
		</div>

		<div class="form_box">
		    <label>section created at</label>
		    <input type="text" value="${section.section_created_at}" readonly>
		</div>

		<div class="form_box">
		    <input type="hidden" name="section_id" value="${section.section_id}" readonly required>
		    <input type="hidden" name="section_updated_at" value="date('Y-m-d H:i:s')">
		    <button>update</button>
		</div>            
	`;

    $('.data_form').html(html);


    $('.table-media tr').find("a[data-id='"+ section.section_id +"']").parents('.table-media tr').html(`

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

	`);
}

function category_update(json)
{
	category = json.category;

	section = json.section;
	
	icon = json.icon;

	html = [];

    html +=
    	`<div class="form_box">
		    <input type="file" name="category_image" id="uploadimage" onchange="imageupload()">
		</div>

		<div class="form_box">
		    <progress class="tagprogress" id="progressBar" value="0" max="100"></progress>
		    <span id="uploadstatus">отчет загруженных файлов</span>
		</div>

		<div class="form_box">
		    <label>category</label>
		    <input type="text" name="category" value="${category.category}" required>
		</div>

		<div class="form_box">
		    <label>title</label>
		    <input type="text" name="category_title" value="${category.category_title}" required>
		</div>

		<div class="form_box">
		    <label>sub title</label>
		    <input type="text" name="category_subtitle" value="${category.category_subtitle}" required>
		</div>
		
		<div class="form_box">
            <label>icon</label>
            <select name="category_icon" required>
                <option value="${category.category_icon}" selected>${category.category_icon}</option>`;

				icon.forEach((element) => {
	        		html += `<option value="${element}">${element}</option>`;
				});
       html +=

            `</select>
        </div>
		
		<div class="form_box">
		    <label>section</label>
		    <select name="section_id" required>
		        <option value="${category.section_id}">${category.section}</option>`;

			        section.forEach((element) => {
		        		html += `<option value="${element.section_id}">${element.section}</option>`
					})
		html +=     
		    `</select>
		</div>

		<div class="form_box">
		    <textarea name="category_content" class="middle">${category.category_content}</textarea>
		</div>

		<div class="form_box">
		    <label>category updated at</label>
		    <input type="text" value="${category.category_updated_at}" readonly>
		</div>

		<div class="form_box">
		    <label>category created at</label>
		    <input type="text" value="${category.category_created_at}" readonly>
		</div>

		<div class="form_box">
		    <input type="hidden" name="category_id" value="${category.category_id}" readonly required>
		    <input type="hidden" name="image_delete" value="${category.category_image}" readonly>
		    <button>update</button>
		</div>
	`;

    $('.data_form').html(html);
    
    $('.table-media tr').find("a[data-id='"+ category.category_id +"']").parents('.table-media tr').html(`

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
    
            <a href="/panel/article/category/${category.sections_slug}/${category.category_slug}">
    
                ${category.category}
    
            </a>
    
        </td>
    
        <td aria-label='title'>${category.category_title.substring(0, 20)}</td>
    
        <td aria-label='sub title'>${category.category_subtitle}</td>
    
        <td aria-label='status'>
    
            <label class="switch">
    
            <input type="checkbox" class="this-status" checked
    
                data-status="/panel/category/status/${category.category_id}"> 
    
            <span class="slider round"></span>
    
            </label>
    
        </td>
    
        <td>${category.category_created_at}</td>
    `);
}

function article_update(json)
{
	article = json.article;
	
	category = json.category;

    html = [];

    html += 

    	`<div class="form_box">
		    <input type="file" name="article_image" id="uploadimage" onchange="imageupload()">
		</div>

		<div class="form_box">
		    <progress class="tagprogress" id="progressBar" value="0" max="100"></progress>
		    <span id="uploadstatus">отчет загруженных файлов</span>
		</div>


		<div class="form_box">
		    <label>article title</label>
		    <input type="text" name="article_title" value="${article.article_title}" required>
		</div>
		
		<div class="form_box">
		    <label>category</label>
		    <select name="category_id" required>
        		<option value="${article.category_id}">${article.category}</option>`;

    			category.forEach((element) => {
	        		html += `<option value="${element.category_id}">${element.category}</option>`
				})
		html += 

			`</select>
		</div>

		<div class="form_box">
		    <textarea name="article_content" class="middle">${article.article_content}</textarea>
		</div>

		<div class="form_box">
		    <div class="input_group">
		        <input style="--width: 79%;" type="text" name="article_archive"
		        value="${article.article_archive}">
		        <input style="--width: 20%;" type="text" name="article_archivesize"
		        value="${article.article_archivesize}">
		    </div>
		</div>

		<div class="form_box">
		    <label>article video</label>
		    <input type="text" name="article_video" value="${article.article_video}">
		</div>

		<div class="form_box">
		    <label>article updated at</label>
		    <input type="text" value="${article.article_updated_at}" readonly>
		</div>

		<div class="form_box">
		    <label>article created at</label>
		    <input type="text" value="${article.article_created_at}" readonly>
		</div>

		<div class="form_box">
		    <input type="hidden" name="article_id" value="${article.article_id}" readonly required>
		    <input type="hidden" name="image_delete" value="${article.article_image}" readonly>
		    <button>update</button>
		</div>
	`;

    $('.data_form').html(html);

    $('.table-media tr').find("a[data-id='"+ article.article_id +"']").parents('.table-media tr').html(`

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

	`);

}


function notice_update(json)
{
	notice = json.notice;

    $('.data_form').html(`
    	<div class="form_box">
		    <input type="file" name="notice_image" id="uploadimage" onchange="imageupload()">
		</div>

		<div class="form_box">
		    <progress class="tagprogress" id="progressBar" value="0" max="100"></progress>
		    <span id="uploadstatus">отчет загруженных файлов</span>
		</div>

		<div class="form_box">
		    <label>notice</label>
		    <input type="text" name="notice" value="${notice.notice}" required>
		</div>

		<div class="form_box">
		    <label>notice title</label>
		    <input type="text" name="notice_title" value="${notice.notice_title.substring(0, 20)}" required>
		</div>

		<div class="form_box">
		    <label>notice updated at</label>
		    <input type="text" value="${notice.notice_updated_at}" readonly>
		</div>

		<div class="form_box">
		    <label>notice created at</label>
		    <input type="text" value="${notice.notice_created_at}" readonly>
		</div>

		<div class="form_box">
		    <input type="hidden" name="notice_id" value="${notice.notice_id}" readonly required>
		    <input type="hidden" name="image_delete" value="${notice.notice_image}" readonly>
		    <button>update</button>
		</div>
	`);

    $('.table-media tr').find("a[data-id='"+ notice.notice_id +"']").parents('.table-media tr').html(`

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
	    
	                data-status="/panel/notice/status/${notice.notice_id}">
	    
	        <span class="slider round"></span>
	    
	        </label>
	    
	    </td>
	    
	    <td aria-label='created at'>${notice.notice_created_at}</td>

	`);
}


function post_update(json)
{

	console.log(json);

	post = json.post;

	notice = json.notice;

	html = [];

	html += 

		`<div class="form_box">
		    <label>image</label>
		    <input type="file" name="post_image" id="uploadimage" onchange="imageupload()">
		</div>

		<div class="form_box">
		    <progress class="tagprogress" id="progressBar" value="0" max="100"></progress>
		    <span id="uploadstatus">отчет загруженных файлов</span>
		</div>

		<div class="form_box">
		    <label>post title</label>
		    <input type="text" name="post_title" value="${post.post_title}" required>
		</div>

		<div class="form_box">
		    <label>notice</label>
		    <select name="notice_id" required>
		        <option value="${post.notice_id}"> ${post.notice} </option>`;

    			notice.forEach((element) => {
	        		html += `<option value="${element.notice_id}">${element.notice}</option>`
				})

    	html += 

		   `</select>
		</div>
		<div class="form_box">
		    <textarea name="post_content" class="middle">${post.post_content}</textarea>
		</div>

		<div class="form_box">
		    <label>post link</label>
		    <input type="text" value="${post.post_link}">
		</div>

		<div class="form_box">
		    <label>post updated at</label>
		    <input type="text" value="${post.post_updated_at}" readonly>
		</div>

		<div class="form_box">
		    <label>post created at</label>
		    <input type="text" value="${post.post_created_at}" readonly>
		</div>

		<div class="form_box">
		    <input type="hidden" name="post_id" value="${post.post_id}" readonly required>
		    <input type="hidden" name="image_delete" value="${post.post_image}" readonly>
		    <button>update</button>
		</div>
	`;
    
    $('.data_form').html(html);

    $('.table-media tr').find("a[data-id='"+ post.post_id +"']").parents('.table-media tr').html(`
		
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
	`);
}


function setting_update(json)
{
	setting = json.setting;

    $('.data_form').html(`

		<div class="form_box">
		
		    <label>description</label>
		
		    <input type="text" name="setting_description" value="${setting.setting_description}" required>
		
		</div>

		<div class="form_box">

		    <label>setting key</label>

		
		    <input type="text" name="setting_key" value="${setting.setting_key}" required>

		</div>

		
		<div class="form_box">

		    <textarea name="setting_value" class='middle' placeholder="setting value">${setting.setting_value}</textarea>
		
		</div>

		
		<div class="form_box">
		
		    <label>updated at</label>
		
		    <input type="text" value="${setting.setting_updated_at}" readonly>
		
		</div>

		<div class="form_box">
		
		    <input type="hidden" name="setting_id" value="${setting.setting_id}" readonly required>

		    <button>update</button>
		
		</div>

	`);

    $('.table-media tr').find("a[data-id='"+ setting.setting_id +"']").parents('.table-media tr').html(`
		
	    <td aria-label='update'>
	    
	        <a data-load="/panel/setting/update/${setting.setting_id}" 
	    
	            class="load_btn"
	    
	            data-id="${setting.setting_id}">
	    
	            <img src="${svg1}update.svg">
	    
	        </a>
	    
	    </td>
	    
	    <td aria-label='id'>#${setting.setting_id}</td>
	    
	    <td aria-label='description'>${setting.setting_description}</td>
	    
	    <td aria-label='key'>${setting.setting_key}</td>
	    
	    <td aria-label='value'>${setting.setting_value.substring(0, 20)}</td>

	`);
}
