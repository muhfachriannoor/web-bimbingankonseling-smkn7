<?php
class M_siswa extends CI_Model
{
	function get($sid)
	{
		$query = $this->db->query("SELECT * FROM tb_siswa WHERE sid = '$sid'");
		return $query;
	}

	function getSiswa($sid)
	{
		$query = $this->db->query("SELECT * FROM tb_siswa WHERE sid = '$sid'");
		return $query;
	}

	function cek_siswa()
	{
		$query = $this->db->get('tb_siswa');
		return $query;
	}

	function show()
	{
		$query = $this->db->query('SELECT tb_kelas.nama_kelas, tb_siswa.* FROM tb_siswa INNER JOIN tb_kelas ON tb_kelas.kid = tb_siswa.kid ORDER BY tb_siswa.sid DESC');
		return $query->result();
	}

	function insertSiswa($data)
	{
		$query = $this->db->insert('tb_siswa',$data);
	}


	function detail($sid)
	{
		$query = $this->db->query("SELECT tb_kelas.nama_kelas, tb_siswa.* FROM tb_siswa INNER JOIN tb_kelas ON tb_kelas.kid = tb_siswa.kid WHERE tb_siswa.sid = '$sid'");
		return $query;
	}

	function editSiswa($data,$sid)
	{
		$this->db->where('sid', $sid);
		$query = $this->db->update('tb_siswa',$data);
	}

	function deleteSiswa($sid)
	{
		$data 	= array('sid' => $sid);
		$query 	= $this->db->delete('tb_siswa',$data);
	}

}