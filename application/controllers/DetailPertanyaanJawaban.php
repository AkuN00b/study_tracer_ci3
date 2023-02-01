<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailPertanyaanJawaban extends CI_Controller {

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
		$data['title'] = "Detail Pertanyaan Jawaban";
		$data['getData'] = $this->DetailPertanyaanJawabanM->getAll();

		$this->load->view('admin/detail_pertanyaan_jawaban/index', $data);
	}

	public function getCreate()
	{
		$data['title'] = "Detail Pertanyaan Jawaban";
		$data['title2'] = "Buat Detail Pertanyaan Jawaban";
		$data["getDataJawabanKuesioner"] = $this->JawabanKuesionerM->get();
		$data["getDataPertanyaanKuesionerTurunan"] = $this->PertanyaanKuesionerM->getTurunan();

		$this->load->view('admin/detail_pertanyaan_jawaban/create', $data);
	}

	public function postCreate()
    {
    	$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

    	$post = $this->input->post();

    	$result = $this->DetailPertanyaanJawabanM->save(
    			  	$this->session->userdata('user_nama'), $post["txtJawabanKuesioner"],
					$post["txtPertanyaanTurunan"], $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Detail Pertanyaan Jawaban berhasil Ditambahkan !!");
        } else {
        	$this->session->set_flashdata("error", "Detail Pertanyaan Jawaban gagal Ditambahkan !!");
        }

        redirect(site_url('DetailPertanyaanJawaban'));
    }

	public function getEdit()
	{
		$id = $this->uri->segment(3);
	    $result = $this->DetailPertanyaanJawabanM->get_id($id);

	    $data["getDataJawabanKuesioner"] = $this->JawabanKuesionerM->get();
		$data["getDataPertanyaanKuesionerTurunan"] = $this->PertanyaanKuesionerM->getTurunan();

	    if ($result->num_rows() > 0) {
	        $i = $result->row_array();

	        if ($i['status'] == "Tidak Aktif") {
	        	$this->session->set_flashdata("warning", "Detail Pertanyaan Jawaban sudah tidak aktif !!");
	    		echo "<script>window.history.back(); </script>";
	        } else {
	        	$data['id'] = $id;
	        	$data['id_jawabanKuesioner'] = $i['id_jawabanKuesioner'];
	        	$data['id_pku_answer'] = $i['id_pku_answer'];
	        	$data['title'] = "Detail Pertanyaan Jawaban";
	        	$data['title2'] = "Ubah Detail Pertanyaan Jawaban";

		        $this->load->view('admin/detail_pertanyaan_jawaban/edit', $data);
	        }
	    } else {
	    	$this->session->set_flashdata("warning", "Detail Pertanyaan Jawaban tidak Ditemukan !!");
	    	echo "<script>window.history.back(); </script>";
	    }
	}

	public function postUpdate() {
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

		$post = $this->input->post();

    	$result = $this->DetailPertanyaanJawabanM->update(
    			  	$post["txtID"], $this->session->userdata('user_nama'), $post["txtJawabanKuesioner"], 
					$post["txtPertanyaanTurunan"], $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Detail Pertanyaan Jawaban berhasil Diubah !!");
        } else {
        	$this->session->set_flashdata("error", "Detail Pertanyaan Jawaban gagal Diubah !!");
        }

        redirect(site_url('DetailPertanyaanJawaban'));
	}

	public function postDelete()
	{
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

		$id = $this->uri->segment(3);

	    $result = $this->DetailPertanyaanJawabanM->delete(
    			  	$id, $this->session->userdata('user_nama'), $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Detail Pertanyaan Jawaban berhasil Dihapus !!");
        } else {
        	$this->session->set_flashdata("error", "Detail Pertanyaan Jawaban gagal Dihapus !!");
        }

        redirect(site_url('DetailPertanyaanJawaban'));
	}
}
