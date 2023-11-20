<?php
class M_mail extends CI_Model
{
	function get($mid)
	{
		$this->db->where('mid', $mid);
		$query = $this->db->get('tb_mail');
		return $query;
	}

	function getedit($mid)
	{
		$query = $this->db->query("SELECT tb_kelas.nama_kelas, tb_kelas.gid, tb_guru.nama_guru, tb_guru.email, tb_mail.* FROM ((tb_mail INNER JOIN tb_kelas ON tb_mail.kid = tb_kelas.kid) INNER JOIN tb_guru ON tb_kelas.gid = tb_guru.gid) WHERE tb_mail.mid='$mid'");
		return $query;
	}

	function cek_mail()
	{
		$query = $this->db->get('tb_mail');
		return $query;
	}

	function show()
	{
		$query = $this->db->query("SELECT tb_kelas.nama_kelas, tb_kelas.gid, tb_guru.nama_guru, tb_guru.email, tb_mail.* FROM ((tb_mail INNER JOIN tb_kelas ON tb_mail.kid = tb_kelas.kid) INNER JOIN tb_guru ON tb_kelas.gid = tb_guru.gid) ORDER BY tb_mail.mid DESC");
		return $query->result();
	}

	function get_kelas() {
        $query = $this->db->query("SELECT tb_guru.nama_guru, tb_guru.email, tb_kelas.* FROM tb_kelas INNER JOIN tb_guru ON tb_kelas.gid = tb_guru.gid");
 
        //cek apakah ada data
        if ($query->num_rows() > 0) { //jika ada maka jalankan
            return $query->result();
        }
    }

    function insert($data)
	{
		$query = $this->db->insert('tb_mail',$data);
	}

	function detail($mid)
	{
		$query = $this->db->query("SELECT tb_kelas.nama_kelas, tb_kelas.gid, tb_guru.nama_guru, tb_guru.email, tb_mail.* FROM ((tb_mail INNER JOIN tb_kelas ON tb_mail.kid = tb_kelas.kid) INNER JOIN tb_guru ON tb_kelas.gid = tb_guru.gid) WHERE tb_mail.mid='$mid'");
		return $query;
	}

	public function edit($data,$mid)
	{
		$this->db->where('mid', $mid);
		$query = $this->db->update('tb_mail',$data);
	}

	function delete($mid)
	{
		$data 	= array('mid' => $mid);
		$query 	= $this->db->delete('tb_mail',$data);
	}
}