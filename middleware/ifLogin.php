<?php 

namespace middleware;

class ifLogin
{
	public static function handle($next)
	{
        if(!user_info())
		{
            REDIRECT('home');
		} 
		return $next;
	}
}

