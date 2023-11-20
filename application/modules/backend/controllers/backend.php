<?php
class Backend extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username') == "") {
			redirect('login/index');
		}
		$this->load->helper('text');
		$this->load->helper('helper');
		$this->load->model('backend/m_user');
		$this->load->model('backend/m_siswa');
		$this->load->model('backend/m_guru');
		$this->load->model('backend/m_kelas');
		$this->load->model('backend/m_pengaturan');
		$this->load->model('backend/m_kategoripelanggaran');
		$this->load->model('backend/m_jenispelanggaran');
		$this->load->model('backend/m_pelanggaran');
		$this->load->model('backend/m_mail');
	}

	function index()
	{
		$title 					= 'Dashboard';
		$uid 					= $this->session->userdata('uid');
		$username 				= $this->session->userdata('username');
		$siswa 					= $this->m_siswa->cek_siswa();
		$guru 					= $this->m_guru->cek_guru();
		$kelas 					= $this->m_kelas->cek_kelas();
		$pengaturan 			= $this->m_pengaturan->cek_pengaturan();
		$kategoripelanggaran 	= $this->m_kategoripelanggaran->cek_kategoripelanggaran();
		$jenispelanggaran 		= $this->m_jenispelanggaran->cek_jenispelanggaran();
		$pelanggaran 			= $this->m_pelanggaran->cek_pelanggaran($uid);
		$mail 					= $this->m_mail->cek_mail();

		$data	= array(
			'title' => $title,
			'uid' => $uid,
			'username' => $username,
			'siswa' => $siswa,
			'guru' => $guru,
			'kelas' => $kelas,
			'pengaturan' => $pengaturan,
			'kategoripelanggaran' => $kategoripelanggaran,
			'jenispelanggaran' => $jenispelanggaran,
			'pelanggaran' => $pelanggaran,
			'mail' => $mail
		);
		$this->load->view('backend/index', $data);
	}

	function user_edit($uid) // guru
	{
		$title = 'Edit Akun';
		$uid = $this->session->userdata('uid');
		$query = $this->m_user->edit_guru($uid);
		$data = array(
			'title' => $title,
			'uid' => $uid,
			'row' => $query->row()
		);

		$this->load->view('backend/user_edit', $data);
	}

	function user_edit_proses($uid) // guru
	{
		// tb_user
		$query = $this->m_user->get($uid);
		$row = $query->row();

		// tb_guru
		$this->db->where('username', $row->username);
		$query2 = $this->db->get('tb_guru');
		$rowGuru = $query2->row();

		$username   	= $this->input->post('username');
		$h_username 	= $this->input->post('h_username');
		$password   	= $this->input->post('password');
		$r_password 	= $this->input->post('r_password');

		$nomor_induk	= $this->input->post('nomor_induk');
		$nama_guru 		= $this->input->post('nama_guru');
		$email 			= $this->input->post('email');

		$config['upload_path'] = './upload/guru/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$this->load->library('upload', $config);

		$dataGuru = array(
			'nomor_induk' => $nomor_induk,
			'nama_guru' => $nama_guru,
			'email' => $email,
		);

		if ($this->upload->do_upload('foto')) {
			if ($rowGuru->foto_guru == '') {
				$image = $this->upload->data();
				$dataGuru['foto_guru'] = $image['file_name'];
			} else {
				unlink("./upload/guru/" . $rowGuru->foto_guru);
				$image = $this->upload->data();
				$dataGuru['foto_guru'] = $image['file_name'];
			}
		}

		if ($password != '' and $r_password != '') {
			if ($password == $r_password) {
				$queryUser = $this->db->query("UPDATE tb_user SET username='$username', password=MD5('$password') WHERE uid='$uid'");
				// user
				$this->db->where('uid', $uid);
				$test = $this->db->get('tb_user');
				$test2 = $test->row();
				$queryGuru = $this->m_guru->editGuru($dataGuru, $test2->username);
				$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil mengubah data</p>');
				redirect('backend/');
			} else {
				$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Password tidak sama, mohon disamakan!</p>');
				redirect('backend/user_edit/' . $row->uid);
			}
		} else {
			$queryUser = $this->db->query("UPDATE tb_user SET username='$username' WHERE uid='$uid'");
			// user
			$this->db->where('uid', $uid);
			$test = $this->db->get('tb_user');
			$test2 = $test->row();
			$queryGuru = $this->m_guru->editGuru($dataGuru, $test2->username);
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil mengubah data</p>');
			redirect('backend/');
		}
	}

	function siswa_edit($uid) // siswa
	{
		$title = 'Edit Akun';
		$uid = $this->session->userdata('uid');
		$query = $this->m_user->edit_siswa($uid);
		$data = array(
			'title' => $title,
			'uid' => $uid,
			'row' => $query->row()
		);
		$this->load->view('backend/user_edit2', $data);
	}

	function siswa_edit_proses($uid) // siswa
	{
		// tb_user
		$query = $this->m_user->get($uid);
		$row = $query->row();

		// tb_siswa
		$this->db->where('username', $row->username);
		$query2 = $this->db->get('tb_siswa');
		$rowSiswa = $query2->row();

		$nama_siswa = $this->input->post('nama_siswa');
		$jk 		= $this->input->post('jk');
		$kid 		= $this->input->post('kid');

		$password   	= $this->input->post('password');
		$r_password 	= $this->input->post('r_password');

		$config['upload_path'] = './upload/siswa/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$this->load->library('upload', $config);

		$dataSiswa = array(
			'nama_siswa' => $nama_siswa,
			'jenis_kelamin' => $jk,
			'kid' => $kid,
		);

		if ($this->upload->do_upload('foto')) {
			if ($rowSiswa->foto_siswa == '') {
				$image = $this->upload->data();
				$dataSiswa['foto_siswa'] = $image['file_name'];
			} else {
				unlink("./upload/guru/" . $rowSiswa->foto_siswa);
				$image = $this->upload->data();
				$dataSiswa['foto_siswa'] = $image['file_name'];
			}
		}

		if ($password != '' and $r_password != '') {
			if ($password == $r_password) {
				$queryUser = $this->db->query("UPDATE tb_user SET password=MD5('$password') WHERE uid='$uid'");
				// user
				$this->db->where('uid', $uid);
				$test = $this->db->get('tb_user');
				$test2 = $test->row();
				$querySiswa = $this->m_siswa->editSiswa($dataSiswa, $test2->username);
				$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil mengubah data</p>');
				redirect('backend/');
			} else {
				$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Password tidak sama, mohon disamakan!</p>');
				redirect('backend/user_edit/' . $row->uid);
			}
		} else {
			$this->db->where('uid', $uid);
			$test = $this->db->get('tb_user');
			$test2 = $test->row();
			$querySiswa = $this->m_siswa->editSiswa($dataSiswa, $test2->username);
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil mengubah data</p>');
			redirect('backend/');
		}
	}


	function guru_show()
	{
		$title = 'Guru';
		$uid = $this->session->userdata('uid');
		$query = $this->m_guru->show();
		$data = array(
			'title' => $title,
			'uid' => $uid,
			'show' => $query
		);
		$this->load->view('backend/guru_show', $data);
	}

	function kelas_show()
	{
		$title = 'Kelas';
		$uid = $this->session->userdata('uid');
		$query = $this->m_kelas->cek_kelas();
		$data = array(
			'title' => $title,
			'uid' => $uid,
			'show' => $query->result()
		);
		$this->load->view('backend/kelas_show', $data);
	}

	function siswa_show()
	{
		$title = 'Siswa';
		$uid = $this->session->userdata('uid');
		$query = $this->m_siswa->show();
		$data = array(
			'title' => $title,
			'uid' => $uid,
			'show' => $query
		);
		$this->load->view('backend/siswa_show', $data);
	}

	function kategoripelanggaran_show()
	{
		$title = 'Kategori Pelanggaran';
		$uid = $this->session->userdata('uid');
		$query = $this->m_kategoripelanggaran->show();
		$data = array(
			'title' => $title,
			'uid' => $uid,
			'show' => $query
		);
		$this->load->view('backend/kategoripelanggaran_show', $data);
	}

	function jenispelanggaran_show()
	{
		$title = 'Jenis Pelanggaran';
		$uid = $this->session->userdata('uid');
		$query = $this->m_jenispelanggaran->show();
		$data = array(
			'title' => $title,
			'uid' => $uid,
			'show' => $query
		);
		$this->load->view('backend/jenispelanggaran_show', $data);
	}

	function pelanggaran_show()
	{
		$title = 'Pelanggaran';
		$uid = $this->session->userdata('uid');
		$query = $this->m_pelanggaran->show($uid);
		$data = array(
			'title' => $title,
			'uid' => $uid,
			'show' => $query
		);
		$this->load->view('backend/pelanggaran_show', $data);
	}

	function pengaturan_show()
	{
		$title = 'Pengaturan';
		$uid = $this->session->userdata('uid');
		$query = $this->m_pengaturan->show();
		$data = array(
			'title' => $title,
			'uid' => $uid,
			'show' => $query
		);
		$this->load->view('backend/pengaturan_show', $data);
	}

	function mail_show()
	{
		$title = 'Mail';
		$uid = $this->session->userdata('uid');
		$query = $this->m_mail->show();
		$data = array(
			'title' => $title,
			'uid' => $uid,
			'show' => $query
		);
		$this->load->view('backend/mail_show', $data);
	}
}
