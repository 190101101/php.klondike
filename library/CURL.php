<?php 

namespace library;

class CURL
{
	public static function get($url)
	{
	    $curl = curl_init($url);
	    
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	    
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	    
	    curl_setopt($curl, CURLOPT_HEADER, FALSE);
	    
	    $exec = curl_exec($curl);
	    
	    curl_close($curl);
	    
	    return $exec;
	}    
	
	public static function post($url, $data = [])
	{
	    $curl = curl_init($url);

	    curl_setopt($curl, CURLOPT_POST, 1);
	    
	    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
	    
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	    
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    
	    $exec = curl_exec($curl);
	    
	    curl_close($curl);

	    return $exec;
	}
}

/*

$curl = new \library\CURL;

$curl->post('http://xcode', [

	'chat_text' => ''

]);

*/

