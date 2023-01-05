<?php 

namespace modulus\admin\user\model;
use core\model;
use \library\error;
use \library\message;
use \Valitron\Validator as v;

class userModel extends model
{
	public function userCount()
    {
        return count($this->db->sql("
            
            SELECT user_id FROM user 

            WHERE user.user_level < 99
            
            ORDER BY user.user_id DESC", 2));
    }

    public function user($start, $limit)
    {
        if(user_level() < 99)
        {
            return $this->db->t1where('user', "user_id > 0 AND user.user_level < 99  ORDER BY user_id DESC LIMIT {$start}, {$limit}", [], 2, 2);
        }
        else
        {
            return $this->db->t1where('user', "user_id > 0 ORDER BY user_id DESC LIMIT {$start}, {$limit}", [], 2, 2);
        }
    }

    /*crud*/
    public function __userCreate()
    {
        $data = peel_tag_array($_POST);

        $v = new v($data);

        $v->rule('required', [
            'user_login',
            'user_password',
            'user_color',
            'user_level',
        ]);

        error::jsonvalitron($v, 'panel/user/create');

        $user = $this->db->t1where('user', 'user_login=?', [
            $data['user_login']
        ]);

        if($user){
            // (new message)->code(300)->return('already_have')->get()->referer();
            (new message)->code(300)->return('already_have')->json();
        }

        $return = $this->db->make('user', $data);

        $user = $this->db->t1where('user', 'user_id=?', [$return['id']]);

        if($return['status'] == TRUE)
        {
            // (new message)->code(200)->return('success')->get()->http('panel/user');
            (new message)->code(200)->return('success')->data([
                'user' => $user,
                'render' => 'user_create'
            ])->json();

        }else
        {
            // (new message)->code(404)->return('error')->get()->referer();
            (new message)->code(404)->return('error')->json();
        }

    }

    public function _userUpdate($id)
    {
        $user = $this->db->t1where('user', 'user.user_id=?', [$id]);
        return $user ? $user : redirect('panel/user');
    }

    public function __userUpdate()
    {
        $data = peel_tag_array($_POST);

        $v = new v($data);

        $v->rule('required', [
            'user_login',
            'user_id',
        ]);

        // error::valitron($v, '/panel/user/create');
        error::jsonvalitron($v);

        $user = $this->db->t1where('user', 'user_login=? && user_id != ?', [
            $data['user_login'], $data['user_id']
        ]);

        if($user)
        {
            // (new message)->code(300)->return('already_have')->get()->referer();
            (new message)->code(300)->return('already_have')->json();
        }

        $return = $this->db->update('user', $data, [
            'id' => 'user_id',
        ]);

        $user = $this->db->t1where('user', 'user_id=?', [
            $data['user_id']
        ]);

        if($return['status'] == TRUE)
        {
            // (new message)->code(200)->return('success')->get()->referer();
            (new message)->code(200)->return('success')->data([
                'user' => $user,
                'render' => 'user_update'
            ])->json();

        }else
        {
            // (new message)->code(404)->return('error')->get()->referer();
            (new message)->code(404)->return('error')->json();
        }
    }

    public function userStatus($user_id)
    {
        $user = $this->db->t1where('user', 'user_id=?', [$user_id]);

        $user ?: (new message)->code(300)->return('not_found')->json();

        $return = $this->db->whereupdate('user', 'user_status=?', 'user_id=?', [
            $this->db->t1where('user', 'user_id=?', [$user->user_id])->user_status == 0 ? 1 : 0, $user->user_id
        ]);

        $return['status'] == TRUE
            ? (new message)->code(200)->return('status_success')->json()
            : (new message)->code(404)->return('status_error')->json();
    }

    public function _userDelete($id)
    {
        $user = $this->db->t1where('user', 'user_id=?', [$id]);

        $user ?: (new message)->code(300)->return('not_found')->json();

        $return = $this->db->wheredelete('user', 'user_id=?', [$user->user_id]);

        $return['status'] == TRUE
            ? (new message)->code(200)->return('deleted')->json()
            : (new message)->code(404)->return('error')->json();
    }

    public function __userSearch()
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

        $user = $this->db->sql("

            SELECT * FROM user WHERE
                
            user_id LIKE '%{$search}%' OR
                
            user_login LIKE '%{$search}%' OR
            
            user_ip LIKE '%{$search}%'
                
            ORDER BY user_id DESC LIMIT 10

        ", 2, 1);

        $user ?: (new message)->code(300)->return('not_found')->json();

        $user_ids = $this->getIn($user, 'user_id');

        $user = $this->db->t1wherein('user', 'user_id', $user_ids, 2);

        if($user)
        {
            (new message)->code(200)->data([
                'user' => $user, 
                'render' => 'user_search',
            ])->json();
        }
        else
        {
            (new message)->code(300)->return('not_found')->json();
        }
    }
}
