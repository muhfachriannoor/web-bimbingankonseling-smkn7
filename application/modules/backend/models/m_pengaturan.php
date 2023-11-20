<?php
class M_pengaturan extends CI_Model
{
	function get($peid)
	{
		$this->db->where('peid', $peid);
		$query = $this->db->get('tb_pengaturan');
		return $query;
	}

	function cek_pengaturan()
	{
		$query = $this->db->get('tb_pengaturan');
		return $query;
	}

	function show()
	{
		$query = $this->db->get('tb_pengaturan');
		return $query->result();
	}

	function insert($data)
	{
		$query = $this->db->insert('tb_pengaturan',$data);
	}

	function detail($peid)
	{
		$this->db->where('peid', $peid);
		$query = $this->db->get('tb_pengaturan');
		return $query;
	}

	public function edit($data,$peid)
	{
		$this->db->where('peid', $peid);
		$query = $this->db->update('tb_pengaturan',$data);
	}

	function delete($peid)
	{
		$data 	= array('peid' => $peid);
		$query 	= $this->db->delete('tb_pengaturan',$data);
	}
}