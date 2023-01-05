<?php 

namespace middleware;
use \library\message;

class isAdmin
{
    public static function handle($next)
    {
        if(user_level() < 99)
        {
            (new message)->code(404)->return('error')->json();
        } 
        return $next;
    }
}

