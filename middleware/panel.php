<?php 

namespace middleware;

class panel
{
    public static function handle($next)
    {
        if(user_level() < 99)
        {
            REDIRECT('404');
        } 
        return $next;
    }
}

