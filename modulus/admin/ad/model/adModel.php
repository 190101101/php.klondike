<?php 

namespace modulus\admin\ad\model;
use core\model;
use \library\error;
use \library\message;
use \library\file as f;
use \Valitron\Validator as v;

class adModel extends model
{
	public function adCount()
    {
        return count($this->db->sql("
            
            SELECT ad_id FROM ad 
            
            ORDER BY ad.ad_id DESC", 2));
    }

    public function ad($start, $limit)
    {
        return $this->db->t1where('ad', "ad_id > 0  ORDER BY ad_id DESC LIMIT {$start}, {$limit}", [], 2, 2);
    }

    /*crud*/
    public function __adCreate()
    {
        $data = peel_tag_array($_POST);

        $v = new v($data);

        $v->rule('required', [
            'ad_title',
            'ad_link',
            'ad_content',
        ]);

        error::jsonvalitron($v);

        $return = $this->db->make('ad', $data);

        $ad = $this->db->t1where('ad', 'ad_id=?', [$return['id']]);

        if($return['status'] == TRUE)
        {
            (new message)->code(200)->return('success')->data([
                'ad' => $ad,
                'render' => 'ad_create'
            ])->json();

        }else
        {
            (new message)->code(404)->return('error')->json();
        }

    }

    public function _adUpdate($id)
    {
        $ad = $this->db->t1where('ad', 'ad.ad_id=?', [$id]);
        return $ad ? $ad : redirect('panel/ad');
    }

    public function __adUpdate()
    {
        $data = peel_tag_array($_POST);

        $v = new v($data);

        $v->rule('required', [
            'ad_title',
            'ad_link',
            'ad_content',
            'ad_id',
        ]);

        error::jsonvalitron($v);

        $return = $this->db->update('ad', $data, [
            'id' => 'ad_id',
        ]);

        $ad = $this->db->t1where('ad', 'ad_id=?', [$data['ad_id']]);

          $return['status'] == TRUE
            ? (new message)->code(200)->return('success')->data($ad)->json()
            : (new message)->code(404)->return('error')->json();
    }

    public function _adDelete($id)
    {
        $return = $this->db->wheredelete('ad', 'ad_id=?', [$id]);

        $return['status'] == TRUE
            ? (new message)->code(200)->return('deleted')->json()
            : (new message)->code(404)->return('error')->json();
    }

        public function __adSearchCheck()
    {
        $data = peel_tag_array($_POST);

        $v = new v((array) $data);

        $v->rule('required', [
            'search',
        ]);

        $v->rule('lengthMin', 'search', 2);
        
        $v->rule('lengthMax', 'search', 100);

        error::jsonvalitron($v);

        return $data;

    }

    public function __adSearch()
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

        $ad = $this->db->sql("

            SELECT * FROM ad WHERE
                
            ad_id LIKE '%{$search}%' OR
                
            ad_title LIKE '%{$search}%'
                
            ORDER BY ad_id DESC LIMIT 10

        ", 2, 1);

        $ad ?: (new message)->code(300)->return('not_found')->json();

        $ad_ids = $this->getIn($ad, 'ad_id');

        $ad = $this->db->t1wherein('ad', 'ad_id', $ad_ids, 2);

        if($ad)
        {
            (new message)->code(200)->data([
                'ad' => $ad, 
                'render' => 'ad_search',
            ])->json();
        }
        else
        {
            (new message)->code(300)->return('not_found')->json();
        }
    }
}
