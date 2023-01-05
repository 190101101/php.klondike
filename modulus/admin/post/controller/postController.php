<?php 

namespace modulus\admin\post\controller;
use modulus\admin\post\model\postModel;
use core\controller;
use \library\pagination as p;

class postController extends controller
{
    public $post;
    
    public function __construct()
    {
        $this->post = new postModel();
        $this->p = new p();
    }

    public function post()
    {
        $this->layout('admin', 'admin', 'post', 'post', [
            'page' => $p = $this->p->p($this->post->postCount(), 10),
            'post' => $this->post->post($p->start, $p->limit)
        ]);
    }

    public function postCreate()
    {
        $this->view('admin', 'post', 'postCreate', (object)[
            'notice' => $this->post->notice()
        ]);
    }

    public function __postCreate()
    {
        $this->post->__postCreate();
    }

    public function _postUpdate($id)
    {
        $this->view('admin', 'post', 'postUpdate', (object)[
            'notice' => $this->post->notice(),
            'post' => $this->post->_postUpdate($id)
        ]);
    }

    public function __postUpdate()
    {
        $this->post->__postUpdate();
    }

    public function _postDelete($id)
    {
        $this->post->_postDelete($id);
    }

    public function postStatus($post_id)
    {
        $this->post->postStatus($post_id);
    }

    public function postBynotice($notice)
    {
        $this->layout('admin', 'admin', 'post', 'postBynotice', [
            'notice' => $this->post->noticeName($notice),
            'page' => $p = $this->p->p($this->post->postBynoticeCount($notice), 10),
            'post' => $this->post->postBynotice($notice, $p->start, $p->limit)
        ]);
    }

    public function postSearch()
    {
        $this->view('admin', 'post', 'postSearch');
    }

    public function __postSearch()
    {
        $this->layout('admin', 'admin', 'post', 'postSearch', [
            'post' => $this->post->__postSearch(),
            'search' => $post,
        ]);
    }
}
