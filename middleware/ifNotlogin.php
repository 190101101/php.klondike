<?php 

namespace middleware;

class ifNotlogin
{
    public static function handle($next)
    {
        if(user_info())
        {
            REDIRECT('home');
        } 
        return $next;
    }
}

