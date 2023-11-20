<?php

class M_login extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function cek_user($data) 
	{
		$query = $this->db->get_where('tb_user', $data);
		return $query;
	}
}
?>