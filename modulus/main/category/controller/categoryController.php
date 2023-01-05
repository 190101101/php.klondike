<?php 

namespace modulus\main\category\controller;
use modulus\main\category\model\categoryModel;
use core\controller;
use \library\pagination as p;

class categoryController extends controller
{
    public $category;
    
    public function __construct()
    {
        $this->category = new categoryModel();
        $this->p = new p();
    }

    public function category()
    {
        $this->layout('main', 'main', 'category', 'category', [
            'page' => $p = $this->p->p($this->category->categoryCount(), 10),
            'category' => $this->category->category($p->start, $p->limit)
        ]);
    }

    public function articleByCategory($section_slug, $category_slug)
    {
        $this->layout('main', 'main', 'category', 'articleByCategory', [
            'category' => $this->category->categoryBySlug($section_slug, $category_slug),
            'page' => $p = $this->p->p($this->category->articleByCategoryCount($section_slug, $category_slug), 10),
            'article' => $this->category->articleByCategory($section_slug, $category_slug, $p->start, $p->limit)
        ]);
    }
}

