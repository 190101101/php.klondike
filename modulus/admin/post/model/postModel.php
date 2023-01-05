<?php 

namespace modulus\admin\post\model;
use core\model;
use \library\error;
use \library\message;
use \library\file as f;
use \Valitron\Validator as v;

class postModel extends model
{
	public function postCount()
    {
        return count($this->db->sql("
            
            SELECT post_id FROM post 
            
            INNER JOIN notice ON notice.notice_id = post.notice_id
            
            ORDER BY post.post_id DESC
            
        ", 2));
    }

    public function post($start, $limit)
    {
        return $this->db->t2where('post', 'notice',
            "post.post_id > 0  ORDER BY post_id DESC LIMIT {$start}, {$limit}", [], 2, 2);
    }

    public function notice()
    {
        return $this->db->t1('notice', 2);
    }

    /*crud*/
    public function __postCreate()
    {
        $data = peel_tag_array($_POST);

        $v = new v($data);

        $v->rule('required', [
            'post_title',
            'post_content',
        ]);

        error::jsonvalitron($v);

        if(has_file($_FILES, 'post_image'))
        {
            $image = (new f)->set($_FILES, 'post_image')->get();

            if($image['status'] == FALSE){

                (new message)->code(404)->return($image['errors'])->json();
            } 
            $data  += ['post_image' => $image['name']];
            $data  += ['post_imagesize' => $image['size']];
        }

        $return = $this->db->make('post', $data);
        
        $post = $this->db->t2where('post', 'notice', 'post.post_id=?', [
            $return['id']
        ]);

        if($return['status'] == TRUE)
        {
            !isset($image) ?: (new f)->move($image);

            (new message)->code(200)->return('success')->data([
                'post' => $post,
                'render' => 'post_create',
            ])->json();

        }else
        {
            (new message)->code(404)->return('error')->json();
        }

    }

    public function _postUpdate($id)
    {
        $post =  $this->db->t2where('post', 'notice', 'post.post_id=?', [$id]);
        return $post ? $post : redirect('panel/post');
    }

    public function __postUpdate()
    {
        $image_delete = $_POST['image_delete'];

        $data = except($_POST, ['image_delete']);

        $data = peel_tag_array($data);

        $v = new v($data);

        $v->rule('required', [
            'post_title',
            'post_content',
            'post_id',
        ]);

        error::jsonvalitron($v);
        
        if(has_file($_FILES, 'post_image'))
        {
            $image = (new f)->set($_FILES, 'post_image')->get();
            
            if($image['status'] == FALSE){
                (new message)->code(404)->return($image['errors'])->json();
            }
            $data  += ['post_image' => $image['name']];
            $data  += ['post_imagesize' => $image['size']];
        }

        $return = $this->db->update('post', $data, [
            'id' => 'post_id',
        ]);

        $post = $this->db->t2where('post', 'notice', 'post.post_id=?', [$data['post_id']]);
     
        $notice = $this->db->t1('notice', 2);

        if($return['status'] == TRUE)
        {
            !isset($image) ?: (new f)->drop($image_delete);

            !isset($image) ?: (new f)->move($image);

            (new message)->code(200)->return('success')->data([
                'post' => $post,
                'notice' => $notice,
                'render' => 'post_update',
            ])->json();

        }
        else
        {
            (new message)->code(404)->return('error')->json();
        }
    }


    public function _postDelete($id)
    {
        $return = $this->db->wheredelete('post', 'post_id=?', [$id]);

        if($return['status'] == TRUE)
        {
            empty($post->post_image) ?: (new f)->drop($post->post_image);
            
            (new message)->code(200)->return('deleted')->json();
        }
        else
        {
            (new message)->code(404)->return('error')->json();
        }
    }

    public function postStatus($post_id)
    {
        $return = $this->db->whereupdate('post', 'post_status=?', 'post_id=?', [
            $this->db->t1where('post', 'post_id=?', [$post_id])->post_status == 0 ? 1 : 0, $post_id
        ]);

        $return['status'] == TRUE
            ? (new message)->code(200)->return('success')->json()
            : (new message)->code(404)->return('error')->json();
    }

    public function noticeName($notice)
    {
        $notice = $this->db->t1where('notice', 'notice=?', [$notice]);

        if($notice)
        {
            return $notice;
        }
        else
        {
            (new message)->code(300)->return('not_found')->http('home')->get();
        }
    }

    
    public function postByNoticeCount($notice)
    {
        return count($this->db->sql("
            
            SELECT post_id FROM post 
            
            INNER JOIN notice ON notice.notice_id = post.notice_id
            
            WHERE notice.notice = '{$notice}'

        ", 2));
    }

    public function postByNotice($notice, $start, $limit)
    {
        return $this->db->t2where('post', 'notice', 
            
            "notice.notice=? ORDER BY post.post_id DESC LIMIT {$start}, {$limit}", [$notice], 2, 2);
    }

    public function __postSearch()
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

        $post = $this->db->sql("

            SELECT * FROM post WHERE
                
            post_id LIKE '%{$search}%' OR
                
            post_title LIKE '%{$search}%'

            ORDER BY post_id DESC LIMIT 10

        ", 2, 1);

        $post ?: (new message)->code(300)->return('not_found')->json();

        $post_ids = $this->getIn($post, 'post_id');

        $post = $this->db->t2wherein('post', 'notice', 'post.post_id', $post_ids, 2);

        if($post)
        {
            (new message)->code(200)->data([
                'post' => $post, 
                'render' => 'post_search',
            ])->json();
        }
        else
        {
            (new message)->code(300)->return('not_found')->json();
        }
    }

}
