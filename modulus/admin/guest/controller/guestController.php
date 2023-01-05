<?php 

namespace modulus\admin\guest\controller;
use modulus\admin\guest\model\guestModel;
use core\controller;
use \library\pagination as p;

class guestController extends controller
{
    public $guest;
    
    public function __construct()
    {
        $this->guest = new guestModel();
        $this->p = new p();
    }

    public function guest()
    {
        $this->layout('admin', 'admin', 'guest', 'guest', [
            'page' => $p = $this->p->p($this->guest->guestCount(), 10),
            'guest' => $this->guest->guest($p->start, $p->limit),
            'guest_last' => $this->guest->lastGuestStatus()
        ]);
    }

    public function _guestDelete($id)
    {
        $this->guest->_guestDelete($id);
    }

    public function guestRead($guest_id)
    {
        $this->view('admin', 'guest', 'guestRead', (object) [
            'guest' => $this->guest->guestRead($guest_id)
        ]);
    }

    public function _guestStatus()
    {
        $this->guest->_guestStatus();
    }

    public function guestSearch()
    {
        $this->view('admin', 'guest', 'guestSearch');
    }

    public function __guestSearch()
    {
        $this->layout('admin', 'admin', 'guest', 'guestSearch', [
            'guest' => $this->guest->__guestSearch(),
            'search' => $post,
        ]);
    }
}

