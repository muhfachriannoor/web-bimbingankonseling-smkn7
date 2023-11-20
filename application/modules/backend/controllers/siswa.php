<?php
class Siswa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username') == "") {
			redirect('login/index');
		}
		$this->load->model('backend/m_siswa');
		$this->load->model('backend/m_user');
	}

	function input_siswa()
	{
		$title = 'Siswa';
		$uid = $this->session->userdata('uid');
		$data = array(
			'title' => $title,
			'uid' => $uid,
		);
		$this->load->view('backend/siswa_add', $data);
	}

	function input_siswa_proses()
	{
		// tb_siswa
		$nisn 		= $this->input->post('nisn');
		$nama_siswa = $this->input->post('nama_siswa');
		$jk 		= $this->input->post('jk');
		$kid 		= $this->input->post('kid');

		$dataSiswa = array(
			'nisn' => $nisn,
			'nama_siswa' => $nama_siswa,
			'jenis_kelamin' => $jk,
			'kid' => $kid,
			'username' => $nisn
		);

		$cek = $this->db->where('nisn', $nisn)
			->get('tb_siswa');
		if ($cek->num_rows() == 0) {
			$config['upload_path'] = './upload/siswa/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto')) {
				$dataSiswa['foto_siswa'] = '';
			} else {
				$image = $this->upload->data();
				$dataSiswa['foto_siswa'] = $image['file_name'];
			}

			$querySiswa = $this->m_siswa->insertSiswa($dataSiswa);

			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menambahkan data</p>');
			redirect('backend/siswa_show', 'refresh');
		} elseif ($cek->num_rows() != 0) {
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> NISN yang anda inputkan sudah terpakai!</p>');
			redirect('backend/siswa/input_siswa', 'refresh');
		}
	}

	function import()
	{
		$title = 'Siswa';
		$uid = $this->session->userdata('uid');
		$data = array(
			'title' => $title,
			'uid' => $uid,
		);
		$this->load->view('backend/siswa_import_add', $data);
	}

	function import_proses()
	{
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");
		$c = 0;
		while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
			$c++;
			if ($c > 1) {
				$nisn 			= $filesop[0];
				$nama_siswa 	= $filesop[1];
				$jenis_kelamin 	= $filesop[2];
				$foto_siswa 	= $filesop[3];

				$kelas = $this->input->post('kid');

				$dataSiswa = array(
					'nisn' => $nisn,
					'nama_siswa' => $nama_siswa,
					'jenis_kelamin' => $jenis_kelamin,
					'kid' => $kelas,
					'foto_siswa' => $foto_siswa,
					'username' => $nisn
				);
				$querySiswa = $this->m_siswa->insertSiswa($dataSiswa);
			}
		}
		$config['upload_path'] = './upload/siswa/';
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
		$res = $zip->open('./upload/siswa/' . $foto);

		if ($res === TRUE) {
			$zip->extractTo('./upload/siswa/');
			$zip->close();
			unlink("./upload/siswa/" . $foto);
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil import data</h4>');
			redirect('backend/siswa_show', 'refresh');
		} else {
			$this->session->set_flashdata('alert', '<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-remove"></span> Gagal import data</h4>');
			redirect('backend/siswa_show', 'refresh');
		}
	}

	function edit_siswa($sid)
	{
		$title = 'Siswa';
		$uid = $this->session->userdata('uid');
		$query = $this->m_siswa->getSiswa($sid);
		$data = array(
			'title' => $title,
			'uid' => $uid,
			'row' => $query->row()
		);
		$this->load->view('backend/siswa_edit', $data);
	}

	function edit_siswa_proses($sid)
	{

		$query2 = $this->db->get('tb_siswa');
		$rowSiswa = $query2->row();

		$nama_siswa = $this->input->post('nama_siswa');
		$jk 		= $this->input->post('jk');
		$kid 		= $this->input->post('kid');

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

		$querySiswa = $this->m_siswa->editSiswa($dataSiswa, $sid);
		$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil mengubah data</h4>');
		redirect('backend/siswa_show', 'refresh');
	}

	function delete_siswa($sid)
	{
		$query = $this->m_siswa->getSiswa($sid);
		$row = $query->row();

		if ($row->foto_siswa == '') {
			$qw = $this->m_siswa->deleteSiswa($sid);
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menghapus data</h4>');
			redirect('backend/siswa_show', 'refresh');
		} else {
			unlink("./upload/siswa/$row->foto_siswa");
			$qw = $this->m_siswa->deleteSiswa($sid);
			$this->session->set_flashdata('alert', '<p class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span> Berhasil menghapus data</h4>');
			redirect('backend/siswa_show', 'refresh');
		}
	}

	function detail_siswa($sid)
	{
		$title = 'Siswa';
		$uid = $this->session->userdata('uid');
		$query = $this->m_siswa->detail($sid);
		$data = array(
			'title' => $title,
			'uid' => $uid,
			'row' => $query->row()
		);
		$this->load->view('backend/siswa_detail', $data);
	}

	function download()
	{
		$this->load->helper('download');
		$name = 'contoh_siswa.csv';
		force_download($name, NULL);
	}
}
