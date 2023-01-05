<?php 

namespace modulus\admin\download\controller;
use modulus\admin\download\model\downloadModel;
use core\controller;
use \library\pagination as p;

class downloadController extends controller
{
    public $download;
    
    public function __construct()
    {
        $this->download = new downloadModel();
        $this->p = new p();
    }

    public function download()
    {
        $this->layout('admin', 'admin', 'download', 'download', [
            'page' => $p = $this->p->p($this->download->downloadCount(), 10),
            'download' => $this->download->download($p->start, $p->limit)
        ]);
    }
}

