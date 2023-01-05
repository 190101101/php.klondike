<?php 

namespace modulus\admin\chat\model;
use core\model;
use \library\error;
use \library\message;
use \Valitron\Validator as v;

class chatModel extends model
{
    public function chatCount()
    {
        return count($this->db->sql("
            
            SELECT chat_id FROM chat 
            
            INNER JOIN user ON user.user_id = chat.user_id

            ", 2));
    }

    public function chat($start, $limit)
    {
        return $this->db->sql("SELECT chat.*, user.* FROM chat
            
            INNER JOIN user ON user.user_id = chat.user_id

            ORDER BY chat_id DESC LIMIT {$start}, {$limit}", 2);
    }

    public function __chatCreate()
    {
        #redirect
        $http1 = 'home';

        #peel tags of array
        $data = (object) peel_tag_array ($_POST);

        #check via valitron
        v::lang('ru');

        $v = new v((array) $data);

        $v->rule('required', [
            'chat_text',
        ]);

        $v->rule('lengthMax', 'chat_text', 1000);

        error::jsonvalitron($v);

        $data->user_id = user_id();

        $status = $this->db->make('chat', (array) $data);

        $chat = $this->db->t2where('chat', 'user', 'chat.chat_id=?', [$status['id']]);

        (new message)->code(200)->return('success')->data([
            'chat' => $chat,
            'render' => 'chat_create'
        ])->json();
    }

    
    public function _chatDelete($chat_id)
    {
        $return = $this->db->wheredelete('chat', 'chat_id=?', [$chat_id]);
    
        $return['status'] == TRUE
            ? (new message)->code(200)->return('deleted')->json()
            : (new message)->code(404)->return('error')->json();
    }

    public function __chatSearch()
    {
        $data = peel_tag_array($_POST);

        $v = new v((array) $data);

        $v->rule('required', [
            'search',
        ]);

        $v->rule('lengthMin', 'search', 1);
        
        $v->rule('lengthMax', 'search', 100);

        error::jsonvalitron($v);

        $search = trim($data['search']);

        $chat = $this->db->sql("

            SELECT * FROM chat WHERE
                
            chat_id LIKE '%{$search}%' OR
                
            user_id LIKE '%{$search}%'
                
            ORDER BY chat_id DESC LIMIT 10

        ", 2, 1);

        $chat ?: (new message)->code(300)->return('not_found')->json();

        $chat_ids = $this->getIn($chat, 'chat_id');

        $chat = $this->db->t2wherein('chat', 'user', 'chat.chat_id', $chat_ids, 2);

        if($chat)
        {
            (new message)->code(200)->data([
                'chat' => $chat, 
                'render' => 'chat_search',
            ])->json();
        }
        else
        {
            (new message)->code(300)->return('not_found')->json();
        }
    }



}
