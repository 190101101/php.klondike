<?php 

namespace modulus\main\article\controller;
use modulus\main\article\model\articleModel;
use core\controller;

class articleController extends controller
{
    public $article;
    
    public function __construct()
    {
        $this->article = new articleModel();
    }

    public function article($section_slug, $category_slug, $article_slug)
    {
        $article_id = $this->article->articleBySlug($article_slug);

        $this->layout('main', 'main', 'article', 'article', [
            
            'ad' => $this->article->ad(),
            
            'similar' => $this->article->similar(),
            
            'image' => $this->article->image($article_id),
            
            'comment' => $this->article->comments($article_id),
            
            'article' => $this->article->article($section_slug, $category_slug, $article_id)
            
        ]);
    }

    public function _articleDownload($article_id)
    {
        $this->article->_articleDownload($article_id);
    }
}

