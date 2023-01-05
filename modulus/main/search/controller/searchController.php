<?php 

namespace modulus\main\search\controller;
use modulus\main\search\model\searchModel;
use core\controller;

class searchController extends controller
{
    public $search;
    
    public function __construct()
    {
        $this->search = new searchModel();
    }

    public function __articleSearch()
    {
        $post = $this->search->__articleSearchCheck();

        $this->layout('main', 'main', 'search', 'articleSearch', [
            'article' => $this->search->__articleSearch($post),
            'search' => $post,
        ]);
    }
}

