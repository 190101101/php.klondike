<?php 

namespace modulus\main\post\controller;
use modulus\main\post\model\postModel;
use core\controller;

class postController extends controller
{
    public $post;
    
    public function __construct()
    {
        $this->post = new postModel();
    }

    public function _postLoadMore($notice_id, $start)
    {
        $this->post->_postLoadMore($notice_id, $start);
    }
}

