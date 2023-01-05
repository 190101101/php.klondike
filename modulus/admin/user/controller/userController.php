<?php 

namespace modulus\admin\user\controller;
use modulus\admin\user\model\userModel;
use core\controller;
use \library\pagination as p;

class userController extends controller
{
    public $user;
    
    public function __construct()
    {
        $this->user = new userModel();
        $this->p = new p();
    }

    public function user()
    {
        $this->layout('admin', 'admin', 'user', 'user', [
            'page' => $p = $this->p->p($this->user->userCount(), 10),
            'user' => $this->user->user($p->start, $p->limit)
        ]);
    }

    public function userCreate()
    {
        $this->view('admin', 'user', 'userCreate', []);
    }

    public function __userCreate()
    {
        $this->user->__userCreate();
    }

    public function _userUpdate($id)
    {
        $this->view('admin', 'user', 'userUpdate', (object) [
            'user' => $this->user->_userUpdate($id)
        ]);
    }

    public function __userUpdate()
    {
        $this->user->__userUpdate();
    }

    public function _userDelete($id)
    {
        $this->user->_userDelete($id);
    }

    public function userStatus($user_id)
    {
        $this->user->userStatus($user_id);
    }

    public function userSearch()
    {
        $this->view('admin', 'user', 'userSearch');
    }

    public function __userSearch()
    {
        $this->layout('admin', 'admin', 'user', 'userSearch', [
            'user' => $this->user->__userSearch(),
            'search' => $post,
        ]);
    }
}

