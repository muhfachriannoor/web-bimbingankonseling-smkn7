<?php
class Mail extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username') == "") {
			redirect('login/index');
		}
		$this->load->model('backend/m_mail');
	}

	function input_mail()
	{
		$title = 'Mail';
		$uid = $this->session->userdata('uid');
		$data = array(
			'title' => $title,
			'uid' => $uid,
		);
		$this->load->view('backend/mail_add', $data);
	}

	public function datakelas()
	{
		$kode = $this->input->post('kode_id', TRUE);
		$query = $this->db->query("SELECT tb_guru.nama_guru, tb_guru.email, tb_kelas.* FROM tb_kelas INNER JOIN tb_guru ON tb_kelas.gid = tb_guru.gid WHERE tb_kelas.kid = '$kode'")->row();


		$kelas = array(
			'nama_guru' => '<input type="text" name="nama_guru" class="form-control" value="' . $query->nama_guru . '" readonly>',
			'email' => '<input type="email" name="email" class="form-control" value="' . $query->email . '" readonly>'
		);

		echo json_encode($kelas);
	}

	function input_mail_proses()
	{
		$kid 		= $this->input->post('kid');
		$subjek 	= $this->input->post('subjek');
		$isi 		= $this->input->post('isi');
		$waktu_mail	= date('Y-m-d');

		$config['upload_path'] = './upload/mail/';
		$config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|xls|xlsx';
		$this->load->library('upload', $config);

		$data = array(
			'kid' => $kid,
			'subjek' => $subjek,
			'isi' => $isi,
			'waktu_mail' => $waktu_mail,
			'status' => '2'
		);

		if (!$this->upload->do_upload('file')) {
			echo $this->upload->display_errors();
			exit;
		} else {
			$image = $this->upload->data();
			$data['nama_file'] = $image['file_name'];
		}
		$query = $this->m_mail->insert($data);

		if ($query >= 1) {
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal menambahkan data</h4>');
			redirect('backend/mail_show', 'refresh');
		} else {
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menambahkan data</h4>');
			redirect('backend/mail_show', 'refresh');
		}
	}

	function Kirim($mid)
	{
		$query = $this->m_mail->getedit($mid);
		$row = $query->row();

		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'fachrimarquez93@gmail.com',    // Ganti dengan email gmail kamu
			'smtp_pass' => 'fachri10',      // Password gmail kamu
			'smtp_port' => 465,
			'crlf'      => "\r\n",
			'newline'   => "\r\n"
		];

		// Load library email dan konfigurasinya
		$this->load->library('email', $config);

		// Email dan nama pengirim
		$this->email->from('fachrimarquez93@gmail.com', 'Administrator');

		// Email penerima
		$this->email->to($row->email); // Ganti dengan email tujuan kamu

		// Lampiran email, isi dengan url/path file
		$this->email->attach("upload/mail/" . $row->nama_file);

		// Subject email
		$this->email->subject($row->subjek);

		// Isi email
		$this->email->message($row->isi);

		// Tampilkan pesan sukses atau error
		if ($this->email->send()) {
			$query = $this->db->query("UPDATE tb_mail SET status='1' WHERE mid='$mid'");
			$this->session->set_flashdata("alert", "<p class='alert alert-success text-center'><span class='glyphicon glyphicon-ok'></span> Berhasil kirim email ke $row->email</p>");
			redirect('backend/mail_show', 'refresh');
		} else {
			$this->session->set_flashdata("alert", "<p class='alert alert-danger text-center'><span class='glyphicon glyphicon-remove'></span> Gagal kirim email ke $row->email</p>");
			redirect('backend/mail_show', 'refresh');
		}
	}

	function edit_mail($mid)
	{
		$title = 'Mail';
		$uid = $this->session->userdata('uid');
		$query = $this->m_mail->getedit($mid);
		$data = array(
			'title' => $title,
			'uid' => $uid,
			'data' => $query->row()
		);
		$this->load->view('backend/mail_edit', $data);
	}

	function edit_mail_proses($mid)
	{
		$query = $this->m_mail->get($mid);
		$row = $query->row();

		$kid 		= $this->input->post('kid');
		$subjek 	= $this->input->post('subjek');
		$isi 		= $this->input->post('isi');
		$waktu_mail	= date('Y-m-d');

		$config['upload_path'] = './upload/mail/';
		$config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|xls|xlsx';

		$this->load->library('upload', $config);

		$data = array(
			'kid' => $kid,
			'subjek' => $subjek,
			'isi' => $isi,
			'waktu_mail' => $waktu_mail,
			'status' => '2'
		);

		if ($this->upload->do_upload('file')) {
			unlink("./upload/mail/" . $row->nama_file);
			$image = $this->upload->data();
			$data['nama_file'] = $image['file_name'];
		}

		$qw = $this->m_mail->edit($data, $mid);
		if ($qw >= 1) {
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal mengubah data</h4>');
			redirect('backend/mail_show', 'refresh');
		} else {
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil mengubah data</h4>');
			redirect('backend/mail_show', 'refresh');
		}
	}

	function delete_mail($mid)
	{
		$query = $this->m_mail->get($mid);
		$row = $query->row();

		unlink("./upload/mail/$row->nama_file");
		$qw = $this->m_mail->delete($mid);
		$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menghapus data</h4>');
		redirect('backend/mail_show', 'refresh');
	}

	function detail_mail($mid)
	{
		$title = 'Mail';
		$uid = $this->session->userdata('uid');
		$query = $this->m_mail->detail($mid);
		$data = array(
			'title' => $title,
			'uid' => $uid,
			'row' => $query->row()
		);
		$this->load->view('backend/mail_detail', $data);
	}
}
