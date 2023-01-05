<?php 

use core\app;
// ([0-9a-zA-Z-_]+)
// ([0-9a-zA-Z-_]+)

/*home*/
app::get('/', '/home/home', 'main');
app::get('/home', '/home/home', 'main');
app::get('/page/([0-9]+)', '/home/home', 'main');

app::get('/dd', '/home/dd', 'main');

/*error*/
app::get('/404', '/error/PageNotFound', 'main');

/*about*/
app::get('/about', '/about/about', 'main');

/*article*/
app::get('/article/([0-9a-zA-Z-_]+)/([0-9a-zA-Z-_]+)/([0-9a-zA-Z-_]+)', 
	'/article/article/([0-9a-zA-Z-_]+)', 'main');

app::get('/article/download/([0-9]+)', '/article/_articleDownload/([0-9]+)', 'main');

/*category*/
app::get('/category', '/category/category', 'main');
app::get('/category/page/([0-9]+)', '/category/category', 'main');

app::get('/category/([0-9a-zA-Z-_]+)/([0-9a-zA-Z-_]+)', 
	'/category/articleByCategory/([0-9a-zA-Z-_]+)/([0-9a-zA-Z-_]+)', 'main');

app::get('/category/([0-9a-zA-Z-_]+)/([0-9a-zA-Z-_]+)/page/([0-9]+)', 
	'/category/articleByCategory/([0-9a-zA-Z-_]+)/([0-9a-zA-Z-_]+)', 'main');

/*search*/
app::post('/search', '/search/__articleSearch', 'main');

/*sign*/
app::get('/auth', '/auth/auth', 'main', ['ifNotLogin']);
app::post('/auth', '/auth/__auth', 'main', ['ifNotLogin']);
app::get('/logout', '/auth/_logout', 'main', ['ifLogin']);

/*chat*/
app::post('/chat', '/chat/__sendMessage', 'main', ['Auth']);
app::get('/chat/load/more/([0-9]+)', '/chat/_chatLoadMore/([0-9]+)', 'main');

/*comment*/
app::post('/comment', '/comment/__addComment', 'main', ['Auth']);
app::get('/comment/delete/([0-9]+)', '/comment/_commentDelete/([0-9]+)', 'main', ['isAdmin']);
app::get('/comment/rating/([0-9a-zA-Z-_]+)/([0-9]+)', '/comment/_commentRating/([0-9a-zA-Z-_]+)/([0-9]+)', 'main', ['Auth']);
app::get('/comment/load/more/([0-9]+)/([0-9]+)', '/comment/_commentLoadMore/([0-9]+)/([0-9]+)', 'main');

/*voting*/
app::get('/voting/vote/([0-9a-zA-Z-_]+)/([0-9]+)', '/voting/_vote/([0-9a-zA-Z-_]+)/([0-9]+)', 'main');

/*post*/
app::get('/post/load/more/([0-9]+)/([0-9]+)', '/post/_postLoadMore/([0-9]+)/([0-9]+)', 'main');
