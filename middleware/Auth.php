<?php 

namespace middleware;
use \library\message;

class Auth
{
	public static function handle($next)
	{
        if(!user_info())
		{
            (new message)->code(404)->return('need_auth')->json();
		} 
		return $next;
	}
}

