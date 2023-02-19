<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarUrutanData extends CI_Controller {

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

		$this->load->model("DaftarUrutanDataM");
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
		$data['title'] = "Daftar Urutan Data";
		$data['getData'] = $this->DaftarUrutanDataM->getAll();

		$this->load->view('admin/daftar_urutan_data/index', $data);
	}

	public function getCreate()
	{
		$data['title'] = "Daftar Urutan Data";
		$data['title2'] = "Buat Daftar Urutan Data";
		$data["getDataPeriodeDanJenisKuesioner"] = $this->DetailJenisPeriodeM->get()->result();

		$this->load->view('admin/daftar_urutan_data/create', $data);
	}

	public function postCreate()
    {
    	$post = $this->input->post();

    	$findDUD = $this->DaftarUrutanDataM->findDUD($post["txtKode"], $post["txtid_detailPeriode"]);

    	if ($findDUD) {
    		$this->session->set_flashdata("error", "Daftar Urutan Data sudah ada, tidak boleh sama !!");
	        redirect(site_url('DaftarUrutanData'));
    	} else {
	    	$timestamp = time();
			$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
			$dt->setTimestamp($timestamp);

	    	$result = $this->DaftarUrutanDataM->save(
	    			  	$this->session->userdata('user_nama'), $post["txtKode"], $post["txtAlias"], 
						$post["txtid_detailPeriode"], $dt->format('Y-m-d H:i:s'));
	        
	        if ($result) {
	        	$this->session->set_flashdata("success", "Daftar Urutan Data berhasil Ditambahkan !!");
	        } else {
	        	$this->session->set_flashdata("error", "Daftar Urutan Data gagal Ditambahkan !!");
	        }

	        redirect(site_url('DaftarUrutanData'));
	    }
    }

	public function getEdit()
	{
		$id = $this->uri->segment(3);
	    $result = $this->DaftarUrutanDataM->get_id($id);

	    if ($result->num_rows() > 0) {
	        $i = $result->row_array();

	        if ($i['status'] == 'Tidak Aktif') {
	        	$this->session->set_flashdata("warning", "Daftar Urutan Data sudah tidak aktif !!");
	    		echo "<script>window.history.back(); </script>";
	        } else {
	        	$data["id"] = $id;
	        	$data["kode"] = $i['kode'];
	        	$data["alias"] = $i['alias'];
	        	$data["id_detailPeriode"] = $i['id_detailPeriode'];
	        	$data["title"] = "Daftar Urutan Data";
	        	$data["title2"] = "Ubah Daftar Urutan Data";
	        	$data["getDataPeriodeDanJenisKuesioner"] = $this->DetailJenisPeriodeM->get()->result();

		        $this->load->view('admin/daftar_urutan_data/edit', $data);
	        }
	    } else {
	    	$this->session->set_flashdata("warning", "Daftar Urutan Data tidak Ditemukan !!");
	    	echo "<script>window.history.back(); </script>";
	    }
	}

	public function postUpdate() {
		$post = $this->input->post();

		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

    	$result = $this->DaftarUrutanDataM->update(
    			  	$post["txtID"], $this->session->userdata('user_nama'), $post["txtKode"], $post["txtAlias"],
					$post["txtid_detailPeriode"], $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Daftar Urutan Data berhasil Diubah !!");
        } else {
        	$this->session->set_flashdata("error", "Daftar Urutan Data gagal Diubah !!");
        }

        redirect(site_url('DaftarUrutanData'));
	}

	public function postDelete()
	{
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

		$id = $this->uri->segment(3);

	    $result = $this->DaftarUrutanDataM->delete(
    			  	$id, $this->session->userdata('user_nama'), $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Daftar Urutan Data berhasil Dihapus !!");
        } else {
        	$this->session->set_flashdata("error", "Daftar Urutan Data gagal Dihapus !!");
        }

        redirect(site_url('DaftarUrutanData'));
	}
}
