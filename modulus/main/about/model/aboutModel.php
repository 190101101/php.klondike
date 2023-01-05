<?php 

namespace modulus\main\about\model;
use core\model;

class aboutModel extends model
{
	public function about()
	{
		return $this->db->t1where('setting', 'setting_key=?', ['about']);
	}    
}
