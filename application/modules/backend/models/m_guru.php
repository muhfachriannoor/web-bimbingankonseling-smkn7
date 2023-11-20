<?php
class M_guru extends CI_Model
{
	function getGuru($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('tb_guru');
		return $query;
	}

	function getUser($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('tb_user');
		return $query;
	}

	function get($gid)
	{
		$query = $this->db->query("SELECT tb_user.uid, tb_user.username, tb_user.status_user, tb_user.level, tb_guru.* FROM tb_user INNER JOIN tb_guru ON tb_guru.username = tb_user.username WHERE tb_guru.gid = '$gid'");
		return $query;
	}

	function cek_guru()
	{
		$query = $this->db->get('tb_guru');
		return $query;
	}

	function show()
	{
		$query = $this->db->query("SELECT tb_user.uid, tb_user.username, tb_user.status_user, tb_user.level, tb_guru.* FROM tb_user INNER JOIN tb_guru ON tb_guru.username = tb_user.username ORDER BY tb_user.status_user DESC");
		return $query->result();
	}

	function insertGuru($dataGuru)
	{
		$query = $this->db->insert('tb_guru', $dataGuru);
	}

	function insertUser($dataUser)
	{
		$query = $this->db->insert('tb_user', $dataUser);
	}

	function detail($gid)
	{
		$query = $this->db->query("SELECT tb_user.uid, tb_user.username, tb_user.status_user, tb_user.level, tb_guru.* FROM tb_user INNER JOIN tb_guru ON tb_guru.username = tb_user.username WHERE tb_guru.gid = '$gid'");
		return $query;
	}

	public function editGuru($dataGuru, $username)
	{
		$this->db->where('username', $username);
		$query = $this->db->update('tb_guru', $dataGuru);
	}

	public function editUser($dataUser, $id)
	{
		$this->db->where('uid', $id);
		$query = $this->db->update('tb_user', $dataUser);
	}

	function deleteGuru($username)
	{
		$data 	= array('username' => $username);
		$query 	= $this->db->delete('tb_guru', $data);
	}

	function deleteUser($username)
	{
		$data 	= array('username' => $username);
		$query 	= $this->db->delete('tb_user', $data);
	}
}
