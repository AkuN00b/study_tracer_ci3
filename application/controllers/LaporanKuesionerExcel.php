<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanKuesionerExcel extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();

		$this->load->model("LaporanKuesionerM");
		$this->load->model("PertanyaanKuesionerM");
		$this->load->model("JawabanKuesionerM");
		$this->load->model("HasilKuesionerM");
		$this->load->model("DaftarUrutanDataM");

		if (!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('warning', 'Anda belum login atau session habis !!');
	     	redirect('welcome');
	    } else if ($this->session->userdata('user_role') == 'Alumni') {
			$this->session->set_flashdata('warning', 'Anda tidak diizinkan untuk mengakses !!');
	    	redirect('alumni');
	    }
	}
	
	public function index()
	{
		$data['title'] = "Laporan Kuesioner Excel";
		$data['dataHasilKuesioner'] = $this->HasilKuesionerM->getDetailPeriode();
		$data['getDataHK'] = $this->HasilKuesionerM->getAll();

		$this->load->view('admin/laporan_kuesioner_excel/index', $data);
	}

	public function detailPeriode()
	{
		$id = $this->uri->segment(3);

		$data['title'] = "Laporan Kuesioner Excel";

		if ($this->LaporanKuesionerM->getAll($id) != 0) {
			$data['getLaporan'] = $this->LaporanKuesionerM->getLaporan($id);
			$data['getHeaderLaporan'] = $this->DaftarUrutanDataM->getHeaderLaporan($id);
		}

		$data['getData'] = $this->LaporanKuesionerM->getAll($id);

		$this->load->view('admin/laporan_kuesioner_excel/detailPeriode', $data);
	}
}
