<?php 

namespace modulus\admin\article\controller;
use modulus\admin\article\model\articleModel;
use core\controller;
use \library\pagination as p;

class articleController extends controller
{
    public $article;
    
    public function __construct()
    {
        $this->article = new articleModel();
        $this->p = new p();
    }

    public function article()
    {
        $this->layout('admin', 'admin', 'article', 'article', [
            'page' => $p = $this->p->p($this->article->articleCount(), 10),
            'article' => $this->article->articles($p->start, $p->limit)
        ]);
    }

    public function articleCreate()
    {
        $this->view('admin', 'article', 'articleCreate', (object)[
            'category' => $this->article->category()
        ]);
    }

    public function __articleCreate()
    {
        $this->article->__articleCreate();
    }

    public function _articleUpdate($id)
    {
        $this->view('admin', 'article', 'articleUpdate', (object) [
            'category' => $this->article->category(),
            'article' => $this->article->_articleUpdate($id)
        ]);
    }

    public function __articleUpdate()
    {
        $this->article->__articleUpdate();
    }

    public function _articleDelete($id)
    {
        $this->article->_articleDelete($id);
    }

    public function articleByCategory($section_slug, $category_slug)
    {
        $this->layout('admin', 'admin', 'article', 'articleByCategory', [
            'category' => $this->article->categoryBySlug($section_slug, $category_slug),
            'page' => $p = $this->p->p($this->article->articleByCategoryCount($section_slug, $category_slug), 10),
            'article' => $this->article->articleByCategory($section_slug, $category_slug, $p->start, $p->limit)
        ]);
    }

    public function articleStatus($article_id)
    {
        $this->article->articleStatus($article_id);
    }

    public function articleSearch()
    {
        $this->view('admin', 'article', 'articleSearch');
    }

    public function __articleSearch()
    {
        $this->layout('admin', 'admin', 'article', 'articleSearch', [
            'article' => $this->article->__articleSearch(),
            'search' => $post,
        ]);
    }
}

