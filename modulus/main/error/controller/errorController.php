<?php 

namespace modulus\main\error\controller;
use modulus\main\error\model\errorModel;
use core\controller;

class errorController extends controller
{
    public $error;

    public function __construct()
    {        
        $this->error = new errorModel();
    }

    public function pageNotFound()
    {
        $this->layout('error', 'main', 'error', 'pageNotFound', [
            'error' => 'error not found User'
        ]);
    }
}