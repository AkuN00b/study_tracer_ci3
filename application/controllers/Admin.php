<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

		$this->load->model("RegistrasiAlumniM");
		$this->load->model("PertanyaanKuesionerM");
		$this->load->model("JawabanKuesionerM");
		$this->load->model("DetailJenisPeriodeM");
		$this->load->model("DetailPertanyaanJawabanM");
		$this->load->model("HasilKuesionerM");

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
		$data['title'] = "Dashboard Admin";
		$data['getData'] = $this->RegistrasiAlumniM->getTOP5();

		$data['getCountPK'] = $this->PertanyaanKuesionerM->getCountAktif()->num_rows();
		$data['getCountJK'] = $this->JawabanKuesionerM->getCountAktif()->num_rows();
		$data['getCountDJP'] = $this->DetailJenisPeriodeM->getCountAktif()->num_rows();
		$data['getCountDPJ'] = $this->DetailPertanyaanJawabanM->getCountAktif()->num_rows();

		$data['chartBarRA'] = $this->RegistrasiAlumniM->chartBar();
		$data['chartDoughnutRA'] = $this->RegistrasiAlumniM->chartDoughnut();
		$data['chartPieHK'] = $this->HasilKuesionerM->chartPie();

		$data['getCountRA'] = $this->RegistrasiAlumniM->getAllCount()->num_rows();
		$data['getCountHK'] = $this->HasilKuesionerM->getAllCount()->num_rows();

		$this->load->view('admin/dashboard.php', $data);
	}

	public function logout() {
		$this->session->sess_destroy();
    	redirect('/');
	}
}
