<?php 

namespace modulus\main\chat\model;
use core\model;
use \library\session;
use \library\http;
use \library\error;
use \library\message;
use \library\User;
use \Valitron\Validator as v;

class chatModel extends model
{
    public function __sendMessage()
    {
        $http1 = 'home';

        $data = (object) peel_tag_array ($_POST);

        #check via valitron
        $v = new v((array) $data);

        $v->rule('required', [
            'chat_text',
        ]);

        $v->rule('lengthMin', 'chat_text', 2);
        $v->rule('lengthMax', 'chat_text', 301);

        error::jsonvalitron($v);

        $data->user_id = user_id();
        $data->chat_date = date('d.m.y');
        
        $return = $this->db->create('chat', (array) $data);

        $data->user_login = user_login();
        $data->user_color = user_color();

        if($return['status'] == TRUE)
        {
            (new message)->code(200)->data([
                'chat' => $data,
                'render' => 'chat_create'
            ])->json();
        }
        else
        {
            (new message)->code(404)->return('errro')->json();   
        }
    }

    public function _chatLoadMore($start_id)
    {
        $chat =  $this->db->t2where('chat', 'user', 'chat_id < ? ORDER BY chat.chat_id DESC LIMIT 50', [$start_id], 2);

        if($chat)
        {
            (new message)->code(200)->data([
                'chat' => $chat,
                'render' => 'chat_load',
                'last_chat_id' => $chat[count($chat)-1]->chat_id
            ])->json();

        }
        else
        {
            (new message)->code(300)->return('empty')->json();
        }
    }
}
