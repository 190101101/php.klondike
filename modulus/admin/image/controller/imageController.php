<?php 

namespace modulus\admin\image\controller;
use modulus\admin\image\model\imageModel;
use core\controller;
use \library\pagination as p;

class imageController extends controller
{
    public $image;
    
    public function __construct()
    {
        $this->image = new imageModel();
        $this->p = new p();
    }

    public function image()
    {
        $this->layout('admin', 'admin', 'image', 'image', [
            'page' => $p = $this->p->p($this->image->imageCount(), 10),
            'image' => $this->image->image($p->start, $p->limit)
        ]);
    }

    public function __imageCreate()
    {
        $this->image->__imageCreate();
    }

    public function _imageDelete($id)
    {
        $this->image->_imageDelete($id);
    }

    public function imageByArticle($article_id)
    {
        $this->view('admin', 'image', 'imageByArticle', (object) [
            'image' => $this->image->imageByArticle($article_id),
            'article_id' => $article_id,
        ]);
    }

    public function _imageLoadMore($article_id, $start_id)
    {
        $this->image->_imageLoadMore($article_id, $start_id);
    }

    public function imageSearch()
    {
        $this->view('admin', 'image', 'imageSearch');
    }

    public function __imageSearch()
    {
        $this->layout('admin', 'admin', 'image', 'imageSearch', [
            'image' => $this->image->__imageSearch(),
            'search' => $post,
        ]);
    }
}

