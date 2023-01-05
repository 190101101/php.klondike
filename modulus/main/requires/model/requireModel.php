<?php 

namespace modulus\main\requires\model;
use core\model;

class requireModel extends model
{
    public function section()
    {
        return $this->db->t1where('section', 'section_status=1', [], 2);
    }
    
    public function category()
    {
        return $this->db->t1where('category', 'category_status=1', [], 2);
    }

    public function notice()
    {
        return $this->db->t1where('notice', 'notice_status = 1', [], 2);
    }

    public function post()
    {
        return $this->db->t2where('post', 'notice', 'post_status = 1 ORDER BY post.post_id DESC LIMIT 2', [], 2);
    }

    public function voting()
    {
        return $this->db->t1where('voting', 'voting_status = 1 AND voting_type =?', ['main']);
    }

    public function chat()
    {
        $chat = $this->db->t1desc('chat');

        if ($chat)
        {
            return $this->db->t2where('chat', 'user', 'chat_id > ? ORDER BY chat.chat_id ASC LIMIT 50', [
                $chat->chat_id - 50
            ], 2);
        }
        else
        {
            return $chat;
        }
    }

    public function download()
    {
        return $this->db->t1where('setting', 'setting_key = ?', ['download'])->setting_value;
    }

    public function file()
    {
        return $this->db->t1where('setting', 'setting_key = ?', ['file'])->setting_value;
    }
}
