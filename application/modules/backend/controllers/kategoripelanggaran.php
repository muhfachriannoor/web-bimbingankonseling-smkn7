
<?php
class Kategoripelanggaran extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") 
        {
			redirect('login/index');
		}
		$this->load->model('backend/m_kategoripelanggaran');
	}

	function input_kategoripelanggaran()
	{
		$title = 'Kategori Pelanggaran';
		$uid = $this->session->userdata('uid');
		$data = array(
				'title' => $title,
				'uid' => $uid,
			);
		$this->load->view('backend/kategoripelanggaran_add',$data);
	}

	function input_kategoripelanggaran_proses()
	{
		$nama_kategori = $this->input->post('nama_kategori');

        $data = array(
        	'nama_kategori' => $nama_kategori
        );

		$query = $this->m_kategoripelanggaran->insert($data);

		if($query >= 1){
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal menambahkan data</p>');
			redirect ('backend/kategoripelanggaran_show', 'refresh');
		}else{
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menambahkan data</p>');
			redirect ('backend/kategoripelanggaran_show', 'refresh');
		}
	}

	function edit_kategoripelanggaran($kpid)
	{
		$title = 'Kategori Pelanggaran';
		$uid = $this->session->userdata('uid');
		$query = $this->m_kategoripelanggaran->get($kpid);
		$data = array(
				'title' => $title,
				'uid' => $uid,
				'row' => $query->row()
			);
		$this->load->view('backend/kategoripelanggaran_edit',$data);
	}

	function edit_kategoripelanggaran_proses($kpid)
	{
		$query = $this->m_kategoripelanggaran->get($kpid);
		$row = $query->row();
		
		$nama_kategori = $this->input->post('nama_kategori');

        $data = array(
        	'nama_kategori' => $nama_kategori
        );

		$qw = $this->m_kategoripelanggaran->edit($data,$kpid);
		if($qw >= 1){
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal mengubah data</p>');
			redirect ('backend/kategoripelanggaran_show', 'refresh');
		}else{
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil mengubah data</p>');
			redirect ('backend/kategoripelanggaran_show', 'refresh');
		}
	}

	function delete_kategoripelanggaran($kpid)
	{
		$query = $this->m_kategoripelanggaran->get($kpid);
		$row = $query->row();

		$qw = $this->m_kategoripelanggaran->delete($kpid);
		if($qw >= 1){
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal menghapus data</p>');
			redirect ('backend/kategoripelanggaran_show', 'refresh');
		}else{
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menghapus data</p>');
			redirect ('backend/kategoripelanggaran_show', 'refresh');
		}
	}
}