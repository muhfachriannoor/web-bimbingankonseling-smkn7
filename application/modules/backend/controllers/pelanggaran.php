<?php
class Pelanggaran extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") 
        {
			redirect('login/index');
		}
		$this->load->model('backend/m_pelanggaran');
	}

	function input_pelanggaran()
	{
		$title = 'Pelanggaran';
		$uid = $this->session->userdata('uid');
		$data = array(
				'title' => $title,
				'uid' => $uid,
			);
		$this->load->view('backend/pelanggaran_add',$data);
	}

	function datasiswa($kelas)
	{
		$query 	= $this->db->query("SELECT * FROM tb_siswa WHERE kid='$kelas'");
			echo "<option value='-' disabled='disabled' hidden='hidden' selected='selected'>-- PILIH SISWA --</option>";
		foreach($query->result() as $data)
		{
			echo "<option value='$data->sid'>$data->nama_siswa</option>";
		}
	}

	function datajenispelanggaran($kategori){
		$query 	= $this->db->query("SELECT * FROM tb_jenis_pelanggaran WHERE kpid='$kategori'");
			echo "<option value='-' disabled='disabled' hidden='hidden' selected='selected'>-- PILIH JENIS PELANGGARAN --</option>";
		foreach($query->result() as $data)
		{
			echo "<option value='$data->jid'>$data->jenis_pelanggaran</option>";
		}
	}

	function input_pelanggaran_proses()
	{
		$jid 		= $this->input->post('jid');
		$sid 		= $this->input->post('sid');
		$uid 		= $this->session->userdata('uid');
		$tanggal 	= date('Y-m-d');
		$keterangan = $this->input->post('keterangan');

		$config['upload_path'] = './upload/pelanggaran/';
		$config['allowed_types'] = 'gif|jpg|png'; //type yang dapat diakses bisa anda sesuaikan

        $this->load->library('upload',$config);

        $data = array(
        	'jid' => $jid,
        	'sid' => $sid,
        	'uid' => $uid,
        	'waktu_pelanggaran' => $tanggal,
        	'keterangan' => $keterangan,
        	'status' => '2'
        );

		if (!$this->upload->do_upload('foto')){
			$data['foto_pelanggaran'] = '';
		}else{
			$image = $this->upload->data();
			$data['foto_pelanggaran'] = $image['file_name'];
		}
		$query = $this->m_pelanggaran->insert($data);

		if($query >= 1){
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal menambahkan data</h4>');
			redirect ('backend/pelanggaran_show', 'refresh');
		}else{
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menambahkan data</h4>');
			redirect ('backend/pelanggaran_show', 'refresh');
		}
	}

	function Selesai($pid)
	{
		$query = $this->m_pelanggaran->get($pid);
	 	$row = $query->row();

	 	if($row->status == '2'){
			$query = $this->db->query("UPDATE tb_pelanggaran SET status='1' WHERE pid='$pid'");
	 		$this->session->set_flashdata("alert", "<p class='alert alert-success text-center'><span class='glyphicon glyphicon-ok'></span> Berhasil selesaikan pelanggaran siswa $row->nama_siswa</p>");
			redirect ('backend/pelanggaran_show', 'refresh');
	 	}else{
	 		$this->session->set_flashdata("alert", "<p class='alert alert-success text-center'><span class='glyphicon glyphicon-ok'></span> Pelanggaran siswa $row->nama_siswa sudah selesai!</p>");
			redirect ('backend/pelanggaran_show', 'refresh');
	 	}
	}

	function TidakSelesai($pid)
	{
		$query = $this->m_pelanggaran->get($pid);
	 	$row = $query->row();

	 	if($row->status == '1'){
			$query = $this->db->query("UPDATE tb_pelanggaran SET status='2' WHERE pid='$pid'");
	 		$this->session->set_flashdata("alert", "<p class='alert alert-danger text-center'><span class='glyphicon glyphicon-remove'></span> Berhasil belum terselesaikan pelanggaran siswa $row->nama_siswa!</p>");
			redirect ('backend/pelanggaran_show', 'refresh');
	 	}else{
	 		$this->session->set_flashdata("alert", "<p class='alert alert-danger text-center'><span class='glyphicon glyphicon-remove'></span> Pelanggaran siswa $row->nama_siswa belum terselesaikan!</p>");
			redirect ('backend/pelanggaran_show', 'refresh');
	 	}
	}

	function edit_pelanggaran($pid)
	{
		$title = 'Pelanggaran';
		$uid = $this->session->userdata('uid');
		$query = $this->m_pelanggaran->get($pid);	
		$data = array(
				'title' => $title,
				'uid' => $uid,
				'data' => $query->row()
			);
		$this->load->view('backend/pelanggaran_edit',$data);
	}

	function edit_pelanggaran_proses($pid)
	{
		$query = $this->m_pelanggaran->get($pid);
		$row = $query->row();
		
		$jid 		= $this->input->post('jid');
		$sid 		= $this->input->post('sid');
		$uid 		= $this->session->userdata('uid');
		$tanggal 	= date('Y-m-d');
		$keterangan = $this->input->post('keterangan');

		$config['upload_path'] = './upload/pelanggaran/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan

        $this->load->library('upload',$config);

        $data = array(
        	'jid' => $jid,
        	'sid' => $sid,
        	'uid' => $uid,
        	'waktu_pelanggaran' => $tanggal,
        	'keterangan' => $keterangan,
        	'status' => '2'
        );

        if($this->upload->do_upload('foto')){
        	if($row->foto_pelanggaran == ''){
        		$image = $this->upload->data();
				$data['foto_pelanggaran'] = $image['file_name'];
        	}else{
        		unlink("./upload/pelanggaran/".$row->foto_pelanggaran);
				$image = $this->upload->data();
				$data['foto_pelanggaran'] = $image['file_name'];
        	}	
        }
		$qw = $this->m_pelanggaran->edit($data,$pid);
		if($qw >= 1){
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal mengubah data</h4>');
			redirect ('backend/pelanggaran_show', 'refresh');
		}else{
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil mengubah data</h4>');
			redirect ('backend/pelanggaran_show', 'refresh');
		}
	}

	function delete_pelanggaran($pid)
	{
		$query = $this->m_pelanggaran->get($pid);
		$row = $query->row();

		if($row->foto_pelanggaran == ''){
        	$qw = $this->m_pelanggaran->delete($pid);
        	$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menghapus data</h4>');
			redirect ('backend/pelanggaran_show', 'refresh');
        }else{
        	unlink("./upload/pelanggaran/$row->foto_pelanggaran");
        	$qw = $this->m_pelanggaran->delete($pid);
        	$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menghapus data</h4>');
			redirect ('backend/pelanggaran_show', 'refresh');
        }	
	}

	function detail_pelanggaran($pid)
	{
		$title = 'Pelanggaran';
		$uid = $this->session->userdata('uid');
		$query = $this->m_pelanggaran->detail($pid);
		$data = array(
				'title' => $title,
				'uid' => $uid,
				'row' => $query->row()
			);
		$this->load->view('backend/pelanggaran_detail',$data);
	}

	function pdf()
	{
		$title = 'Pelanggaran';
		$uid = $this->session->userdata('uid');
		$data = array(
				'title' => $title,
				'uid' => $uid,
			);
		$this->load->view('backend/pelanggaran_pdf_add',$data);
	}
}