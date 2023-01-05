<?php 

namespace modulus\admin\section\controller;
use modulus\admin\section\model\sectionModel;
use core\controller;
use \library\pagination as p;

class sectionController extends controller
{
    public $section;
    
    public function __construct()
    {
        $this->section = new sectionModel();
        $this->p = new p();
    }

    public function section()
    {
        $this->layout('admin', 'admin', 'section', 'section', [
            'page' => $p = $this->p->p($this->section->sectionCount(), 10),
            'section' => $this->section->section($p->start, $p->limit)
        ]);
    }

    public function sectionCreate()
    {
        $this->view('admin', 'section', 'sectionCreate', []);
    }

    public function __sectionCreate()
    {
        $this->section->__sectionCreate();
    }

    public function _sectionUpdate($id)
    {
        $this->view('admin', 'section', 'sectionUpdate', (object)[
            'section' => $this->section->_sectionUpdate($id)
        ]);
    }

    public function __sectionUpdate()
    {
        $this->section->__sectionUpdate();
    }

    public function _sectionDelete($id)
    {
        $this->section->_sectionDelete($id);
    }

    public function sectionStatus($section_id)
    {
        $this->section->sectionStatus($section_id);
    }

    public function sectionSearch()
    {
        $this->view('admin', 'section', 'sectionSearch');
    }

    public function __sectionSearch()
    {
        $this->layout('admin', 'admin', 'section', 'sectionSearch', [
            'section' => $this->section->__sectionSearch(),
            'search' => $post,
        ]);
    }
}

