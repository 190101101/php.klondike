<?php 

namespace modulus\admin\setting\controller;
use modulus\admin\setting\model\settingModel;
use core\controller;
use \library\pagination as p;

class settingController extends controller
{
    public $setting;
    
    public function __construct()
    {
        $this->setting = new settingModel();
        $this->p = new p();
    }

    public function setting()
    {
        $this->layout('admin', 'admin', 'setting', 'setting', [
            'page' => $p = $this->p->p($this->setting->settingCount(), 10),
            'setting' => $this->setting->setting($p->start, $p->limit)
        ]);
    }

    public function _settingUpdate($id)
    {
        $this->view('admin', 'setting', 'settingUpdate', (object) [
            'setting' => $this->setting->_settingUpdate($id)
        ]);
    }

    public function __settingUpdate()
    {
        $this->setting->__settingUpdate();
    }

}

