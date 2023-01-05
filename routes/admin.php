<?php 

use core\app;
// ([0-9a-zA-Z-_]+)
// ([0-9a-zA-Z-_]+)
// (.*?)


/*panel*/
app::get('/panel/admin', '/panel/panel', 'admin', ['panel']);
app::get('/panel/admin/(.*?)', '/panel/panel/(.*?)', 'admin', ['panel']);

/*article*/
app::get('/panel/article', '/article/article', 'admin', ['panel']);
app::get('/panel/article/page/([0-9]+)', '/article/article', 'admin', ['panel']);
app::post('/panel/article/status/([0-9]+)', '/article/articleStatus/([0-9]+)', 'admin', ['panel']);

app::get('/panel/article', '/article/articleByCategory', 'admin', ['panel']);
app::get('/panel/article/page/([0-9]+)', '/article/articleByCategory', 'admin', ['panel']);

app::get('/panel/article/category/([0-9a-zA-Z-_]+)/([0-9a-zA-Z-_]+)', 
	'/article/articleByCategory/([0-9a-zA-Z-_]+)/([0-9a-zA-Z-_]+)', 'admin', ['panel']);

app::get('/panel/article/category/([0-9a-zA-Z-_]+)/([0-9a-zA-Z-_]+)/page/([0-9]+)', 
	'/article/articleByCategory/([0-9a-zA-Z-_]+)/([0-9a-zA-Z-_]+)', 'admin', ['panel']);

app::get('/panel/article/create', '/article/articleCreate', 'admin', ['panel']);
app::post('/panel/article/create', '/article/__articleCreate', 'admin', ['panel']);

/*search*/
app::get('/panel/article/search', '/article/articleSearch', 'admin', ['panel']);
app::post('/panel/article/search', '/article/__articleSearch', 'admin', ['panel']);

app::get('/panel/article/update/([0-9]+)', '/article/_articleUpdate/([0-9]+)', 'admin', ['panel']);
app::post('/panel/article/update', '/article/__articleUpdate', 'admin');

app::get('/panel/article/delete/([0-9]+)', '/article/_articleDelete/([0-9]+)', 'admin', ['panel']);

/*category*/
app::get('/panel/category', '/category/category', 'admin', ['panel']);
app::get('/panel/category/page/([0-9]+)', '/category/category', 'admin', ['panel']);
app::post('/panel/category/status/([0-9]+)', '/category/categoryStatus/([0-9]+)', 'admin', ['panel']);
app::get('/panel/category/search', '/category/categorySearch', 'admin', ['panel']);

app::get('/panel/category/create', '/category/categoryCreate', 'admin', ['panel']);
app::post('/panel/category/create', '/category/__categoryCreate', 'admin', ['panel']);

app::get('/panel/category/update/([0-9]+)', '/category/_categoryUpdate/([0-9]+)', 'admin', ['panel']);
app::post('/panel/category/update', '/category/__categoryUpdate', 'admin', ['panel']);

app::get('/panel/category/delete/([0-9]+)', '/category/_categoryDelete/([0-9]+)', 'admin', ['panel']);

app::get('/panel/category/section/([0-9a-zA-Z-_]+)/page/1', '/category/categoryBySection/([0-9a-zA-Z-_]+)', 'admin', ['panel']);
app::get('/panel/category/section/([0-9a-zA-Z-_]+)/page/([0-9]+)', '/category/categoryBySection/([0-9a-zA-Z-_]+)', 'admin', ['panel']);

app::post('/panel/category/search', '/category/__categorySearch', 'admin', ['panel']);

/*section*/
app::get('/panel/section', '/section/section', 'admin', ['panel']);
app::get('/panel/section/page/([0-9]+)', '/section/section', 'admin', ['panel']);
app::post('/panel/section/status/([0-9]+)', '/section/sectionStatus/([0-9]+)', 'admin', ['panel']);

/*search*/
app::get('/panel/section/search', '/section/sectionSearch', 'admin', ['panel']);
app::post('/panel/section/search', '/section/__sectionSearch', 'admin', ['panel']);


app::get('/panel/section/create', '/section/sectionCreate', 'admin', ['panel']);
app::post('/panel/section/create', '/section/__sectionCreate', 'admin', ['panel']);

app::get('/panel/section/update/([0-9]+)', '/section/_sectionUpdate/([0-9]+)', 'admin', ['panel']);
app::post('/panel/section/update', '/section/__sectionUpdate', 'admin', ['panel']);

app::get('/panel/section/delete/([0-9]+)', '/section/_sectionDelete/([0-9]+)', 'admin', ['panel']);

/*notice*/
app::get('/panel/notice', '/notice/notice', 'admin', ['panel']);
app::get('/panel/notice/page/([0-9]+)', '/notice/notice', 'admin', ['panel']);
app::post('/panel/notice/status/([0-9]+)', '/notice/noticeStatus/([0-9]+)', 'admin', ['panel']);

app::get('/panel/notice/create', '/notice/noticeCreate', 'admin', ['panel']);
app::post('/panel/notice/create', '/notice/__noticeCreate', 'admin', ['panel']);

app::get('/panel/notice/update/([0-9]+)', '/notice/_noticeUpdate/([0-9]+)', 'admin', ['panel']);
app::post('/panel/notice/update', '/notice/__noticeUpdate', 'admin', ['panel']);

app::get('/panel/notice/delete/([0-9]+)', '/notice/_noticeDelete/([0-9]+)', 'admin', ['panel']);

app::get('/panel/notice/search', '/notice/noticeSearch', 'admin', ['panel']);
app::post('/panel/notice/search', '/notice/__noticeSearch', 'admin', ['panel']);

/*post*/
app::get('/panel/post', '/post/post', 'admin', ['panel']);
app::get('/panel/post/page/([0-9]+)', '/post/post', 'admin', ['panel']);
app::post('/panel/post/status/([0-9]+)', '/post/postStatus/([0-9]+)', 'admin', ['panel']);

app::get('/panel/post/create', '/post/postCreate', 'admin', ['panel']);
app::post('/panel/post/create', '/post/__postCreate', 'admin', ['panel']);

app::get('/panel/post/update/([0-9]+)', '/post/_postUpdate/([0-9]+)', 'admin', ['panel']);
app::post('/panel/post/update', '/post/__postUpdate', 'admin', ['panel']);

app::get('/panel/post/delete/([0-9]+)', '/post/_postDelete/([0-9]+)', 'admin', ['panel']);

app::get('/panel/post/notice/([0-9a-zA-Z-_]+)/page/1', '/post/postByNotice/([0-9a-zA-Z-_]+)', 'admin', ['panel']);
app::get('/panel/post/notice/([0-9a-zA-Z-_]+)/page/([0-9]+)', '/post/postByNotice/([0-9a-zA-Z-_]+)', 'admin', ['panel']);

app::get('/panel/post/search', '/post/postSearch', 'admin', ['panel']);
app::post('/panel/post/search', '/post/__postSearch', 'admin', ['panel']);

/*user*/
app::get('/panel/user', '/user/user', 'admin', ['panel']);
app::get('/panel/user/page/([0-9]+)', '/user/user', 'admin', ['panel']);
app::post('/panel/user/status/([0-9]+)', '/user/userStatus/([0-9]+)', 'admin', ['panel']);

app::get('/panel/user/create', '/user/userCreate', 'admin', ['panel']);
app::post('/panel/user/create', '/user/__userCreate', 'admin', ['panel']);

app::get('/panel/user/update/([0-9]+)', '/user/_userUpdate/([0-9]+)', 'admin', ['panel']);
app::post('/panel/user/update', '/user/__userUpdate', 'admin', ['panel']);

app::get('/panel/user/delete/([0-9]+)', '/user/_userDelete/([0-9]+)', 'admin', ['panel']);

app::get('/panel/user/search', '/user/userSearch', 'admin', ['panel']);
app::post('/panel/user/search', '/user/__userSearch', 'admin', ['panel']);


/*guest*/
app::get('/panel/guest', '/guest/guest', 'admin', ['panel']);
app::get('/panel/guest/page/([0-9]+)', '/guest/guest', 'admin', ['panel']);

app::get('/panel/guest/read/([0-9]+)', '/guest/guestRead/([0-9]+)', 'admin', ['panel']);

app::get('/panel/guest/delete/([0-9]+)', '/guest/_guestDelete/([0-9]+)', 'admin', ['panel']);
app::get('/panel/guest/status', '/guest/_guestStatus', 'admin', ['panel']);

app::get('/panel/guest/search', '/guest/guestSearch', 'admin', ['panel']);
app::post('/panel/guest/search', '/guest/__guestSearch', 'admin', ['panel']);


/*ad*/
app::get('/panel/ad', '/ad/ad', 'admin', ['panel']);
app::get('/panel/ad/page/([0-9]+)', '/ad/ad', 'admin', ['panel']);

app::get('/panel/ad/create', '/ad/adCreate', 'admin', ['panel']);
app::post('/panel/ad/create', '/ad/__adCreate', 'admin', ['panel']);

app::get('/panel/ad/update/([0-9]+)', '/ad/_adUpdate/([0-9]+)', 'admin', ['panel']);
app::post('/panel/ad/update', '/ad/__adUpdate', 'admin', ['panel']);

app::get('/panel/ad/delete/([0-9]+)', '/ad/_adDelete/([0-9]+)', 'admin', ['panel']);

app::get('/panel/ad/search', '/ad/adSearch', 'admin', ['panel']);
app::post('/panel/ad/search', '/ad/__adSearch', 'admin', ['panel']);

/*voting*/
app::get('/panel/voting', '/voting/voting', 'admin', ['panel']);
app::get('/panel/voting/page/([0-9]+)', '/voting/voting', 'admin', ['panel']);
app::post('/panel/voting/status/([0-9]+)', '/voting/votingStatus/([0-9]+)', 'admin', ['panel']);

app::get('/panel/voting/create', '/voting/votingCreate', 'admin', ['panel']);
app::post('/panel/voting/create', '/voting/__votingCreate', 'admin', ['panel']);

app::get('/panel/voting/update/([0-9]+)', '/voting/_votingUpdate/([0-9]+)', 'admin', ['panel']);
app::post('/panel/voting/update', '/voting/__votingUpdate', 'admin', ['panel']);

app::get('/panel/voting/delete/([0-9]+)', '/voting/_votingDelete/([0-9]+)', 'admin', ['panel']);

/*comment*/
app::get('/panel/comment', '/comment/comment', 'admin', ['panel']);
app::get('/panel/comment/page/([0-9]+)', '/comment/comment', 'admin', ['panel']);

app::get('/panel/comment/create', '/comment/commentCreate', 'admin', ['panel']);
app::post('/panel/comment/create', '/comment/__commentCreate', 'admin', ['panel']);

app::get('/panel/comment/update/([0-9]+)', '/comment/_commentUpdate/([0-9]+)', 'admin', ['panel']);
app::post('/panel/comment/update', '/comment/__commentUpdate', 'admin', ['panel']);

app::get('/panel/comment/delete/([0-9]+)', '/comment/_commentDelete/([0-9]+)', 'admin', ['panel']);

app::get('/panel/comment/read/([0-9]+)', '/comment/commentRead/([0-9]+)', 'admin', ['panel']);

app::get('/panel/comment/article/([0-9]+)', '/comment/commentByArticle', 'admin', ['panel']);
app::get('/panel/comment/load/more/([0-9]+)/([0-9]+)', '/comment/_commentLoadMore/([0-9]+)/([0-9]+)', 'admin', ['panel']);

app::get('/panel/comment/rating/([0-9a-zA-Z-_]+)/([0-9]+)', '/comment/_commentRating/([0-9a-zA-Z-_]+)/([0-9]+)', 'admin', ['panel']);

app::get('/panel/comment/search', '/comment/commentSearch', 'admin', ['panel']);
app::post('/panel/comment/search', '/comment/__commentSearch', 'admin', ['panel']);


/*image*/
app::get('/panel/image', '/image/image', 'admin', ['panel']);
app::get('/panel/image/page/([0-9]+)', '/image/image', 'admin', ['panel']);

app::get('/panel/image/create', '/image/imageCreate', 'admin', ['panel']);
app::post('/panel/image/create', '/image/__imageCreate', 'admin', ['panel']);

app::get('/panel/image/update/([0-9]+)', '/image/_imageUpdate/([0-9]+)', 'admin', ['panel']);
app::post('/panel/image/update', '/image/__imageUpdate', 'admin', ['panel']);

app::get('/panel/image/delete/([0-9]+)', '/image/_imageDelete/([0-9]+)', 'admin', ['panel']);

app::get('/panel/image/article/([0-9]+)', '/image/imageByArticle/([0-9]+)', 'admin', ['panel']);
app::get('/panel/image/load/more/([0-9]+)/([0-9]+)', '/image/_imageLoadMore/([0-9]+)/([0-9]+)', 'admin', ['panel']);

app::get('/panel/image/search', '/image/imageSearch', 'admin', ['panel']);
app::post('/panel/image/search', '/image/__imageSearch', 'admin', ['panel']);


/*chat*/
app::get('/panel/chat', '/chat/chat', 'admin', ['panel']);
app::get('/panel/chat/page/([0-9]+)', '/chat/chat', 'admin', ['panel']);

app::get('/panel/chat/delete/([0-9]+)', '/chat/_chatDelete/([0-9]+)', 'admin', ['panel']);

app::get('/panel/chat/create', '/chat/chatCreate', 'admin', ['panel']);
app::post('/panel/chat/create', '/chat/__chatCreate', 'admin', ['panel']);

app::get('/panel/chat/search', '/chat/chatSearch', 'admin', ['panel']);
app::post('/panel/chat/search', '/chat/__chatSearch', 'admin', ['panel']);

/*download*/
app::get('/panel/download', '/download/download', 'admin', ['panel']);
app::get('/panel/download/page/([0-9]+)', '/download/download', 'admin', ['panel']);


/*setting*/
app::get('/panel/setting', '/setting/setting', 'admin', ['panel']);
app::get('/panel/setting/page/([0-9]+)', '/setting/setting', 'admin', ['panel']);

app::get('/panel/setting/update/([0-9]+)', '/setting/_settingUpdate/([0-9]+)', 'admin', ['panel']);
app::post('/panel/setting/update', '/setting/__settingUpdate', 'admin');