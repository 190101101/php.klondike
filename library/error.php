<?php 
namespace library;
use \Valitron\Validator as v;
use \library\message;

class error
{
    public static function valitron($v, $http = false)
    {
        if(!$v->validate())
        {
            foreach($v->errors() as $error)
            {
                foreach($error as $item)
                {
                    (new message)->code(404)->response($item)->get()->http($http);
                }
            }
        }
    }

    public static function jsonvalitron($v)
    {
        if(!$v->validate())
        {
            foreach($v->errors() as $error)
            {
                foreach($error as $item)
                {
                    (new message)->code(300)->response($item)->json();
                }
            }
        }
    }
}