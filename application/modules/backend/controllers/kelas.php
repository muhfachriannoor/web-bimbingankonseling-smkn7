<?php
class Kelas extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") 
        {
			redirect('login/index');
		}
		$this->load->model('backend/m_kelas');
	}

	function input_kelas()
	{
		$title = 'Kelas';
		$uid = $this->session->userdata('uid');
		$data = array(
				'title' => $title,
				'uid' => $uid,
			);
		$this->load->view('backend/kelas_add',$data);
	}

	function input_kelas_proses()
	{
		$nama_kelas = $this->input->post('nama_kelas');
		$gid 		= $this->input->post('gid');

        $data = array(
        	'nama_kelas' => $nama_kelas,
        	'gid' => $gid,
        	'status' => '1'
        );

        $test 	= $this->db->query("SELECT * FROM tb_kelas WHERE gid='$gid'");
        $test2 	= $test->num_rows();

        if($test2 == 0){
			$query = $this->m_kelas->insert($data);
			$query = $this->db->query("UPDATE tb_user SET level='3' WHERE uid='$gid'");
			if($query >= 1){
				$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menambahkan data</p>');
				redirect ('backend/kelas_show', 'refresh');
			}else{
				$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal menambahkan data</p>');
				redirect ('backend/kelas_show', 'refresh');
			}
		}else{
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Guru yang dipilih sudah menjadi wali kelas di kelas lain</p>');
			redirect ('backend/kelas_show', 'refresh');
		}
	}

	function Aktif($kid)
	{
		$query = $this->m_kelas->get($kid);
	 	$row = $query->row();

	 	if($row->status == '2'){
			$query = $this->db->query("UPDATE tb_kelas SET status='1' WHERE kid='$kid'");
	 		$this->session->set_flashdata("alert", "<p class='alert alert-success text-center'><span class='glyphicon glyphicon-ok'></span> Berhasil aktifkan kelas $row->nama_kelas!</p>");
			redirect ('backend/kelas_show', 'refresh');
	 	}else{
	 		$this->session->set_flashdata("alert", "<p class='alert alert-success text-center'><span class='glyphicon glyphicon-ok'></span> Kelas $row->nama_kelas sudah aktif!</p>");
			redirect ('backend/kelas_show', 'refresh');
	 	}
	}

	function TidakAktif($kid)
	{
		$query = $this->m_kelas->get($kid);
	 	$row = $query->row();

	 	if($row->status == '1'){
			$query = $this->db->query("UPDATE tb_kelas SET gid=NULL, status='2' WHERE kid='$kid'");
	 		$this->session->set_flashdata("alert", "<p class='alert alert-danger text-center'><span class='glyphicon glyphicon-remove'></span> Berhasil Non-aktifkan kelas $row->nama_kelas!</p>");
			redirect ('backend/kelas_show', 'refresh');
	 	}else{
	 		$this->session->set_flashdata("alert", "<p class='alert alert-danger text-center'><span class='glyphicon glyphicon-remove'></span> Kelas $row->nama_kelas sudah tidak aktif!</p>");
			redirect ('backend/kelas_show', 'refresh');
	 	}
	}

	function edit_kelas($kid)
	{
		$title = 'Kelas';
		$uid = $this->session->userdata('uid');
		$query = $this->m_kelas->get($kid);
		$data = array(
				'title' => $title,
				'uid' => $uid,
				'row' => $query->row()
			);
		$this->load->view('backend/kelas_edit',$data);
	}

	function edit_kelas_proses($kid)
	{
		$query = $this->m_kelas->get($kid);
		$row = $query->row();
		
		$nama_kelas = $this->input->post('nama_kelas');
		$gid 		= $this->input->post('gid');


        $data = array(
        	'nama_kelas' => $nama_kelas,
        	'gid' => $gid
        );

		$qw = $this->m_kelas->edit($data,$kid);
		if($qw >= 1){
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal mengubah data</p>');
			redirect ('backend/kelas_show', 'refresh');
		}else{
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil mengubah data</p>');
			redirect ('backend/kelas_show', 'refresh');
		}
	}

	function delete_kelas($kid)
	{
		$query = $this->m_kelas->get($kid);
		$row = $query->row();


		$qw = $this->m_kelas->delete($kid);
		if($qw >= 1){
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal menghapus data</p>');
			redirect ('backend/kelas_show', 'refresh');
		}else{
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menghapus data</p>');
			redirect ('backend/kelas_show', 'refresh');
		}
	}

	function detail_kelas($gid,$kid)
	{
		$title = 'Kelas';
		$uid = $this->session->userdata('uid');
		$query = $this->m_kelas->detail($gid,$kid);
		$data = array(
				'title' => $title,
				'uid' => $uid,
				'row' => $query->row()
			);
		$this->load->view('backend/kelas_detail',$data);
	}
}