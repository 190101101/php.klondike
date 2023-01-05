<?php
namespace library;

class cookie
{
    public static function create($key, $value, $expire = false, $path = '/', $domain = '', $secure = 0, $httponly = true)
    {
        setcookie($key, $value, time() + $expire ?: (3600 * 3600), $path, $domain, $secure, $httponly);
        return true;
    }
 
    public static function read($cookie)
    {
        if(self::has($cookie))
        {
            return $_COOKIE[$cookie];
        }
    }

    public static function delete($key, $value = '', $expire = 1, $path = '/', $domain = '', $secure = 0, $httponly = false) 
    {
        setcookie($key,$value,$expire,$path,$domain,$secure, $httponly);
        return true;
    }

    #cookies::find("user", 'apsi');
    public static function find($cookie, $key)
    {
        return self::has($cookie) ? self::haskey($cookie, $key)
            ? $_COOKIE[$cookie][$key] : FALSE : NULL;
    }

    public static function has($cookie)
    {
        return isset($_COOKIE[$cookie]) ? TRUE : FALSE;
    }
}
