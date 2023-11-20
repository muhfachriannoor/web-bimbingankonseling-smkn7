<?php
class Guru extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username') == "") {
			redirect('login/index');
		}
		$this->load->model('backend/m_user');
		$this->load->model('backend/m_guru');
	}

	function input_guru()
	{
		$title = 'Guru';
		$uid = $this->session->userdata('uid');
		$data = array(
			'title' => $title,
			'uid' => $uid,
		);
		$this->load->view('backend/guru_add', $data);
	}

	function input_guru_proses()
	{
		$nomor_induk 	= $this->input->post('nomor_induk');
		$nama_guru 		= $this->input->post('nama_guru');
		$email 			= $this->input->post('email');

		$username 		= $this->input->post('username');
		$password 		= md5($this->input->post('password'));
		$r_password 	= md5($this->input->post('r_password'));
		$level 			= $this->input->post('level');

		$dataGuru = array(
			'nomor_induk' => $nomor_induk,
			'nama_guru' => $nama_guru,
			'email' => $email,
			'username' => $username,
		);

		$dataUser = array(
			'username' => $username,
			'password' => $password,
			'level' => $level,
			'status_user' => '2'
		);

		$cek = $this->db->where('username', $username)
			->get('tb_user');
		if ($cek->num_rows() == 0 and $password == $r_password) {
			$config['upload_path'] = './upload/guru/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto')) {
				$dataGuru['foto_guru'] = '';
			} else {
				$image = $this->upload->data();
				$dataGuru['foto_guru'] = $image['file_name'];
			}

			$queryUser = $this->m_guru->insertUser($dataUser);
			$queryGuru = $this->m_guru->insertGuru($dataGuru);

			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menambahkan data</p>');
			redirect('backend/guru_show', 'refresh');
		} elseif ($cek->num_rows() != 0 and $password != $r_password) {
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Username yang anda inputkan sudah terpakai & Password tidak sama, mohon disamakan!</p>');
			redirect('backend/guru/input_guru', 'refresh');
		} elseif ($cek->num_rows() != 0) {
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Username yang anda inputkan sudah terpakai!</p>');
			redirect('backend/guru/input_guru', 'refresh');
		} elseif ($password != $r_password) {
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Password tidak sama, mohon disamakan!</p>');
			redirect('backend/guru/input_guru', 'refresh');
		}
	}

	function import()
	{
		$title = 'Guru';
		$uid = $this->session->userdata('uid');
		$data = array(
			'title' => $title,
			'uid' => $uid,
		);
		$this->load->view('backend/guru_import_add', $data);
	}

	function import_proses()
	{
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");
		$c = 0;
		while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
			$c++;
			if ($c > 1) {
				$username 		= $filesop[0];
				$password 		= $filesop[1];
				$nomor_induk	= $filesop[2];
				$nama_guru 		= $filesop[3];
				$email 			= $filesop[4];
				$foto_guru 		= $filesop[5];
				$hak_akses 		= $filesop[6];

				$sql = $this->db->query("INSERT INTO tb_user (username,password,level,status_user) VALUES ('$username',MD5('$password'),'$hak_akses','2')");
				$sql = $this->db->query("INSERT INTO tb_guru (nomor_induk,nama_guru,email,foto_guru,username) VALUES ('$nomor_induk','$nama_guru','$email','$foto_guru','$username')");
			}
		}
		$config['upload_path'] = './upload/guru/';
		$config['allowed_types'] = 'zip'; //type yang dapat diakses bisa anda sesuaikan

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file_foto')) {
			echo $this->upload->display_errors();
			exit;
		} else {
			$data_foto = $this->upload->data();
			$foto = $data_foto['file_name'];
		}

		$zip = new ZipArchive;
		$res = $zip->open('./upload/guru/' . $foto);

		if ($res === TRUE) {
			$zip->extractTo('./upload/guru/');
			$zip->close();
			unlink("./upload/guru/" . $foto);
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil import data</h4>');
			redirect('backend/guru_show', 'refresh');
		} else {
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal import data</h4>');
			redirect('backend/guru_show', 'refresh');
		}
	}

	function Aktif($id)
	{
		$query = $this->m_user->get($id);
		$row = $query->row();

		if ($row->status_user == '2') {
			$query = $this->db->query("UPDATE tb_user SET status_user='1' WHERE uid='$id'");
			$this->session->set_flashdata("alert", "<p class='alert alert-success text-center'><span class='glyphicon glyphicon-ok'></span> Berhasil aktifkan akun $row->username!</p>");
			redirect('backend/guru_show', 'refresh');
		} else {
			$this->session->set_flashdata("alert", "<p class='alert alert-success text-center'><span class='glyphicon glyphicon-ok'></span> Akun $row->username sudah aktif!</p>");
			redirect('backend/guru_show', 'refresh');
		}
	}

	function TidakAktif($id)
	{
		$query = $this->m_user->get($id);
		$row = $query->row();

		if ($row->status_user == '1') {
			$query = $this->db->query("UPDATE tb_user SET status_user='2' WHERE uid='$id'");
			$this->session->set_flashdata("alert", "<p class='alert alert-danger text-center'><span class='glyphicon glyphicon-remove'></span> Berhasil Non-aktifkan akun $row->username!</p>");
			redirect('backend/guru_show', 'refresh');
		} else {
			$this->session->set_flashdata("alert", "<p class='alert alert-danger text-center'><span class='glyphicon glyphicon-remove'></span> Akun $row->username sudah tidak aktif!</p>");
			redirect('backend/guru_show', 'refresh');
		}
	}

	function edit_guru($gid)
	{
		$title = 'Guru';
		$uid = $this->session->userdata('uid');
		$query = $this->m_guru->get($gid);
		$data = array(
			'title' => $title,
			'uid' => $uid,
			'row' => $query->row()
		);
		$this->load->view('backend/guru_edit', $data);
	}

	function edit_guru_proses($uid)
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
		$level 			= $this->input->post('level');

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
				$queryUser = $this->db->query("UPDATE tb_user SET username='$username', password=MD5('$password'), level='$level' WHERE uid='$uid'");
				// user
				$this->db->where('uid', $uid);
				$test = $this->db->get('tb_user');
				$test2 = $test->row();
				$queryGuru = $this->m_guru->editGuru($dataGuru, $test2->username);
				$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil mengubah data</p>');
				redirect('backend/guru_show', 'refresh');
			} else {
				$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Password tidak sama, mohon disamakan!</p>');
				redirect('backend/guru/edit_guru/' . $uid);
			}
		} else {
			$queryUser = $this->db->query("UPDATE tb_user SET username='$username', level='$level' WHERE uid='$uid'");
			// user
			$this->db->where('uid', $uid);
			$test = $this->db->get('tb_user');
			$test2 = $test->row();
			$queryGuru = $this->m_guru->editGuru($dataGuru, $test2->username);
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil mengubah data</p>');
			redirect('backend/guru_show', 'refresh');
		}
	}

	function delete_guru($username)
	{
		$queryGuru = $this->m_guru->getGuru($username);
		$queryUser = $this->m_guru->getUser($username);

		$rowGuru = $queryGuru->row();
		$rowUser = $queryUser->row();

		if ($rowGuru->foto_guru == '') {
			$qwGuru = $this->m_guru->deleteGuru($username);
			$qwUser = $this->m_guru->deleteUser($username);
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menghapus data</p>');
			redirect('backend/guru_show', 'refresh');
		} else {
			unlink("./upload/guru/$rowGuru->foto_guru");
			$qwGuru = $this->m_guru->deleteGuru($username);
			$qwUser = $this->m_guru->deleteUser($username);
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menghapus data</p>');
			redirect('backend/guru_show', 'refresh');
		}
	}

	function detail_guru($gid)
	{
		$title = 'Guru';
		$uid = $this->session->userdata('uid');
		$query = $this->m_guru->detail($gid);
		$data = array(
			'title' => $title,
			'uid' => $uid,
			'row' => $query->row()
		);
		$this->load->view('backend/guru_detail', $data);
	}

	function download()
	{
		$this->load->helper('download');
		$name = 'contoh_guru.csv';
		$name2 = 'contoh_guru_foto.zip';
		force_download($name, NULL);
	}
}
