<?php 

namespace modulus\main\chat\controller;
use modulus\main\chat\model\chatModel;
use core\controller;

class chatController extends controller
{
    public $chat;
    
    public function __construct()
    {
        $this->chat = new chatModel();
    }

    public function __sendMessage()
    {
        $this->chat->__sendMessage();
    }

    public function _chatLoadMore($start)
    {
        $this->chat->_chatLoadMore($start);
    }
}

