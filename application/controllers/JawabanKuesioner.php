<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JawabanKuesioner extends CI_Controller {

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
		$data['title'] = "Jawaban Kuesioner";
		$data['getData'] = $this->JawabanKuesionerM->getAll();

		$this->load->view('admin/jawaban_kuesioner/index', $data);
	}

	public function getCreate()
	{
		$data['title'] = "Jawaban Kuesioner";
		$data['title2'] = "Buat Jawaban Kuesioner";
		$data["getDataPertanyaanKuesioner"] = $this->PertanyaanKuesionerM->get();

		$id = $this->JawabanKuesionerM->getCountID()->num_rows();

		if ($id == 0) {
			$data['id'] = "JK001";
		} else if ($id < 9) {
			$data['id'] = "JK00" . ++$id;
		} else if ($id < 99) {
			$data['id'] = "JK0" . ++$id;
		} else {
			$data['id'] = "JK" . ++$id;
		}

		$this->load->view('admin/jawaban_kuesioner/create', $data);
	}

	public function postCreate()
    {
    	$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

    	$post = $this->input->post();

    	$result = $this->JawabanKuesionerM->save(
    			  	$this->session->userdata('user_nama'), $post["txtIdJK"], $post["txtJawabanUntukPertanyaan"],
					$post["txtDeskripsiJawaban"], $post["txtKodeJawaban"], $post["txtNilaiJawaban"],
					$post["txtButuhTextbox"], $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Jawaban Kuesioner berhasil Ditambahkan !!");
        } else {
        	$this->session->set_flashdata("error", "Jawaban Kuesioner gagal Ditambahkan !!");
        }

        redirect(site_url('JawabanKuesioner'));
    }

	public function getEdit()
	{
		$id = $this->uri->segment(3);
	    $result = $this->JawabanKuesionerM->get_id($id);

		$data["getDataPertanyaanKuesioner"] = $this->PertanyaanKuesionerM->get();

	    if ($result->num_rows() > 0) {
	        $i = $result->row_array();

	        if ($i['status'] == 'Tidak Aktif') {
	        	$this->session->set_flashdata("warning", "Jawaban Kuesioner sudah tidak aktif !!");
	    		echo "<script>window.history.back(); </script>";
	        } else {
	        	$data['id'] = $id;
	        	$data['id_pku'] = $i['id_pku'];
	        	$data['deskripsiJawaban'] = $i['deskripsiJawaban'];
	        	$data['kode'] = $i['kode'];
	        	$data['nilaiJawaban'] = $i['nilaiJawaban'];
	        	$data['textbox'] = $i['textbox'];
	        	$data['title'] = "Jawaban Kuesioner";
	        	$data['title2'] = "Ubah Jawaban Kuesioner";

		        $this->load->view('admin/jawaban_kuesioner/edit', $data);
	        }
	    } else {
	    	$this->session->set_flashdata("warning", "Jawaban Kuesioner tidak Ditemukan !!");
	    	echo "<script>window.history.back(); </script>";
	    }
	}

	public function postUpdate() {
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

		$post = $this->input->post();

    	$result = $this->JawabanKuesionerM->update(
    			  	$post["txtIdJK"], $this->session->userdata('user_nama'), $post["txtJawabanUntukPertanyaan"],
					$post["txtDeskripsiJawaban"], $post["txtKodeJawaban"], $post["txtNilaiJawaban"],
					$post["txtButuhTextbox"], $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Jawaban Kuesioner berhasil Diubah !!");
        } else {
        	$this->session->set_flashdata("error", "Jawaban Kuesioner gagal Diubah !!");
        }

        redirect(site_url('JawabanKuesioner'));
	}

	public function postDelete()
	{
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

		$id = $this->uri->segment(3);

	    $result = $this->JawabanKuesionerM->delete(
    			  	$id, $this->session->userdata('user_nama'), $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Jawaban Kuesioner berhasil Dihapus !!");
        } else {
        	$this->session->set_flashdata("error", "Jawaban Kuesioner gagal Dihapus !!");
        }

        redirect(site_url('JawabanKuesioner'));
	}
}
