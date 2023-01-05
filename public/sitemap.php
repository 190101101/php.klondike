<?php header('Content-type: application/xml; charset="utf8"',true); ?>

<urlset 

xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"

xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"

xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"

xmlns:example="http://www.example.com/schemas/example_schema">



<url>

	<loc>https://<?php echo $_SERVER['HTTP_HOST'];?></loc>

	<lastmod><?php echo date("Y-m-d"); ?></lastmod>

	<changefreq>daily</changefreq>

	<priority>1.00</priority>

</url>


<?php 

require_once '../vendor/autoload.php';

require_once '../boot/define.php';

use library\triangle;

$db = new triangle;


$article = $db->t3where('article', 'category', 'section', 
    'article.article_status=1 ORDER BY article_id DESC LIMIT 15', [], 2);

// dd($article);
?>

<?php foreach($article as $article) { ?>
<url>

	<loc>https://<?php echo $_SERVER['HTTP_HOST'].'/article/'.$article->section_slug.'/'.$article->category_slug.'/'.$article->article_slug ?></loc>

	<lastmod><?php echo date("Y-m-d"); ?></lastmod>

	<changefreq>daily</changefreq>

	<priority>0.9</priority>

</url>

<?php 
	
}

$category = $db->t2where('category', 'section', 
        'category.category_status=1 ORDER BY category_id DESC', [], 2);

foreach($category as $category){ ?>
<url>

	<loc>https://<?php echo $_SERVER['HTTP_HOST'].'/category/'.$category->section_slug.'/'.$category->category_slug; ?></loc>

	<lastmod><?php echo date("Y-m-d"); ?></lastmod>

	<changefreq>daily</changefreq>

	<priority>0.9</priority>

</url>
<?php } ?>

</urlset>
