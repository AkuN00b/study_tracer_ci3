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
		$this->load->model("DetailPertanyaanJawabanM");
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
			$data2 = array();
			$result2 = $this->JawabanKuesionerM->getJawaban($row->id_pku)->result();

			foreach ($result2 as $row2) {
				$data3 = array();
				$result3 = $this->DetailPertanyaanJawabanM->getDTP($row2->id_jawabanKuesioner)->result();

				foreach ($result3 as $row3) {
					$data4 = array();
					$result4 = $this->JawabanKuesionerM->getJawaban($row3->id_pku)->result();

					foreach ($result4 as $row4) {
						$data5 = array();
						$result5 = $this->DetailPertanyaanJawabanM->getDTP($row4->id_jawabanKuesioner)->result();

						foreach ($result5 as $row5) {
							$data6 = array();
							$result6 = $this->JawabanKuesionerM->getJawaban($row5->id_pku)->result();

							foreach ($result6 as $row6) {
								$data6[] = array (
									'id_jawabanKuesioner' => $row4->id_jawabanKuesioner,
									'nilaiJawaban' => $row4->nilaiJawaban,
									'deskripsiJawaban' => $row4->deskripsiJawaban,
									'textbox' => $row4->textbox,
									'kode' => $row4->kode,
								);
							}

							$data5[] = array (
								'id_pku' => $row5->id_pku,
							 	'pertanyaan' => $row5->deskripsiPertanyaan,
							 	'jenis' => $row5->jenis,
							 	'kode' => $row5->kode,
							 	'jawaban_pertanyaan_turunan_2' => $data6,
							);
						}

						$data4[] = array (
							'id_jawabanKuesioner' => $row4->id_jawabanKuesioner,
							'nilaiJawaban' => $row4->nilaiJawaban,
							'deskripsiJawaban' => $row4->deskripsiJawaban,
							'textbox' => $row4->textbox,
							'kode' => $row4->kode,
							'pertanyaan_turunan_2' => $data5,
						);
					}

					$data3[] = array (
						'id_pku' => $row3->id_pku,
					 	'pertanyaan' => $row3->deskripsiPertanyaan,
					 	'jenis' => $row3->jenis,
					 	'kode' => $row3->kode,
					 	'jawaban_pertanyaan_turunan' => $data4,
					);
				}

				$data2[] = array (
					'id_jawabanKuesioner' => $row2->id_jawabanKuesioner,
					'nilaiJawaban' => $row2->nilaiJawaban,
					'deskripsiJawaban' => $row2->deskripsiJawaban,
					'textbox' => $row2->textbox,
					'kode' => $row2->kode,
					'pertanyaan_turunan' => $data3,			
				);
			}

			$data[] = array (
				'id_pku' => $row->id_pku,
			 	'pertanyaan' => $row->deskripsiPertanyaan,
			 	'jenis' => $row->jenis,
			 	'kode' => $row->kode,
			 	'jawaban' => $data2,
			);

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
