<?php 

namespace modulus\admin\download\model;
use core\model;
use \library\error;
use \library\message;
use \Valitron\Validator as v;

class downloadModel extends model
{
	public function downloadCount()
    {
        return count($this->db->sql("
            
            SELECT download_id FROM download 
            
            INNER JOIN user ON user.user_id = download.user_id
            
            ORDER BY download.download_id DESC", 2));
    }

    public function download($start, $limit)
    {
        return $this->db->t2where('download', 'user', "download_id > 0 ORDER BY download_id DESC LIMIT {$start}, {$limit}", [], 2, 2);
    }
}
