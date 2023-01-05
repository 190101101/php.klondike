<?php 

namespace modulus\admin\comment\controller;
use modulus\admin\comment\model\commentModel;
use core\controller;
use \library\pagination as p;

class commentController extends controller
{
    public $comment;
    
    public function __construct()
    {
        $this->comment = new commentModel();
        $this->p = new p();
    }

    public function comment()
    {
        $this->layout('admin', 'admin', 'comment', 'comment', [
            'page' => $p = $this->p->p($this->comment->commentCount(), 10),
            'comment' => $this->comment->comment($p->start, $p->limit)
        ]);
    }

    public function commentCreate($article_id)
    {
        $this->view('admin', 'comment', 'commentCreate', (object) [
            'article_id' => $article_id,
        ]);
    }

    public function __commentCreate()
    {
        $this->comment->__commentCreate();
    }

    public function _commentDelete($id)
    {
        $this->comment->_commentDelete($id);
    }

    public function commentByArticle($article_id)
    {
        $this->view('admin', 'comment', 'commentByArticle', (object) [
            'comment' => $this->comment->commentByArticle($article_id),
            'article_id' => $article_id,
        ]);
    }

    public function _commentLoadMore($article_id, $start_id)
    {
        $this->comment->_commentLoadMore($article_id, $start_id);
    }

    public function _commentRating($grade, $comment_id)
    {
        $this->comment->_commentRating($grade, $comment_id);
    }

    public function commentSearch()
    {
        $this->view('admin', 'comment', 'commentSearch');
    }

    public function __commentSearch()
    {
        $this->layout('admin', 'admin', 'comment', 'commentSearch', [
            'comment' => $this->comment->__commentSearch(),
            'search' => $post,
        ]);
    }
}

