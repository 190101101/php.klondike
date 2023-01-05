<?php 

namespace modulus\main\home\controller;
use modulus\main\home\model\homeModel;
use core\controller;
use \library\pagination as p;

class homeController extends controller
{
    public $home;
    
    public function __construct()
    {
        $this->home = new homeModel();
        $this->p = new p();
    }

    public function home()
    {
        $this->layout('main', 'main', 'home', 'home', [
            'page' => $p = $this->p->p($this->home->articleCount(), 15),
            'article' => $this->home->articles($p->start, $p->limit)
        ]);
    }

    public function dd()
    {
        $this->layout('main', 'main', 'home', 'dd', []);
    }
}

