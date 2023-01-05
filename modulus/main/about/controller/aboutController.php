<?php 

namespace modulus\main\about\controller;
use modulus\main\about\model\aboutModel;
use core\controller;

class aboutController extends controller
{
    public $about;
    
    public function __construct()
    {
        $this->about = new aboutModel();
    }

    public function about()
    {
        $this->layout('about', 'main', 'about', 'about', [
            'about' => $this->about->about()
        ]);
    }
}

