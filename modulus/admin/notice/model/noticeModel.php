<?php 

namespace modulus\admin\notice\model;
use core\model;
use \library\error;
use \library\message;
use \library\File as f;
use \Valitron\Validator as v;

class noticeModel extends model
{
	public function noticeCount()
    {
        return count($this->db->sql("
            
            SELECT notice_id FROM notice 
            
            ORDER BY notice.notice_id DESC", 2));
    }

    public function notice($start, $limit)
    {
        return $this->db->t1where('notice', "notice_id > 0  ORDER BY notice_id DESC LIMIT {$start}, {$limit}", [], 2, 2);
    }

    /*crud*/
    public function __noticeCreate()
    {
        $data = peel_tag_array($_POST);

        $v = new v($data);

        $v->rule('required', [
            'notice',
            'notice_title',
        ]);

        error::jsonvalitron($v);

        if(has_file($_FILES, 'notice_image'))
        {
            $image = (new f)->set($_FILES, 'notice_image')->get();
            
            if($image['status'] == FALSE){
                (new message)->code(404)->return($image['errors'])->json();
            } 
            $data  += ['notice_image' => $image['name']];
            $data  += ['notice_imagesize' => $image['size']];
        }

        $data += ['notice_slug' => seo($data['notice_title'])];

        $notice = $this->db->t1where('notice', 'notice_slug=?', [
            $data['notice_slug']
        ]);

        if($notice){
            (new message)->code(300)->return('already_have')->json();
        }

        $return = $this->db->make('notice', $data);

        $notice = $this->db->t1where('notice', 'notice_id=?', [$return['id']]);

        if($return['status'] == TRUE)
        {
            !isset($image) ?: (new f)->move($image);

            (new message)->code(200)->return('success')->data([
                'notice' => $notice,
                'render' => 'notice_create'
            ])->json();

        }else
        {
            (new message)->code(404)->return('error')->json();
        }

    }

    public function _noticeUpdate($id)
    {
        $notice = $this->db->t1where('notice', 'notice.notice_id=?', [$id]);
        return $notice ? $notice : redirect('panel/notice');
    }

    public function __noticeUpdate()
    {
        $image_delete = $_POST['image_delete'];

        $data = except($_POST, ['image_delete']);

        $data = peel_tag_array($data);

        $v = new v($data);

        $v->rule('required', [
            'notice',
            'notice_title',
            'notice_id',
        ]);

        error::jsonvalitron($v);
        
        if(has_file($_FILES, 'notice_image'))
        {
            $image = (new f)->set($_FILES, 'notice_image')->get();
            
            if($image['status'] == FALSE){
                (new message)->code(404)->return($image['errors'])->json();
            }
            $data  += ['notice_image' => $image['name']];
            $data  += ['notice_imagesize' => $image['size']];
        }

        $data += ['notice_slug' => seo($data['notice_title'])];

        $notice = $this->db->t1where('notice', 'notice_slug=? && notice_id != ?', [
            $data['notice_slug'], $data['notice_id']
        ]);

        if($notice)
        {
            (new message)->code(300)->return('already_have')->json();
        }

        $return = $this->db->update('notice', $data, [
            'id' => 'notice_id',
        ]);

        $notice = $this->db->t1where('notice', 'notice_id=?', [$data['notice_id']]);

        if($return['status'] == TRUE)
        {
            !isset($image) ?: (new f)->drop($image_delete);
            
            !isset($image) ?: (new f)->move($image);

            (new message)->code(200)->return('success')->data([
                'notice' => $notice,
                'render' => 'notice_update' 
            ])->json();

        }
        else
        {
            (new message)->code(404)->return('error')->json();
        }
    }

    public function _noticeDelete($id)
    {
        $notice = $this->db->t1where('notice', 'notice_id=?', [$id]);

        if($notice)
        {
            $post = $this->db->t1where('post', 'notice_id=?', [$notice->notice_id], 2, 1);

            if($post)
            {
                $post_id = $this->getIn($post, 'notice_id');

                if(empty($post['post_image']))
                {
                    foreach($post as $image){
                        (new f())->drop($image['post_image']);
                    }
                }

                $status = $this->db->wheredeletein('post', 'notice_id', $post_id);
            }

            $return = $this->db->wheredelete('notice', 'notice_id=?', [$notice->notice_id]);

            if($return['status'] == TRUE)
            {
                empty($notice->notice_image) ?: (new f)->drop($notice->notice_image);
                
                (new message)->code(200)->return('deleted')->json();
            }
            else
            {
                (new message)->code(404)->return('error')->json();
            }
        
        }
        else
        {
            (new message)->code(404)->return('not_found')->json();
        }

    }

    public function noticeStatus($notice_id)
    {
        $notice = $this->db->t1where('notice', 'notice_id=?', [$notice_id]);

        if($notice)
        {
            $status = $notice->notice_status == 0 ? 1 : 0;

            $return = $this->db->whereupdate('notice', 'notice_status=?', 'notice_id=?', [
                $status, $notice_id
            ]);

            $return['status'] == TRUE
                ? (new message)->code(200)->response('status_success')->json()
                : (new message)->code(404)->response('status_error')->json();
        }
        else
        {
            (new message)->code(404)->response('error')->json();
        }
    }

    public function __noticeSearch()
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

        $notice = $this->db->sql("

            SELECT * FROM notice WHERE
                
            notice_id LIKE '%{$search}%' OR
                
            notice LIKE '%{$search}%' OR 

            notice_title LIKE '%{$search}%'
                
            ORDER BY notice_id DESC LIMIT 10

        ", 2, 1);

        $notice ?: (new message)->code(300)->return('not_found')->json();

        $notice_ids = $this->getIn($notice, 'notice_id');

        $notice = $this->db->t1wherein('notice', 'notice_id', $notice_ids, 2);

        if($notice)
        {
            (new message)->code(200)->data([
                'notice' => $notice, 
                'render' => 'notice_search',
            ])->json();
        }
        else
        {
            (new message)->code(300)->return('not_found')->json();
        }
    }
}
