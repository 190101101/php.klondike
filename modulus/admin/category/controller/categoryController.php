<?php 

namespace modulus\admin\category\controller;
use modulus\admin\category\model\categoryModel;
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
        $this->layout('admin', 'admin', 'category', 'category', [
            'page' => $p = $this->p->p($this->category->categoryCount(), 10),
            'category' => $this->category->category($p->start, $p->limit)
        ]);
    }

    public function categoryCreate()
    {
        $this->view('admin', 'category', 'categoryCreate', (object) [
            'section' => $this->category->section()
        ]);
    }

    public function __categoryCreate()
    {
        $this->category->__categoryCreate();
    }

    public function _categoryUpdate($id)
    {
        $this->view('admin', 'category', 'categoryUpdate', (object) [
            'section' => $this->category->section(),
            'category' => $this->category->_categoryUpdate($id)
        ]);
    }

    public function __categoryUpdate()
    {
        $this->category->__categoryUpdate();
    }

    public function _categoryDelete($id)
    {
        $this->category->_categoryDelete($id);
    }

    public function categoryStatus($category_id)
    {
        $this->category->categoryStatus($category_id);
    }

    public function categoryBySection($section_slug)
    {
        $this->layout('admin', 'admin', 'category', 'categoryBysection', [
            'section' => $this->category->sectionSlug($section_slug),
            'page' => $p = $this->p->p($this->category->categoryBySectionCount($section_slug), 10),
            'category' => $this->category->categoryBySection($section_slug, $p->start, $p->limit)
        ]);
    }

    public function categorySearch()
    {
        $this->view('admin', 'category', 'categorySearch');
    }

    public function __categorySearch()
    {
        $this->layout('admin', 'admin', 'category', 'categorySearch', [
            'category' => $this->category->__categorySearch(),
            'search' => $post,
        ]);
    }
}



