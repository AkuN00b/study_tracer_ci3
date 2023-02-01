<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PertanyaanKuesioner extends CI_Controller {

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

		$this->load->model("PertanyaanKuesionerM");
		$this->load->model("DetailJenisPeriodeM");

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
		$data['title'] = "Pertanyaan Kuesioner";
		$data['getData'] = $this->PertanyaanKuesionerM->getAll();

		$this->load->view('admin/pertanyaan_kuesioner/index', $data);
	}

	public function getCreate()
	{
		$data['title'] = "Pertanyaan Kuesioner";
		$data['title2'] = "Buat Pertanyaan Kuesioner";
		$data["getDataPeriodeDanJenisKuesioner"] = $this->DetailJenisPeriodeM->get();

		$id = $this->PertanyaanKuesionerM->getCountID()->num_rows();

		if ($id == 0) {
			$data['id'] = "PKU001";
		} else if ($id < 9) {
			$data['id'] = "PKU00" . ++$id;
		} else if ($id < 99) {
			$data['id'] = "PKU0" . ++$id;
		} else {
			$data['id'] = "PKU" . ++$id;
		}

		$this->load->view('admin/pertanyaan_kuesioner/create', $data);
	}

	public function postCreate()
    {
    	$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

    	$post = $this->input->post();

    	$result = $this->PertanyaanKuesionerM->save(
    			  	$this->session->userdata('user_nama'), $post["txtid_pku"], $post["txtdeskripsiPertanyaan"],
					$post["txtjenis"], $post["txtkode"], $post["txtid_detailPeriode"],
					$post["txtpertanyaan_utama"], $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Pertanyaan Kuesioner berhasil Ditambahkan !!");
        } else {
        	$this->session->set_flashdata("error", "Pertanyaan Kuesioner gagal Ditambahkan !!");
        }

        redirect(site_url('PertanyaanKuesioner'));
    }

	public function getEdit()
	{
		$id = $this->uri->segment(3);
	    $result = $this->PertanyaanKuesionerM->get_id($id);
		$data["getDataPeriodeDanJenisKuesioner"] = $this->DetailJenisPeriodeM->get();

	    if ($result->num_rows() > 0) {
	        $i = $result->row_array();

	        if ($i['status'] == 'Tidak Aktif') {
	        	$this->session->set_flashdata("warning", "Pertanyaan Kuesioner sudah tidak aktif !!");
	    		echo "<script>window.history.back(); </script>";
	        } else {
	        	$data["id"] = $id;
		        $data["deskripsipertanyaan"] = $i['deskripsiPertanyaan'];
		        $data["jenis"] = $i['jenis'];
		        $data["kode"] = $i['kode'];
		        $data["id_detailperiode"] = $i['id_detailPeriode'];
		        $data["pertanyaan_utama"] = $i['pertanyaan_utama'];
		        $data["title"] = "Pertanyaan Kuesioner";
		        $data["title2"] = "Ubah Pertanyaan Kuesioner";

		        $this->load->view('admin/pertanyaan_kuesioner/edit', $data);
	        }
	    } else {
	    	$this->session->set_flashdata("warning", "Pertanyaan Kuesioner tidak Ditemukan !!");
	    	echo "<script>window.history.back(); </script>";
	    }
	}

	public function postUpdate() {
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

		$post = $this->input->post();

    	$result = $this->PertanyaanKuesionerM->update(
    			  	$post["txtID"], $this->session->userdata('user_nama'), $post["txtdeskripsiPertanyaan"],
					$post["txtjenis"], $post["txtkode"], $post["txtid_detailPeriode"],
					$post["txtpertanyaan_utama"], $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Pertanyaan Kuesioner berhasil Diubah !!");
        } else {
        	$this->session->set_flashdata("error", "Pertanyaan Kuesioner gagal Diubah !!");
        }

        redirect(site_url('PertanyaanKuesioner'));
	}

	public function postDelete()
	{
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

		$id = $this->uri->segment(3);

	    $result = $this->PertanyaanKuesionerM->delete(
    			  	$id, $this->session->userdata('user_nama'), $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Pertanyaan Kuesioner berhasil Dihapus !!");
        } else {
        	$this->session->set_flashdata("error", "Pertanyaan Kuesioner gagal Dihapus !!");
        }

        redirect(site_url('PertanyaanKuesioner'));
	}
}
