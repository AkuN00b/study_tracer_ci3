<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengingat extends CI_Controller {

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

		$this->load->library("encryption");

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
		// $tes = "79d06f8c00a355f8bf9dbb032780e5a5b62ebd46b76460fe664cacebaf41050b10e4697c46a24c406820d9b6a26feecd2564e24e9b06c545871c96e28ed06278lhecZnYC4vOD0UfOAM3EAoDVt8FhSoFpz1vSwvxV5Wk=";
		// echo($this->encryption->decrypt($tes));

		$data['title'] = "Pengingat";
		$this->load->view('admin/pengingat/index', $data);
	}
}
