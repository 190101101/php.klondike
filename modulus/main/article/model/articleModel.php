<?php 

namespace modulus\main\article\model;
use core\model;
use \library\message;
use \library\http;

class articleModel extends model
{

    public function articleBySlug($article_slug)
    {
        $article = $this->db->t1where('article', 'article_slug=?', [$article_slug]);

        if($article)
        {
            return $article->article_id;
        }
        else
        {
            (new message)->code(300)->return('not_found')->http('home')->get();
        }
    }

    public function image($article_id)
    {
        return $this->db->t1where('image', 'article_id=?', [$article_id], 2);
    }

    public function ad()
    {
        return $this->db->t1where('ad', 'ad_status=1 ORDER BY ad_id LIMIT 4 ', [], 2);
    }

    public function similar()
    {
        return $this->db->t3where('article', 'category', 'section',
            'article.article_status=1 LIMIT 3 ', [
        ], 2);
    }

    public function article($section_slug, $category_slug, $article_id)
    {
        $article = $this->db->t3where('article', 'category', 'section', 
            "section.section_status=1 AND section_slug=? AND category.category_status=1 AND category_slug=? AND article_id=? AND article_status=1", [
                $section_slug, $category_slug, $article_id
            ]);

        if($article)
        {
            return $article;
        }
        else
        {
            (new message)->code(300)->return('not_found')->http('home')->get();
        }
    }

    public function comments($article_id)
    {
        return $this->db->sql("SELECT comment.*, user.*, article.*  FROM comment
            
            INNER JOIN article ON article.article_id = comment.article_id
            
            INNER JOIN user ON user.user_id = comment.user_id
            
            WHERE comment.comment_status=1 AND article.article_id = {$article_id} 

            ORDER BY comment_id DESC LIMIT 10

        ", 2);
    }

    public function _articleDownload($article_id)
    {
        if(REFERER() == FALSE)
        {
            (new message)->code(300)->return('error_request')->get()->http('home');
        }

        $exploded = explode('/', REFERER());
        
        $count = count($exploded) - 1;

        $article = $this->db->t1where('article', 'article_status=1 && article_id=?', [$article_id]);

        if($article == FALSE)
        {
            (new message)->code(300)->return('not_found_anythink')->get()->referer();
        }

        if($article->article_slug != $exploded[$count])
        {
            (new message)->code(300)->return('error_reques')->get()->http('home');
        }

        if(empty($article->article_archive) || empty($article->article_archivesize))
        {
            (new message)->code(300)->return('not_found_anythink')->get()->referer();
        }

        $this->db->create('download',[
            'article_id' => $article->article_id,
            'user_id' => user_id() ?: NULL,
            'ip_address' => REMOTE_ADDR(),
        ]);

        $this->db->whereupdate('article', 'article_download = article_download + 1', 'article_id=?', [$article_id]);

        $this->db->whereupdate('setting', 'setting_value = setting_value + 1', 'setting_key=?', ['download']);

        google_drive_export_file($article->article_archive);
    }
}
