<?php
class Pdfpelanggaran extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('backend/m_pelanggaran');
		$this->load->library('pdf');
	}

	function index()
	{
		$kelas 			= $this->input->post('kelas');
		$dari_tanggal 	= $this->input->post('dari_tanggal');
		$sampai_tanggal	= $this->input->post('sampai_tanggal');

		$tampil_data 	= $this->m_pelanggaran->pdf($kelas,$dari_tanggal,$sampai_tanggal);
		$kelas1 		= $this->m_pelanggaran->kelas($kelas)->row();
		$data	= array(
				'data' => $tampil_data,
				'sampai_tanggal' => $sampai_tanggal,
				'kelasnya' => $kelas1
			);
		$this->pdf->setPaper('A4', 'potrait');
  		$this->pdf->load_view('backend/pelanggaran_pdf', $data);
  		$this->pdf->stream("Data Pelanggaran ".$kelas1->nama_kelas);
	}
}	