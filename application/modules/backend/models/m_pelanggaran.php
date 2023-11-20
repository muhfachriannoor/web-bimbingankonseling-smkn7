<?php
class M_pelanggaran extends CI_Model
{
	function get($pid)
	{
		$query = $this->db->query("SELECT tb_kelas.kid, tb_siswa.sid, tb_jenis_pelanggaran.jid, tb_jenis_pelanggaran.jenis_pelanggaran, tb_siswa.nama_siswa, tb_kelas.nama_kelas, tb_user.username, tb_kategori_pelanggaran.kpid, tb_kategori_pelanggaran.nama_kategori, tb_pelanggaran.* FROM (((((tb_pelanggaran INNER JOIN tb_jenis_pelanggaran ON tb_pelanggaran.jid = tb_jenis_pelanggaran.jid) INNER JOIN tb_siswa ON tb_pelanggaran.sid = tb_siswa.sid) INNER JOIN tb_user ON tb_pelanggaran.uid = tb_user.uid) INNER JOIN tb_kelas ON tb_siswa.kid = tb_kelas.kid) INNER JOIN tb_kategori_pelanggaran ON tb_jenis_pelanggaran.kpid = tb_kategori_pelanggaran.kpid) WHERE tb_pelanggaran.pid = '$pid'");
		return $query;
	}

	function cek_pelanggaran($uid)
	{
		$cek = $this->db->get_where('tb_user', array('uid' => $uid))->row();
		if ($cek->level == 1 or $cek->level == 2 or $cek->level == 4) {
			$query = $this->db->get('tb_pelanggaran');
		} else {
			$kid = $this->db->get_where('tb_kelas', array('gid' => $uid))->row();
			$query = $this->db->query("SELECT tb_jenis_pelanggaran.jenis_pelanggaran, tb_siswa.nama_siswa, tb_kelas.nama_kelas, tb_user.username, tb_pelanggaran.* FROM ((((tb_pelanggaran INNER JOIN tb_jenis_pelanggaran ON tb_pelanggaran.jid = tb_jenis_pelanggaran.jid) INNER JOIN tb_siswa ON tb_pelanggaran.sid = tb_siswa.sid) INNER JOIN tb_user ON tb_pelanggaran.uid = tb_user.uid) INNER JOIN tb_kelas ON tb_siswa.kid = tb_kelas.kid) WHERE tb_kelas.kid = '$kid->kid' ORDER BY tb_pelanggaran.pid DESC");
		}
		return $query;
	}

	function show($uid)
	{
		$cek = $this->db->get_where('tb_user', array('uid' => $uid))->row();
		if ($cek->level == 1 or $cek->level == 2 or $cek->level == 4) {
			$query = $this->db->query("SELECT tb_jenis_pelanggaran.jenis_pelanggaran, tb_siswa.nama_siswa, tb_kelas.nama_kelas, tb_user.username, tb_pelanggaran.* FROM ((((tb_pelanggaran INNER JOIN tb_jenis_pelanggaran ON tb_pelanggaran.jid = tb_jenis_pelanggaran.jid) INNER JOIN tb_siswa ON tb_pelanggaran.sid = tb_siswa.sid) INNER JOIN tb_user ON tb_pelanggaran.uid = tb_user.uid) INNER JOIN tb_kelas ON tb_siswa.kid = tb_kelas.kid) ORDER BY tb_pelanggaran.pid DESC");
		} else {
			$kid = $this->db->get_where('tb_kelas', array('gid' => $uid))->row();
			$query = $this->db->query("SELECT tb_jenis_pelanggaran.jenis_pelanggaran, tb_siswa.nama_siswa, tb_kelas.nama_kelas, tb_user.username, tb_pelanggaran.* FROM ((((tb_pelanggaran INNER JOIN tb_jenis_pelanggaran ON tb_pelanggaran.jid = tb_jenis_pelanggaran.jid) INNER JOIN tb_siswa ON tb_pelanggaran.sid = tb_siswa.sid) INNER JOIN tb_user ON tb_pelanggaran.uid = tb_user.uid) INNER JOIN tb_kelas ON tb_siswa.kid = tb_kelas.kid) WHERE tb_kelas.kid = '$kid->kid' ORDER BY tb_pelanggaran.pid DESC");
		}
		return $query->result();
	}

	function kelas($kelas)
	{
		$this->db->where('kid', $kelas);
		$query = $this->db->get('tb_kelas');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert('tb_pelanggaran', $data);
	}

	function detail($pid)
	{
		$query = $this->db->query("SELECT tb_jenis_pelanggaran.jenis_pelanggaran, tb_siswa.nisn, tb_siswa.nama_siswa, tb_siswa.jenis_kelamin, tb_siswa.foto_siswa, tb_kelas.nama_kelas, tb_guru.nama_guru, tb_user.username, tb_kategori_pelanggaran.nama_kategori, tb_pelanggaran.* FROM ((((((tb_pelanggaran INNER JOIN tb_jenis_pelanggaran ON tb_pelanggaran.jid = tb_jenis_pelanggaran.jid) INNER JOIN tb_siswa ON tb_pelanggaran.sid = tb_siswa.sid) INNER JOIN tb_user ON tb_pelanggaran.uid = tb_user.uid) INNER JOIN tb_kelas ON tb_siswa.kid = tb_kelas.kid) INNER JOIN tb_guru ON tb_kelas.gid = tb_guru.gid) INNER JOIN tb_kategori_pelanggaran ON tb_jenis_pelanggaran.kpid = tb_kategori_pelanggaran.kpid) WHERE tb_pelanggaran.pid ='$pid'");
		return $query;
	}

	public function edit($data, $pid)
	{
		$this->db->where('pid', $pid);
		$query = $this->db->update('tb_pelanggaran', $data);
	}

	function delete($pid)
	{
		$data 	= array('pid' => $pid);
		$query 	= $this->db->delete('tb_pelanggaran', $data);
	}

	function pdf($kelas, $dari_tanggal, $sampai_tanggal)
	{
		$query = $this->db->query("SELECT tb_jenis_pelanggaran.jenis_pelanggaran, tb_siswa.nisn, tb_siswa.nama_siswa, tb_siswa.foto_siswa, tb_kelas.nama_kelas, tb_guru.nama_guru, tb_user.username, tb_kategori_pelanggaran.nama_kategori, tb_pelanggaran.* FROM ((((((tb_pelanggaran INNER JOIN tb_jenis_pelanggaran ON tb_pelanggaran.jid = tb_jenis_pelanggaran.jid) INNER JOIN tb_siswa ON tb_pelanggaran.sid = tb_siswa.sid) INNER JOIN tb_user ON tb_pelanggaran.uid = tb_user.uid) INNER JOIN tb_kelas ON tb_siswa.kid = tb_kelas.kid) INNER JOIN tb_guru ON tb_kelas.gid = tb_guru.gid) INNER JOIN tb_kategori_pelanggaran ON tb_jenis_pelanggaran.kpid = tb_kategori_pelanggaran.kpid) WHERE tb_kelas.kid ='$kelas' AND tb_pelanggaran.waktu_pelanggaran BETWEEN '$dari_tanggal' AND '$sampai_tanggal'");
		return $query->result();
	}
}
