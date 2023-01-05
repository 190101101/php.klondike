<?php 

namespace library;

use \Pattern\Creational\Singleton;

class User extends Singleton
{
    public static function __callStatic($p1, $p2 = false)
    {
        $singleton = static::getInstance();
        return $singleton->getData($p1);
    }

    public function getData($p1)
    {
        return $this->hasData($p1);
    }

    public function hasData($p1)
    {
        if(isset($_SESSION['user']))
        {
            if(is_array($_SESSION['user']))
            {
                return $_SESSION['user'][$p1];
            }
            else if(is_object($_SESSION['user']))
            {
                return $_SESSION['user']->{$p1};
            }
        }
        else
        {
            return FALSE;
        }
    }

    public static function info()
    {
        $singleton = static::getInstance();
        return $singleton->getInfo();   
    }

    public function getInfo()
    {
        if(isset($_SESSION['user']))
        {
            return $_SESSION['user'];
        }
        else
        {
            return FALSE;
        }
    }

    public function level()
    {
        if(User::user_level() == 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
