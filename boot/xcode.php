<?php 

function db()
{
    return new library\triangle();
}

function ee()
{
	echo '<body style="background: #14171a !important; color: #e84118 !important;">';
	echo '<div class="dd-class"><pre>';
		print_r('exit');
	echo '</pre></div></body>';
	exit;
}

function dd($data)
{
	echo '<div class="dd-class"><pre>'; print_r($data); echo '<pre></div>';
}

function ddx($data)
{	
	echo '<body style="background: #14171a !important; color: #e84118 !important;">';
	echo '<div class="dd-class"><pre>'; print_r($data); echo '<pre></div></body>';
	exit;
}

function qq($data)
{
	echo '<div class="dd-class"><pre>'; var_dump($data); echo '<pre></div>';
}

function qqx($data)
{
	echo '<body style="background: #14171a !important; color: #e84118 !important;">';
	echo '<div class="dd-class"><pre>'; var_dump($data); echo '<pre></div></body>';
	exit;
}

/*encode decode*/
function token_code()
{
	return md5(md5(ssl_encode(uniqid())));
}

function ssl_encode($p1)
{
	return openssl_encrypt($p1, "AES-128-ECB", "password");
}

function ssl_decode($p1)
{
	return openssl_decrypt($p1, "AES-128-ECB", "password");
}

function ssl_encode_each_keys($p1)
{
	$return = [];
	foreach($p1 as $p2 => $p3)
		$return += [
            openssl_encrypt($p2, "AES-128-ECB", "password") 
                => 
            openssl_encrypt($p3, "AES-128-ECB", "password")
        ];
	return $return;
}

function ssl_decode_each_keys($p1)
{
    $return = [];
    foreach($p1 as $p2 => $p3)
        $return += [
            openssl_decrypt($p2, "AES-128-ECB", "password") 
                => 
            openssl_decrypt($p3, "AES-128-ECB", "password")
        ];
    return $return;
}


function base64_url_ssl_encode($url)
{
	return base64_encode(ssl_encode($url));
}

function base64_url_ssl_decode($url)
{
	return ssl_decode(base64_decode($url));
}

function base64_url_encode($url)
{
	return base64_encode($url);
}

function base64_url_decode($url)
{
	return base64_decode($url);
}
/*encode decode*/


/*math*/
function byte($size){
    $metrics[0] = 'байт';
    $metrics[1] = 'кб';
    $metrics[2] = 'мб';
    $metrics[3] = 'гб';
    $metrics[4] = 'тб';
    $metric = 0;
    while(floor($size / 1024) > 0){
        $metric ++;
        $size /= 1024;
    }
    $result = round(ceil($size), 1) . " " .
        (isset($metrics[$metric]) ? $metrics[$metric] : '???');
    return $result;
}


function byte_size($size){
    $metrics[0] = 'байт';
    $metrics[1] = 'Кбайт';
    $metrics[2] = 'Мбайт';
    $metrics[3] = 'Гбайт';
    $metrics[4] = 'Тбайт';
    $metric = 0;         
    while(floor($size/1024) > 0){
         ++$metric;
         $size /= 1024;
     }        
     $ret =  round($size,1)." ".(isset($metrics[$metric])?$metrics[$metric]:'??');
    return $ret;
}

function percent( $number, $everything, $decimals = 2 )
{
  return round( $number / $everything * 100, $decimals );
}

/*math*/


/*clean*/
function peel_tag_array($p1 = [])
{
    foreach($p1 as $p2 => $p3){
        $p1[$p2] = remove_tags($p3);
    }
    return $p1;
}

function remove_tags($p1)
{
    $p1 = strip_tags($p1);
    $p1 = htmlspecialchars($p1);
    $p1 = htmlentities($p1);
    $p1 = html_entity_decode($p1);
    $p1 = rtrim($p1);
    return $p1;
}

function form_char($p1)
{
	$p1 = strip_tags($p1);
	$p1 = htmlspecialchars($p1);
	$p1 = htmlentities($p1);
	$p1 = html_entity_decode($p1);
	$p1 = rtrim($p1);
	return $p1;
}

function peel($p1 = [])
{
    foreach($p1 as $key => $value)
    {
        $p1[$key] = form_char($value);
    }
    return $p1;
}

function xss($p1)
{
	$p1 = str_replace(")","",$p1);
	$p1 = str_replace("(","",$p1);
	$p1 = str_replace("'","",$p1);
	$p1 = str_replace(";","",$p1);
	$p1 = str_replace('"',"",$p1);
	$p1 = str_replace("iframe","",$p1);
	$p1 = str_replace("eval","",$p1);
	$p1 = str_replace("refresh","",$p1);
	$p1 = str_replace("style","",$p1);
	$p1 = str_replace("script","",$p1);
	$p1 = str_replace("<alert>","",$p1);
	$p1 = str_replace("<script>","",$p1);
	$p1 = str_replace("<script","",$p1);
	$p1 = str_replace("</script","",$p1);
	$p1 = str_replace("/script","",$p1);
	$p1 = str_replace("<?","",$p1);
	$p1 = str_replace("?>","",$p1);
	$p1 = str_replace("SELECT *","",$p1); 
	$p1 = str_replace("DELETE FROM","",$p1); 
	return $p1;
}
/*clean*/

/*check*/
function is_not_empty($p1)
{
	return $p1 != '' || $p1 != null || $p1 != false || !empty($p1);
}

function is_empty($p1)
{
	return $p1 == '' || $p1 == null || $p1 == false || empty($p1);
}

function return_stripos($p1, $p2)
{
    if(stripos($p1, $p2) !== FALSE) 
    {
        return TRUE;
    } 
}

function has_file($files, $type)
{
    if(!empty($files[$type]['name']))
    {
        return TRUE;
    }else
    {
        return FALSE;
    }
}

/*check*/

/*time*/
function date_dy($date)
{
	$explode = explode(' ', $date);
	$ymd     = $explode[0];
	$his     = $explode[1];

	$his = explode(':', $his);
	$his = $his[0].':'.$his[1];

	$ymd = explode('-', $ymd);
	$ymd = array_reverse($ymd);
	$ymd = $ymd[0].'-'.$ymd[1].'-'.substr($ymd[2], -2);

	$date = $his.' | '.$ymd;
	return $date;
}

function date_ymd($date)
{
	$explode = explode(' ', $date);
	$ymd     = $explode[0];
	$his     = $explode[1];

	$his = explode(':', $his);
	$his = $his[0].':'.$his[1];

	$ymd = explode('-', $ymd);
	$ymd = array_reverse($ymd);
	$ymd = $ymd[0].'.'.$ymd[1].'.'.substr($ymd[2], -2);

	$date = $ymd;
	return $date;
}
/*time*/

/**/
function rand_ip()
{
	return rand(100, 999).'.'.
	       rand(100, 999).'.'.
	       rand(100, 999).'.'.
	       rand(100, 999);
}

function rand_num()
{
	return  
			rand(100, 999).'-'.
	    	rand(10, 99).'-'.
	    	rand(10, 99);
}

function down_counter($p1)
{
    if ($p1 > 0)
    {
        echo $p1;
        down_counter($p1-1);
    }
}

function bread_cump()
{
	echo '<ol class="bread_crumb">';
	$uri = explode('/', $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    for($i = 0; $i < count($uri)-1; $i++)
    {
        echo "<li><span>{$uri[$i]}</span></li>";
    }
    echo "<li><span class='bread_active'>{$uri[$i]}</span></li>";
    echo '</ol>';
    /*
    echo '<a href="javascript:history.back()" title="go back">';
    echo '<img src="'.SVG.'left-arrow.svg">';
    echo '</a>';
    */
}

/**/
function file_build_path($segments) {
    return implode(DIRECTORY_SEPARATOR, func_get_args($segments));
}

function get_file_size($path, $file)
{
    return filesize(getcwd() . $path . DIRECTORY_SEPARATOR . $file);
}

function get_created_at_file($path_and_file)
{
    return date("H:i | d-m-Y", filectime($path_and_file));
}

function get_dir_size($path){
    $path = rtrim($path, '/');
    $size = 0;
    $dir = opendir($path);
    if (!$dir) {
        return 0;
    }

    while (false !== ($file = readdir($dir))) {
        if($file == '.' || $file == '..'){
            continue;  
        } else if (is_dir($path . $file)){
            $size += dir_size($path . DIRECTORY_SEPARATOR . $file);
        } else {
            $size += filesize($path . DIRECTORY_SEPARATOR . $file);
        }
    }
    closedir($dir);
    return $size;
}


function dir_size($dirname)
{
    $totalsize = 0;

    if ($dirstream = opendir($dirname)) 
    {
        while (false !== ($filename = readdir($dirstream))) 
        {
            if ($filename != "." && $filename != "..")
            {
                if (is_file($dirname."/".$filename))
                {
                    $totalsize += filesize($dirname."/".$filename);
                }
      
                if (is_dir($dirname."/".$filename))
                {
                    $totalsize += dir_size($dirname."/".$filename);
                }
            }
        }
    }
    closedir($dirstream);
    return $totalsize;
}


function count_dir_files($path)
{
    $dir = opendir($path);
    $count = 0;
    while($file = readdir($dir)){
        if($file == '.' || $file == '..' || is_dir($dir . $file)){
            continue;
        }
        $count++;
    }
    return $count;
}

/*system*/
function svg_list()
{
    return scan(path(SVG_LIST));
}


function scan($path)
{
    $str_replace = str_replace('\\', '/', $path);
    $scandir = scandir($str_replace);
    array_shift($scandir);
    array_shift($scandir);
    return $scandir;
}


function scanner($path)
{
    $str_replace = str_replace('\\', '/', getcwd()).DV.$path;
    $scandir = scandir($str_replace);
    array_shift($scandir);
    array_shift($scandir);
    return $scandir;
}

function path($path)
{
    return str_replace('\\', '/', getcwd()).DV.$path;
}

/*array*/
#удаляет ключ с значением из массива;
function except($array, $keys) {
    return array_diff_key($array, array_flip((array) $keys));   
} 

function array_except($array, $keys) {
    return array_diff_key($array, array_flip((array) array_keys($keys)));
} 

function array_except_keys($array, $keys) {
    return array_diff_key(array_keys($array), array_flip((array) array_keys($keys)));
} 

function key_compare($a, $b)
{
    if ($a === $b) {
        return 0;
    } return ($a > $b) ? 1 : -1;
}

function exclude($array, $keys) {
    return array_diff_key((array) $array, array_flip((array) $keys));   
} 

function compare_array_keys($p1, $p2)
{
    return array_diff_uassoc(array_keys($p1), $p2, "key_compare");
}

function compare_array($p1, $p2)
{
    return array_diff_uassoc($p1, $p2, "key_compare");
}

#если тру ошибка // $array1 = ['user_token'], $array2 = $_POST
function array_different($array1, $array2)
{
    return array_diff($array1, array_keys($array2)) != TRUE ?: FALSE;
}

function file_in_array($file, $path)
{
    if(in_array($file, scan($path)))
    {
        return TRUE;
    }
}

# sort_by_arg($arr, 'rank', SORT_DESC)
function sort_by_arg($arr, $arg, $by = SORT_ASC)
{
    array_multisort(array_column($arr, $arg), $by, $arr);
    return $arr;
}

function array_implode($array, $separator)
{
    return implode($separator, $array);
}

#возврат кроме некодированного
function return_other_than_uncoded($array){
    return array_except($array, return_uncoded_value(array_keys($array)));
}

#возврат кроме кодированного
function return_other_than_encoded($array){
    return array_except($array, return_encoded_value(array_keys($array)));
}

#декодировать закодированное ключи
function decode_encoded_keys($array)
{
    return ssl_decode_array_keys(return_uncoded_value($array));
}

#декодировать закодированный массив
function decode_encoded_array($array)
{
    return ssl_decode_array(return_encoded_value($array));
}

#исключает закодированные ключи
function excludes_encoded_keys($array, $except){
    return array_except($array, array_keys($except));
}

#массив каторый кейси кодировались а значение не кодировались и исключает полученный ключ
function array_except_encoded($array, $except){
    return excludes_encoded_keys($_POST, return_uncoded_value($except));
}

function return_each_char_in_array($p1)
{
    $return = [];
    foreach($p1 as $keys => $values)
        $return[$keys] = xss(form_char($values));
    return $return;
}

#возврат кроме некодированного
function return_uncoded_value($p1)
{
    return array_filter($p1, function($p3){
        return is_empty(ssl_decode($p3));
    });
}

#возврат кроме закодированного
function return_encoded_value($p1)
{
    return array_filter($p1, function($p3){
        return is_not_empty(ssl_decode($p3));
    });
}

#после энкоде проверяет все ключи и значения
function return_array_after_ssl_decode($p1)
{
    $keys = array_values(array_map(function ($item) {
        return ssl_decode($item);
    }, array_keys($p1)));

    $values = array_values(array_map(function ($item) {
        return ssl_decode($item);
    }, array_values($p1)));

    $array_merge = array_merge($keys, $values);
    return array_filter($array_merge, function($item){
        return is_empty($item);
    });
}

function ssl_decode_array($p1)
{
    $keys = array_values(array_map(function ($item) {
        return ssl_decode($item, "AES-128-ECB", "password");
    }, array_keys($p1)));

    $values = array_values(array_map(function ($item) {
        return ssl_decode($item, "AES-128-ECB", "password");
    }, array_values($p1)));
        
    return array_combine($keys, $values);
}

function ssl_decode_array_keys($p1)
{
    $keys = array_values(array_map(function ($item) {
        return ssl_decode($item);
    }, array_keys($p1)));

    $values = array_values(array_map(function ($item) {
        return $item;
    }, array_values($p1)));

    return array_combine($keys, $values);
}

function ssl_decode_array_values($p1)
{
    $keys = array_values(array_map(function ($item) {
        return $item;
    }, array_keys($p1)));

    $values = array_values(array_map(function ($item) {
        return ssl_decode($item);
    }, array_values($p1)));

    return array_combine($keys, $values);
}
/*array*/

/*http*/
function REFERER()
{
    if(isset($_SERVER['HTTP_REFERER']))
    {
        return $_SERVER['HTTP_REFERER'];        
    }
    else
    {
        return FALSE;
    }
}

function HTTP_REFERER()
{
    header("location: {$_SERVER['HTTP_REFERER']}");
    exit;
}

function REQUEST()
{
    return $_SERVER['REQUEST_URI'];
}

function HOST()
{
    return $_SERVER['HTTP_HOST'];
}

function REFRESH($seconds = 2)
{
    header("Refresh: $seconds; /");
}

function REDIRECT($url = false, $exit = true)
{
    header('location: /'.$url);
    $exit == false ?: exit;
}

function HTTP_REQUEST($url)
{
    header('location: '.$url);
}

function HTTP_COOKIE()
{
    return $_SERVER['HTTP_COOKIE'];
}

function REMOTE_ADDR()
{
    return $_SERVER['REMOTE_ADDR'];
}

function isXmlHttpRequest($redirect = 'home')
{
    $header = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? $_SERVER['HTTP_X_REQUESTED_WITH'] : null;
    ($header === 'XMLHttpRequest') == 1 ?: redirect($redirect, 1);
}
/*http*/

/*user*/
function has_user()
{
    return isset($_SESSION['user']) ? TRUE : FALSE;
}

function user_info()
{
    return $_SESSION['user'] ?? FALSE;
}

function user_id()
{
    return $_SESSION['user']->user_id ?? FALSE;
}

function user_ip()
{
    return $_SESSION['user']->user_ip ?? FALSE;
}

function user_login()
{
    return $_SESSION['user']->user_login ?? FALSE;
}

function user_color()
{
    return $_SESSION['user']->user_color ?? FALSE;
}

function user_password()
{
    return $_SESSION['user']->user_password ?? FALSE;
}

function user_level()
{
    return $_SESSION['user']->user_level ?? FALSE;
}

function google_drive_export_file($url)
{   
    header("Location: https://drive.google.com/uc?id={$url}&export=download&confirm=t&uuid=a7a0ee75-207a-48a7-bc67-8d648830fbf1");
}

function request_uri()
{
    $server = $_SERVER['REQUEST_URI'];
    $server = explode('/', $server);
    array_shift($server);
    $return = false;

    for($i = 0; $i < count($server); $i++)
        $return .= $server[$i].' ';
    return $return;
}