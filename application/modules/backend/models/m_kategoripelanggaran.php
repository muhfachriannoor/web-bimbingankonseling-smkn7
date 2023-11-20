<?php
class M_kategoripelanggaran extends CI_Model
{
	function get($kpid)
	{
		$this->db->where('kpid', $kpid);
		$query = $this->db->get('tb_kategori_pelanggaran');
		return $query;
	}

	function cek_kategoripelanggaran()
	{
		$query = $this->db->get('tb_kategori_pelanggaran');
		return $query;
	}

	function show()
	{
		$query = $this->db->get('tb_kategori_pelanggaran');
		return $query->result();
	}

	function insert($data)
	{
		$query = $this->db->insert('tb_kategori_pelanggaran',$data);
	}

	public function edit($data,$kpid)
	{
		$this->db->where('kpid', $kpid);
		$query = $this->db->update('tb_kategori_pelanggaran',$data);
	}

	function delete($kpid)
	{
		$data 	= array('kpid' => $kpid);
		$query 	= $this->db->delete('tb_kategori_pelanggaran',$data);
	}
}