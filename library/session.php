<?php
namespace library;

class session
{
    public static function create($session, $key)
    {
        $_SESSION[$session] = $key;
    }

    public static function read($session, $key = FALSE)
    {
        if(self::has($session) == TRUE)
        {
            if($key == FALSE)
            {
                return $_SESSION[$session];
            }
            else
            {   
                return $_SESSION[$session][$key];
            }
        }
    }

    public static function update($session, $key, $value)
    {
        if(self::has($session) == TRUE)
        {
            return $_SESSION[$session][$key] = $value;
        }
    }

    public static function delete($session)
    {
        if(self::has($session) == TRUE)
        {
            unset($_SESSION[$session]);
        }
    }

    public static function has($session)
    {
        return isset($_SESSION[$session]) ? TRUE : FALSE;
    }
}