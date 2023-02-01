<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {

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

		$this->load->model("DetailJenisPeriodeM");
		$this->load->model("HasilKuesionerM");
		$this->load->model("PertanyaanKuesionerM");
		$this->load->model("JawabanKuesionerM");

		if (!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('warning', 'Anda belum login atau session habis !!');
	     	redirect('welcome');
	    } else if ($this->session->userdata('user_role') == 'Admin') {
			$this->session->set_flashdata('warning', 'Anda tidak diizinkan untuk mengakses !!');
	    	redirect('admin');
	    }
	}
	
	public function index()
	{
		$data['title'] = "Dashboard Alumni";
		$data['getListKuesionerTahunIni'] = $this->DetailJenisPeriodeM->get();
		$this->load->view('alumni/dashboard.php', $data);
	}

	public function kuesioner()
	{
		$data['title'] = "Dashboard Alumni";
		$idOtomatis = $this->HasilKuesionerM->getCountID()->num_rows();

		if ($idOtomatis == 0) {
			$data['id'] = "HKU001";
		} else if ($idOtomatis < 9) {
			$data['id'] = "HKU00" . ++$idOtomatis;
		} else if ($idOtomatis < 99) {
			$data['id'] = "HKU0" . ++$idOtomatis;
		} else {
			$data['id'] = "HKU" . ++$idOtomatis;
		}

		$id = $this->uri->segment(3);
	    $result = $this->DetailJenisPeriodeM->get_id($id);

	    $data['idDetailPeriode'] = $id;

	    if ($result->num_rows() > 0) {
	        $i = $result->row_array();

	        if ($i['status'] == 'Tidak Aktif') {
	        	$this->session->set_flashdata("warning", "Akses dilarang !!");
	    		echo "<script>window.history.back(); </script>";
	        } else {
	        	$data['title2'] = 'Kuesioner ' . $i['jenis_kuesioner'] . ' - ' . $i['periode'];
		        $this->load->view('alumni/kuesioner', $data);
	        }
	    } else {
	    	$this->session->set_flashdata("warning", "Akses dilarang !!");
	    	echo "<script>window.history.back(); </script>";
	    }
	}

	public function getKuesionerUtama($id)
	{
		$result = $this->PertanyaanKuesionerM->getUtama($id)->result();
		$data = array();
		foreach ($result as $row) {
			 $data[] = array
			 	('id_pku' => $row->id_pku,
			 	 'pertanyaan' => $row->deskripsiPertanyaan,
			 	 'jenis' => $row->jenis,
			 	 'kode' => $row->kode,
				 'jawaban' => array('data' => $this->JawabanKuesionerM->getJawaban($row->id_pku)->result()));
			// $data['test'] = $row->id_pku;
		}
	
		// $result = array('tanya' => $this->PertanyaanKuesionerM->getUtama($id)->result(), 
		// 				'jawab' => $this->JawabanKuesionerM->getJawaban($id)->result());
		header('Content-type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function postKuesioner() 
	{

	}

	public function logout() {
		$this->session->sess_destroy();
    	redirect('/');
	}
}
