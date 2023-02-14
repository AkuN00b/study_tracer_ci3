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
		$this->load->model("LaporanKuesionerM");
		$this->load->model("PertanyaanKuesionerM");
		$this->load->model("JawabanKuesionerM");
		$this->load->model("RegistrasiAlumniM");
		$this->load->model("ProvinsiM");
		$this->load->model("KabKotaM");

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
		$data['getListKuesionerTahunIni'] = $this->DetailJenisPeriodeM->get()->result();
		$data['getListKuesionerTahunIniC'] = $this->DetailJenisPeriodeM->get()->num_rows();
		$data['getListSudahIsiC'] = $this->HasilKuesionerM->getDataHKBaseUser($this->session->userdata('user_nim'))->num_rows();
		$data['getListSudahIsi'] = $this->HasilKuesionerM->getDataHKBaseUser($this->session->userdata('user_nim'))->result();
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
				$data2[] = array (
					'id_jawabanKuesioner' => $row2->id_jawabanKuesioner,
					'nilaiJawaban' => $row2->nilaiJawaban,
					'deskripsiJawaban' => $row2->deskripsiJawaban,
					'textbox' => $row2->textbox,
					'kode' => $row2->kode,			
				);
			}

			$data[] = array (
				'id_pku' => $row->id_pku,
			 	'pertanyaan' => $row->deskripsiPertanyaan,
			 	'jenis' => $row->jenis,
			 	'kode' => $row->kode,
			 	'jawaban' => $data2,
			);
		}
	
		// $result = array('tanya' => $this->PertanyaanKuesionerM->getUtama($id)->result(), 
		// 				'jawab' => $this->JawabanKuesionerM->getJawaban($id)->result());
		// $data['test'] = $row->id_pku;
		
		header('Content-type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function getProvinsi()
	{
		$result = $this->ProvinsiM->getAll();
		$data = array();

		foreach ($result as $row) {
			$data[] = array (
				'provinsi_id' => $row->provinsi_id,
			 	'provinsi_deskripsi' => $row->provinsi_deskripsi,
			);
		}

		header('Content-type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function getKabupatenKota($id)
	{
		$result = $this->KabKotaM->getID($id);
		$data = array();

		foreach ($result as $row) {
			$data[] = array (
				'kabkota_id' => $row->kabkota_id,
				'kabkota_deskripsi' => $row->kabkota_deskripsi,
			 	'kabkota_provinsi_id' => $row->kabkota_provinsi_id,
			);
		}

		header('Content-type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function postKuesioner() 
	{
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

		$data = array (
			'id_hasilKuesioner' => $this->input->post('txtid_hasilKuesioner'),
			'id_detailPeriode' => $this->input->post('txtid_DetailPeriode'),
			'nim' => $this->session->userdata('user_nim'),
			'tanggal_pengisian' => $dt->format('Y-m-d'),
			'created_by' => $this->session->userdata('user_nama'),
			'created_date' => $dt->format('Y-m-d H:i:s'),
			'modified_by' => $this->session->userdata('user_nama'),
			'modified_date' => $dt->format('Y-m-d H:i:s'),
		);

		$result = $this->HasilKuesionerM->saveJawaban($data);

		if ($result) {
			$jawabanKuesioner = $this->input->post('jawabanKuesioner', TRUE);
			$kode = $this->input->post('kode', TRUE);

			$result2 = $this->LaporanKuesionerM->saveJawaban($jawabanKuesioner, $kode, $this->input->post('txtid_hasilKuesioner'), $this->session->userdata('user_nama'), $dt->format('Y-m-d H:i:s'));

			if ($result2) {
	        	$this->session->set_flashdata("success", "Kuesioner berhasil Dijawab !!");
			} else {
	        	$this->session->set_flashdata("error", "Kuesioner gagal Dijawab !!");
			}
		} else {
	        $this->session->set_flashdata("error", "Kuesioner gagal Dijawab !!");
		}

		redirect(site_url('Alumni'));
	}

	public function postNPWP() {
		$post = $this->input->post();

    	$findNPWP = $this->RegistrasiAlumniM->findNPWP($post["txtNPWP"]);

    	if ($findNPWP) {
	        $this->session->set_flashdata("error", "NPWP sudah ada, tidak boleh sama !!");
	        redirect(site_url('Alumni'));
    	} else {
    		$timestamp = time();
			$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
			$dt->setTimestamp($timestamp);

	    	$result = $this->RegistrasiAlumniM->saveNPWP(
	    			  	$this->session->userdata('user_nama'), $this->session->userdata('user_id'),
	    			  	$post["txtNPWP"], $dt->format('Y-m-d H:i:s'));
	        
	        if ($result) {
	        	$this->session->set_userdata('user_npwp', $post["txtNPWP"]);
	        	$this->session->set_flashdata("success", "NPWP berhasil Ditambahkan !!");
	        } else {
	        	$this->session->set_flashdata("error", "NPWP gagal Ditambahkan !!");
	        }

	        redirect(site_url('Alumni'));
	    }
	}

	public function logout() {
		$this->session->sess_destroy();
    	redirect('/');
	}
}
