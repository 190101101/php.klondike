<?php 

namespace modulus\admin\chat\controller;
use modulus\admin\chat\model\chatModel;
use core\controller;
use \library\pagination as p;

class chatController extends controller
{
    public $chat;
    
    public function __construct()
    {
        $this->chat = new chatModel();
        $this->p = new p();
    }

    public function chat()
    {
        $this->layout('admin', 'admin', 'chat', 'chat', [
            'page' => $p = $this->p->p($this->chat->chatCount(), 10),
            'chat' => $this->chat->chat($p->start, $p->limit)
        ]);
    }

    public function chatCreate()
    {
        $this->view('admin', 'chat', 'chatCreate', []);
    }

    public function __chatCreate()
    {
        $this->chat->__chatCreate();
    }

    public function _chatDelete($id)
    {
        $this->chat->_chatDelete($id);
    }

    public function chatSearch()
    {
        $this->view('admin', 'chat', 'chatSearch');
    }

    public function __chatSearch()
    {
        $this->layout('admin', 'admin', 'chat', 'chatSearch', [
            'chat' => $this->chat->__chatSearch(),
            'search' => $post,
        ]);
    }
}

