<?php
class M_user extends CI_Model
{
	function get($uid)
	{
		$query = $this->db->query("SELECT * FROM tb_user WHERE uid = '$uid'");
		return $query;
	}

	function edit_guru($uid)
	{
		$query = $this->db->query("SELECT tb_user.uid, tb_user.username, tb_user.status_user, tb_user.level, tb_guru.* FROM tb_user INNER JOIN tb_guru ON tb_guru.username = tb_user.username WHERE tb_user.uid = '$uid'");
		return $query;
	}

	function edit_siswa($uid)
	{
		$query = $this->db->query("SELECT tb_user.uid, tb_user.username, tb_user.status_user, tb_user.level, tb_siswa.* FROM tb_user INNER JOIN tb_siswa ON tb_siswa.username = tb_user.username WHERE tb_user.uid = '$uid'");
		return $query;
	}

	public function edit($data,$uid)
	{
		$this->db->where('uid', $uid);
		$query = $this->db->update('tb_user',$data);
	}
}