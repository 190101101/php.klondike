<?php 

global $config;

$config = (object) [
   
   'home' => (object) [
	 	
        'modul' => 'home',
	 	
        'method' => 'home',
      
        'area' => 'main',
    ],

    'general' => (object) [
        
        'modul' => 'auth',
        
        'method' => 'authin',
        
        'area' => 'general',
    ],
];



