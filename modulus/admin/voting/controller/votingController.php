<?php 

namespace modulus\admin\voting\controller;
use modulus\admin\voting\model\votingModel;
use core\controller;
use \library\pagination as p;

class votingController extends controller
{
    public $voting;
    
    public function __construct()
    {
        $this->voting = new votingModel();
        $this->p = new p();
    }

    public function voting()
    {
        $this->layout('admin', 'admin', 'voting', 'voting', [
            'page' => $p = $this->p->p($this->voting->votingCount(), 10),
            'voting' => $this->voting->voting($p->start, $p->limit)
        ]);
    }

    public function votingCreate()
    {
        $this->view('admin', 'voting', 'votingCreate', []);
    }

    public function __votingCreate()
    {
        $this->voting->__votingCreate();
    }

    public function _votingUpdate($id)
    {
        $this->view('admin', 'voting', 'votingUpdate', (object) [
            'voting' => $this->voting->_votingUpdate($id)
        ]);
    }

    public function __votingUpdate()
    {
        $this->voting->__votingUpdate();
    }

    public function _votingDelete($id)
    {
        $this->voting->_votingDelete($id);
    }

    public function votingStatus($voting_id)
    {
        $this->voting->votingStatus($voting_id);
    }
}

