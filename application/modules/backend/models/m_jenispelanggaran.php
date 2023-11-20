<?php
class M_jenispelanggaran extends CI_Model
{
	function get($jid)
	{
		$this->db->where('jid', $jid);
		$query = $this->db->get('tb_jenis_pelanggaran');
		return $query;
	}

	function cek_jenispelanggaran()
	{
		$query = $this->db->get('tb_jenis_pelanggaran');
		return $query;
	}

	function show()
	{
		$query = $this->db->query("SELECT tb_kategori_pelanggaran.nama_kategori, tb_jenis_pelanggaran.* FROM tb_kategori_pelanggaran INNER JOIN tb_jenis_pelanggaran ON tb_jenis_pelanggaran.kpid = tb_kategori_pelanggaran.kpid");
		return $query->result();
	}

	function insert($data)
	{
		$query = $this->db->insert('tb_jenis_pelanggaran',$data);
	}

	public function edit($data,$jid)
	{
		$this->db->where('jid', $jid);
		$query = $this->db->update('tb_jenis_pelanggaran',$data);
	}

	function delete($jid)
	{
		$data 	= array('jid' => $jid);
		$query 	= $this->db->delete('tb_jenis_pelanggaran',$data);
	}
}