<?php 

namespace modulus\main\comment\controller;
use modulus\main\comment\model\commentModel;
use core\controller;

class commentController extends controller
{
    public $comment;
    
    public function __construct()
    {
        // isXmlHttpRequest();
        $this->comment = new commentModel();
    }

    public function __addComment()
    {
        $this->comment->__addComment();
    }

    public function _commentDelete($comment_id)
    {
        $this->comment->_commentDelete($comment_id);
    }

    public function _commentRating($grade, $comment_id)
    {
        $this->comment->_commentRating($grade, $comment_id);
    }

    public function _commentLoadMore($article_id, $start_id)
    {
        $this->comment->_commentLoadMore($article_id, $start_id);
    }
}

