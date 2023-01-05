<?php 

namespace modulus\admin\requires\model;
use core\model;

class requireModel extends model
{
    public function section()
    {
        return $this->db->t1('section', 2);
    }
    
    public function category()
    {
        return $this->db->t2('category', 'section', 2);
    }

    public function notice()
    {
        return $this->db->t1where('notice', 'notice_status = 1', [], 2);
    }

    public function post()
    {
        return $this->db->t2where('post', 'notice', 'post_id > 0 ORDER BY post.post_id DESC LIMIT 10', [], 2);
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
