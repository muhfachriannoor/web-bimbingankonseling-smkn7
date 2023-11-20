	<?php
class M_kelas extends CI_Model
{
	function get($kid)
	{
		$this->db->where('kid', $kid);
		$query = $this->db->get('tb_kelas');
		return $query;
	}

	function cek_kelas()
	{
		$query = $this->db->get('tb_kelas');
		return $query;
	}

	function insert($data)
	{
		$query = $this->db->insert('tb_kelas',$data);
	}

	function detail($gid,$kid)
	{
		$query = $this->db->query("SELECT tb_guru.gid, tb_guru.nama_guru, tb_guru.email, tb_guru.foto_guru, tb_guru.nomor_induk, tb_kelas.* FROM tb_guru INNER JOIN tb_kelas ON tb_kelas.gid = tb_guru.gid WHERE tb_guru.gid = '$gid' AND tb_kelas.kid = '$kid'");
		return $query;
	}

	public function edit($data,$kid)
	{
		$this->db->where('kid', $kid);
		$query = $this->db->update('tb_kelas',$data);
	}

	function delete($kid)
	{
		$data 	= array('kid' => $kid);
		$query 	= $this->db->delete('tb_kelas',$data);
	}
}