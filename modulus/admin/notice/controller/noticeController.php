<?php 

namespace modulus\admin\notice\controller;
use modulus\admin\notice\model\noticeModel;
use core\controller;
use \library\pagination as p;

class noticeController extends controller
{
    public $notice;
    
    public function __construct()
    {
        $this->notice = new noticeModel();
        $this->p = new p();
    }

    public function notice()
    {
        $this->layout('admin', 'admin', 'notice', 'notice', [
            'page' => $p = $this->p->p($this->notice->noticeCount(), 10),
            'notice' => $this->notice->notice($p->start, $p->limit)
        ]);
    }

    public function noticeCreate()
    {
        $this->view('admin', 'notice', 'noticeCreate', []);
    }

    public function __noticeCreate()
    {
        $this->notice->__noticeCreate();
    }

    public function _noticeUpdate($id)
    {
        $this->view('admin', 'notice', 'noticeUpdate', (object)[
            'notice' => $this->notice->_noticeUpdate($id)
        ]);
    }

    public function __noticeUpdate()
    {
        $this->notice->__noticeUpdate();
    }

    public function _noticeDelete($id)
    {
        $this->notice->_noticeDelete($id);
    }

    public function noticeStatus($notice_id)
    {
        $this->notice->noticeStatus($notice_id);
    }

    public function noticeSearch()
    {
        $this->view('admin', 'notice', 'noticeSearch');
    }

    public function __noticeSearch()
    {
        $this->layout('admin', 'admin', 'notice', 'noticeSearch', [
            'notice' => $this->notice->__noticeSearch(),
            'search' => $post,
        ]);
    }
}


