<?php 

namespace modulus\main\auth\model;
use core\model;
use \library\session;
use \library\cookie;
use \library\http;
use \library\error;
use \library\message;
use \Valitron\Validator as v;

class authModel extends model
{
    public function __auth()
    {
        $colors = [
            '#FF033E',
            '#FF4040',
            '#FFFF00',
            '#FF4D00',
            '#00FF00',
            '#324AB2',
            '#FFFFFF',
            '#8A2BE2',
        ];

        #redirect
        $http1 = 'home';

        #peel tags of array
        $data = (object) peel_tag_array($_POST);

        #check via valitron
        v::lang('ru');

        $v = new v((array) $data);

        $v->rule('required', [
            'user_login',
            'user_password',
        ]);

        $v->rule('regex', 'user_login', '/^[a-zA-Z0-9]{3,20}$/');
        $v->rule('regex', 'user_password', '/^[a-zA-Z0-9]{3,20}$/');
        
        $v->rule('regex', 'user_login', '/^[a-zA-Z0-9]{3,20}$/');
        $v->rule('regex', 'user_password', '/^[a-zA-Z0-9]{3,20}$/');

        error::valitron($v, $http1);
       
        $user_exist = $this->db->t1where('user', 'user_login=?', [
            $data->user_login
        ]);

        if($user_exist)
        {
            $user = $this->db->t1where('user', 'user_login=? AND user_password=?', [
                $data->user_login, $data->user_password
            ]);

            if($user)
            {
                #update user data
                $user->user_ip = REMOTE_ADDR();
                $user->user_updated_at = date('Y-m-d H:i:s');

                $this->db->update('user', (array) $user, [
                    'id' => 'user_id'
                ]);

                cookie::create("user", json_encode([
                    'user_login' => $user->user_login,
                    'user_password' => $user->user_password,
                ]));

                session::create('user', (object) $user);
            }
            else
            {
                (new message)->code(300)->return('login_already_wrong_pass')->time(10)->get()->http($http1);
            }
        }
        else
        {
            $data->user_ip = rand_ip();
            $data->user_color = $colors[array_rand($colors)];

            $status = $this->db->create('user', (array) $data);

            if($status['status'])
            {
                cookie::create("user", json_encode([
                    'user_token' => $data->user_token,
                ]));

                session::create('user', (object) $data);
            }   
        }

        unset($data); unset($_POST); unset($v); unset($user);
    
        (new message)->code(200)->return('login')->get()->referer();
    }

    public function _logout()
    {
        $http1 = 'authin';
        $http1 = 'home';

        unset($_SESSION['user']); 

        if(user_login() === FALSE)
        {
            (new message)->code(200)->return('logout')->get()->http($http1);
        }
        else
        {
            (new message)->code(404)->return('error')->get()->http($http1);
        }
    }    

}
