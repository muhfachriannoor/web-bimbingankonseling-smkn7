<?php
class Pengaturan extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") 
        {
			redirect('login/index');
		}
		$this->load->model('backend/m_pengaturan');
	}

	function input_pengaturan()
	{
		$title = 'Pengaturan';
		$uid = $this->session->userdata('uid');
		$data = array(
				'title' => $title,
				'uid' => $uid,
			);
		$this->load->view('backend/pengaturan_add',$data);
	}

	function input_pengaturan_proses()
	{
		$nama_pengaturan = $this->input->post('nama_pengaturan');
		$isi 			 = $this->input->post('isi');
		$waktu_ubah		 = date('Y-m-d');

        $data = array(
        	'nama_pengaturan' => $nama_pengaturan,
        	'isi' => $isi,
        	'waktu_ubah' => $waktu_ubah,
        	'status' => '2'
        );

		$query = $this->m_pengaturan->insert($data);

		if($query >= 1){
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal menambahkan data</p>');
			redirect ('backend/pengaturan_show', 'refresh');
		}else{
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menambahkan data</p>');
			redirect ('backend/pengaturan_show', 'refresh');
		}
	}

	function Aktif($peid)
	{
		$query = $this->m_pengaturan->get($peid);
	 	$row = $query->row();

	 	if($row->status == '2'){
			$query = $this->db->query("UPDATE tb_pengaturan SET status='1' WHERE peid='$peid'");
	 		$this->session->set_flashdata("alert", "<p class='alert alert-success text-center'><span class='glyphicon glyphicon-ok'></span> Berhasil aktifkan pengaturan $row->nama_pengaturan!</p>");
			redirect ('backend/pengaturan_show', 'refresh');
	 	}else{
	 		$this->session->set_flashdata("alert", "<p class='alert alert-success text-center'><span class='glyphicon glyphicon-ok'></span> Pengaturan $row->nama_pengaturan sudah aktif!</p>");
			redirect ('backend/pengaturan_show', 'refresh');
	 	}
	}

	function TidakAktif($peid)
	{
		$query = $this->m_pengaturan->get($peid);
	 	$row = $query->row();

	 	if($row->status == '1'){
			$query = $this->db->query("UPDATE tb_pengaturan SET status='2' WHERE peid='$peid'");
	 		$this->session->set_flashdata("alert", "<p class='alert alert-danger text-center'><span class='glyphicon glyphicon-remove'></span> Berhasil Non-aktifkan pengaturan $row->nama_pengaturan!</p>");
			redirect ('backend/pengaturan_show', 'refresh');
	 	}else{
	 		$this->session->set_flashdata("alert", "<p class='alert alert-danger text-center'><span class='glyphicon glyphicon-remove'></span> Pengaturan $row->nama_pengaturan sudah tidak aktif!</p>");
			redirect ('backend/pengaturan_show', 'refresh');
	 	}
	}

	function edit_pengaturan($peid)
	{
		$title = 'Pengaturan';
		$uid = $this->session->userdata('uid');
		$query = $this->m_pengaturan->get($peid);
		$data = array(
				'title' => $title,
				'uid' => $uid,
				'row' => $query->row()
			);
		$this->load->view('backend/pengaturan_edit',$data);
	}

	function edit_pengaturan_proses($peid)
	{
		$query = $this->m_pengaturan->get($peid);
		$row = $query->row();
		
		$nama_pengaturan = $this->input->post('nama_pengaturan');
		$isi 			 = $this->input->post('isi');
		$waktu_ubah		 = date('Y-m-d');

        $data = array(
        	'nama_pengaturan' => $nama_pengaturan,
        	'isi' => $isi,
        	'waktu_ubah' => $waktu_ubah
        );

		$qw = $this->m_pengaturan->edit($data,$peid);
		if($qw >= 1){
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal mengubah data</p>');
			redirect ('backend/pengaturan_show', 'refresh');
		}else{
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil mengubah data</p>');
			redirect ('backend/pengaturan_show', 'refresh');
		}
	}

	function delete_pengaturan($peid)
	{
		$query = $this->m_pengaturan->get($peid);
		$row = $query->row();

		$qw = $this->m_pengaturan->delete($peid);
		if($qw >= 1){
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal menghapus data</p>');
			redirect ('backend/pengaturan_show', 'refresh');
		}else{
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menghapus data</p>');
			redirect ('backend/pengaturan_show', 'refresh');
		}
	}

	function detail_pengaturan($peid)
	{
		$title = 'Pelanggaran';
		$uid = $this->session->userdata('uid');
		$query = $this->m_pengaturan->detail($peid);
		$data = array(
				'title' => $title,
				'uid' => $uid,
				'row' => $query->row()
			);
		$this->load->view('backend/pengaturan_detail',$data);
	}
}