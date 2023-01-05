<?php 

namespace core;
use library\triangle;

class model extends triangle
{
	public $db;

	public function __construct()
	{
		$this->db = new triangle();
	}
}