<?php 

namespace modulus\admin\ad\controller;
use modulus\admin\ad\model\adModel;
use core\controller;
use \library\pagination as p;

class adController extends controller
{
    public $ad;
    
    public function __construct()
    {
        $this->ad = new adModel();
        $this->p = new p();
    }

    public function ad()
    {
        $this->layout('admin', 'admin', 'ad', 'ad', [
            'page' => $p = $this->p->p($this->ad->adCount(), 10),
            'ad' => $this->ad->ad($p->start, $p->limit)
        ]);
    }

    public function adCreate()
    {
        $this->view('admin', 'ad', 'adCreate', []);
    }

    public function __adCreate()
    {
        $this->ad->__adCreate();
    }

    public function _adUpdate($id)
    {
        $this->view('admin', 'ad', 'adUpdate', (object) [
            'ad' => $this->ad->_adUpdate($id)
        ]);
    }

    public function __adUpdate()
    {
        $this->ad->__adUpdate();
    }

    public function _adDelete($id)
    {
        $this->ad->_adDelete($id);
    }

    public function adSearch()
    {
        $this->view('admin', 'ad', 'adSearch');
    }

    public function __adSearch()
    {
        $this->layout('admin', 'admin', 'ad', 'adSearch', [
            'ad' => $this->ad->__adSearch(),
            'search' => $post,
        ]);
    }
}

