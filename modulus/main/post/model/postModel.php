<?php 

namespace modulus\main\post\model;
use core\model;
use \library\session;
use \library\http;
use \library\error;
use \library\message;
use \library\User;
use \Valitron\Validator as v;

class postModel extends model
{
    public function _postLoadMore($notice_id, $start_id)
    {
        $first_id = $this->db->t1where('post', 'post_id=? ORDER BY post_id ASC', [$notice_id]);

        $post = $this->db->sql("

            SELECT post.*, notice.* FROM post
            
            INNER JOIN notice ON notice.notice_id = post.notice_id
            
            WHERE post.post_id < $start_id

            ORDER BY post.post_id DESC

            LIMIT 2
            
        ", 2, 1);

        if($post == FALSE)
        {
            (new message)->code(300)->json();
        }

        (new message)->code(200)->data([
            'post' => $post, 
            'render' => 'post_load',
            'this_notice_id' => $notice_id,
            'last_post_id' => $post[count($post)-1]['post_id'],
        ])->json();
    }
}
