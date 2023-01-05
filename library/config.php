<?php 

namespace library;
use \library\User;
use \library\middleware;

class config
{
    
    public $config;
    
    public $route = [];
    
    public $middleware;

    public function __construct($config)
    {
        $this->start($config);
        
        $this->middleware();
    }

    public function start($config)
    {
        $this->route = $config->home;
    }

    public function middleware()
    {
        $this->middleware = require_once '../boot/middleware.php';
    }
}