<?php 

namespace modulus\main\auth\controller;
use modulus\main\auth\model\authModel;
use core\controller;

class authController extends controller
{
    public $auth;
    
    public function __construct()
    {
        $this->auth = new authModel();
    }

    public function __auth()
    {
        $this->auth->__auth();
    }

    public function _logout()
    {
        $this->auth->_logout();
    }
}

