<?php
class Jenispelanggaran extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") 
        {
			redirect('login/index');
		}
		$this->load->model('backend/m_jenispelanggaran');
	}

	function input_jenispelanggaran()
	{
		$title = 'Jenis Pelanggaran';
		$uid = $this->session->userdata('uid');
		$data = array(
				'title' => $title,
				'uid' => $uid,
			);
		$this->load->view('backend/jenispelanggaran_add',$data);
	}

	function input_jenispelanggaran_proses()
	{
		$kpid = $this->input->post('kpid');
		$jenis_pelanggaran = $this->input->post('jenis_pelanggaran');

        $data = array(
        	'kpid' => $kpid, 
        	'jenis_pelanggaran' => $jenis_pelanggaran
        );

		$query = $this->m_jenispelanggaran->insert($data);

		if($query >= 1){
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal menambahkan data</p>');
			redirect ('backend/jenispelanggaran_show', 'refresh');
		}else{
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menambahkan data</p>');
			redirect ('backend/jenispelanggaran_show', 'refresh');
		}
	}

	function edit_jenispelanggaran($jid)
	{
		$title = 'Jenis Pelanggaran';
		$uid = $this->session->userdata('uid');
		$query = $this->m_jenispelanggaran->get($jid);
		$data = array(
				'title' => $title,
				'uid' => $uid,
				'row' => $query->row()
			);
		$this->load->view('backend/jenispelanggaran_edit',$data);
	}

	function edit_jenispelanggaran_proses($jid)
	{
		$query = $this->m_jenispelanggaran->get($jid);
		$row = $query->row();
		
		$kpid = $this->input->post('kpid');
		$jenis_pelanggaran = $this->input->post('jenis_pelanggaran');

        $data = array(
        	'kpid' => $kpid, 
        	'jenis_pelanggaran' => $jenis_pelanggaran
        );

		$qw = $this->m_jenispelanggaran->edit($data,$jid);
		if($qw >= 1){
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal mengubah data</p>');
			redirect ('backend/jenispelanggaran_show', 'refresh');
		}else{
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil mengubah data</p>');
			redirect ('backend/jenispelanggaran_show', 'refresh');
		}
	}

	function delete_jenispelanggaran($jid)
	{
		$query = $this->m_jenispelanggaran->get($jid);
		$row = $query->row();

		$qw = $this->m_jenispelanggaran->delete($jid);
		if($qw >= 1){
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal menghapus data</p>');
			redirect ('backend/jenispelanggaran_show', 'refresh');
		}else{
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menghapus data</p>');
			redirect ('backend/jenispelanggaran_show', 'refresh');
		}
	}
}