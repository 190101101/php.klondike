<?php 

namespace library;

class message
{
    private $code;
    private $message;
    private $return;
    private $data;
    private $http;
    private $time = 1;

    public function code($code)
    {
        $this->code = $code;
        return $this;
    }

    public function data($arr = [])
    {
        if($arr != FALSE)
        {
            foreach($arr as $key => $value){
                $this->data[$key] = $value;
            }
        }
        return $this;
    }

    public function time($time)
    {
        $this->time = $time;
        return $this;
    }

    public function http($http = false)
    {
        header('location: /'.$http);
        exit;
    }

    public function referer()
    {
        header("location: {$_SERVER['HTTP_REFERER']}");
        exit;
    }

    public function return($message)
    {
        $return =  require_once '../boot/response.php';
        $this->message = $return->$message;
        return $this;
    }

    public function response($message)
    {
        $this->message = $message;
        return $this;
    }

    public function get()
    {
        $_SESSION['message'] = (object) [
            'code'    => $this->code,
            'message' => $this->message,
            'data'    => $this->data,
            'time'    => $this->time,
        ];
        return $this;
    }

    public function json()
    {
        echo json_encode([
            'code'    => $this->code,
            'message' => $this->message,
            'data'    => $this->data,
            'time'    => $this->time,
        ]);
        exit;
    }
}

// dd((new message)
//     ->code(404)
//     ->return('success')
//     ->data(['user' => db()->t1('user')])
//     ->data(['guest' => db()->t1('guest')])
//     ->time(5)
// ->json());
