<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailJenisPeriode extends CI_Controller {

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
		$this->load->model("DaftarUrutanDataM");
		$this->load->model("DetailPertanyaanJawabanM");
		$this->load->model("JawabanKuesionerM");
		$this->load->model("PertanyaanKuesionerM");

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
		$data['title'] = "Detail Jenis Periode";
		$data['getData'] = $this->DetailJenisPeriodeM->getAll();
		$data['getDataAda'] = $this->DetailJenisPeriodeM->getAllAda();
		$data['getDataKosong'] = $this->DetailJenisPeriodeM->getAllKosong();

		$this->load->view('admin/detail_jenis_periode/index', $data);
	}

	public function getCreate()
	{
		$data['title'] = "Detail Jenis Periode";
		$data['title2'] = "Buat Detail Jenis Periode";

		$this->load->view('admin/detail_jenis_periode/create', $data);
	}

	public function postCreate()
    {
    	$post = $this->input->post();

    	$findDJP = $this->DetailJenisPeriodeM->findDJP($post["txtJenisKuesioner"], $post["txtPeriode"]);

    	if ($findDJP) {
    		$this->session->set_flashdata("error", "Detail Jenis Periode sudah ada, tidak boleh sama !!");
	        redirect(site_url('DetailJenisPeriode'));
    	} else {
	    	$timestamp = time();
			$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
			$dt->setTimestamp($timestamp);

	    	$result = $this->DetailJenisPeriodeM->save(
	    			  	$this->session->userdata('user_nama'), $post["txtJenisKuesioner"], 
						$post["txtPeriode"], $dt->format('Y-m-d H:i:s'));
	        
	        if ($result) {
	        	$this->session->set_flashdata("success", "Detail Jenis Periode berhasil Ditambahkan !!");
	        } else {
	        	$this->session->set_flashdata("error", "Detail Jenis Periode gagal Ditambahkan !!");
	        }

	        redirect(site_url('DetailJenisPeriode'));
	    }
    }

	public function getEdit()
	{
		$id = $this->uri->segment(3);
	    $result = $this->DetailJenisPeriodeM->get_id($id);

	    if ($result->num_rows() > 0) {
	        $i = $result->row_array();

	        if ($i['status'] == 'Tidak Aktif') {
	        	$this->session->set_flashdata("warning", "Detail Jenis Periode sudah tidak aktif !!");
	    		echo "<script>window.history.back(); </script>";
	        } else {
	        	$data = array(
		        	'id' => $id,
		        	'jenis_kuesioner'    => $i['jenis_kuesioner'],
		            'periode'  => $i['periode'],
		            'title'	=> "Detail Jenis Periode",
		            'title2' => "Ubah Detail Jenis Periode",
		        );

		        $this->load->view('admin/detail_jenis_periode/edit', $data);
	        }
	    } else {
	    	$this->session->set_flashdata("warning", "Detail Jenis Periode tidak Ditemukan !!");
	    	echo "<script>window.history.back(); </script>";
	    }
	}

	public function postUpdate() {
		$post = $this->input->post();

    	$findDJP = $this->DetailJenisPeriodeM->findDJP($post["txtJenisKuesioner"], $post["txtPeriode"]);

    	if ($findDJP) {
    		$this->session->set_flashdata("error", "Detail Jenis Periode sudah ada, tidak boleh sama !!");
	        redirect(site_url('DetailJenisPeriode'));
    	} else {
			$timestamp = time();
			$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
			$dt->setTimestamp($timestamp);

	    	$result = $this->DetailJenisPeriodeM->update(
	    			  	$post["txtID"], $this->session->userdata('user_nama'), $post["txtJenisKuesioner"], 
						$post["txtPeriode"], $dt->format('Y-m-d H:i:s'));
	        
	        if ($result) {
	        	$this->session->set_flashdata("success", "Detail Jenis Periode berhasil Diubah !!");
	        } else {
	        	$this->session->set_flashdata("error", "Detail Jenis Periode gagal Diubah !!");
	        }

	        redirect(site_url('DetailJenisPeriode'));
	    }
	}

	public function postDelete()
	{
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

		$id = $this->uri->segment(3);

	    $result = $this->DetailJenisPeriodeM->delete(
    			  	$id, $this->session->userdata('user_nama'), $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Detail Jenis Periode berhasil Dihapus !!");
        } else {
        	$this->session->set_flashdata("error", "Detail Jenis Periode gagal Dihapus !!");
        }

        redirect(site_url('DetailJenisPeriode'));
	}

	public function copyKuesioner()
    {
    	$post = $this->input->post();

    	$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

		// copy Daftar Urutan Data
		$this->DaftarUrutanDataM->postCopy($post["txtid_detailPeriodeAsal"], $post["txtid_detailPeriodeKe"], 
						$this->session->userdata('user_nama'), $dt->format('Y-m-d H:i:s'));

		// copy Pertanyaan Kuesioner
		$this->PertanyaanKuesionerM->postCopy($post["txtid_detailPeriodeAsal"], $post["txtid_detailPeriodeKe"], 
						$this->session->userdata('user_nama'), $dt->format('Y-m-d H:i:s'));

		// copy Jawaban Kuesioner
		$getUtamaAsal = $this->PertanyaanKuesionerM->getUtamaCopy($post["txtid_detailPeriodeAsal"])->result();
		$getUtamaAsalCount = $this->PertanyaanKuesionerM->getUtamaCopy($post["txtid_detailPeriodeAsal"])->num_rows();
		
		$getUtamaKe = $this->PertanyaanKuesionerM->getUtamaCopy($post["txtid_detailPeriodeKe"])->result();
		$getUtamaKeCount = $this->PertanyaanKuesionerM->getUtamaCopy($post["txtid_detailPeriodeKe"])->num_rows();

		for ($i = 0; $i < $getUtamaKeCount; $i++) {
	    	$this->JawabanKuesionerM->postCopy($getUtamaAsal[$i]->id_pku, $getUtamaKe[$i]->id_pku, 
	    									   $this->session->userdata('user_nama'), $dt->format('Y-m-d H:i:s'));
	    }

	    // copy Detail Pertanyaan Jawaban
	    $getDPJ = $this->DetailPertanyaanJawabanM->getDPJwithDJP($post["txtid_detailPeriodeAsal"])->result();
	    $getDPJCount = $this->DetailPertanyaanJawabanM->getDPJwithDJP($post["txtid_detailPeriodeAsal"])->num_rows();

	    if ($getDPJCount > 0) {
	    	// copy Pertanyaan Kuesioner Tidak Utama
			for ($i = 0; $i < $getDPJCount; $i++) {
			   	$this->PertanyaanKuesionerM->postCopyTurunan($getDPJ[$i]->id_pku_answer, $post["txtid_detailPeriodeKe"],
			   			$this->session->userdata('user_nama'), $dt->format('Y-m-d H:i:s'));
			}

			// copy Jawaban Kuesioner Tidak Utama
			$getTurunanAsal = $this->PertanyaanKuesionerM->getTurunanCopy($post["txtid_detailPeriodeAsal"])->result();
			$getTurunanAsalCount = $this->PertanyaanKuesionerM->getTurunanCopy($post["txtid_detailPeriodeAsal"])->num_rows();
			
			$getTurunanKe = $this->PertanyaanKuesionerM->getTurunanCopy($post["txtid_detailPeriodeKe"])->result();
			$getTurunanKeCount = $this->PertanyaanKuesionerM->getTurunanCopy($post["txtid_detailPeriodeKe"])->num_rows();

			for ($i = 0; $i < $getTurunanKeCount; $i++) {
		    	$this->JawabanKuesionerM->postCopy($getTurunanAsal[$i]->id_pku, $getTurunanKe[$i]->id_pku, 
		    									   $this->session->userdata('user_nama'), $dt->format('Y-m-d H:i:s'));
		    }

			for ($i = 0; $i < $getDPJCount; $i++) {
			    $id_jawabanKuesioner = $this->JawabanKuesionerM->getIDCopy($getDPJ[$i]->deskripsiJawaban, 
			    						$post["txtid_detailPeriodeKe"])->row_array();

			    $id_pku_answer = $this->PertanyaanKuesionerM->getIDCopy($getDPJ[$i]->deskripsiPertanyaan, $post["txtid_detailPeriodeKe"])->row_array();

			    $this->DetailPertanyaanJawabanM->postCopy($id_jawabanKuesioner['id_jawabanKuesioner'], $id_pku_answer['id_pku'], 
		    									   $this->session->userdata('user_nama'), $dt->format('Y-m-d H:i:s'));
			}
	    }

    	$this->session->set_flashdata("success", "Kuesioner berhasil di salin !!");

        redirect(site_url('DetailJenisPeriode'));
    }
}
