<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonfirmasiAkun extends CI_Controller {

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
		$data['title'] = "Konfirmasi Akun";
		$data['getData'] = $this->RegistrasiAlumniM->getAll();

		$this->load->view('admin/konfirmasi_akun/index', $data);
	}

	public function updateDiterima() 
	{
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

		$id = $this->uri->segment(3);

	    $result = $this->RegistrasiAlumniM->updateDiterimaM(
    			  	$id, $this->session->userdata('user_nama'), $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Akun Alumni telah Diterima !!");
        } else {
        	$this->session->set_flashdata("error", "Akun Alumni gagal Diterima !!");
        }

        redirect(site_url('KonfirmasiAkun'));
	}

	public function updateDitolak()
	{
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

		$id = $this->uri->segment(3);

	    $result = $this->RegistrasiAlumniM->updateDitolakM(
    			  	$id, $this->session->userdata('user_nama'), $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Akun Alumni telah Ditolak !!");
        } else {
        	$this->session->set_flashdata("error", "Akun Alumni gagal Ditolak !!");
        }

        redirect(site_url('KonfirmasiAkun'));
	}

	public function getResetPassword() 
	{
		$id = $this->uri->segment(3);		
		$data['title'] = "Konfirmasi Akun";
    	$data['title2'] = "Reset Kata Sandi Akun Alumni";

    	$result = $this->RegistrasiAlumniM->getForUpdate($id);

    	if ($result->num_rows() > 0) {
        	$data["id"] = $id;

	        $this->load->view('admin/konfirmasi_akun/editResetPassword', $data);
	    } else {
	    	$this->session->set_flashdata("warning", "Akun Alumni tidak Ditemukan !!");
	    	echo "<script>window.history.back(); </script>";
	    }
	}

	public function postResetPassword()
	{
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

		$post = $this->input->post();

    	$result = $this->RegistrasiAlumniM->updatePassword(
    			  	$post["txtID"], $this->encryption->encrypt($post["txtPassword"]), $this->session->userdata('user_nama'), $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Kata Sandi berhasil Diubah !!");
        } else {
        	$this->session->set_flashdata("error", "Kata Sandi gagal Diubah !!");
        }

        redirect(site_url('KonfirmasiAkun'));
	}

	public function getUpdateData() 
	{
		$id = $this->uri->segment(3);
		$data['title'] = "Konfirmasi Akun";
    	$data['title2'] = "Update Data Akun Alumni";

    	$result = $this->RegistrasiAlumniM->getForUpdate($id);

    	if ($result->num_rows() > 0) {
	        $i = $result->row_array();
        
        	$data["id"] = $id;
	        $data["nama"] = $i['nama'];
	        $data["tahun_lulus"] = $i['tahun_lulus'];

	        $this->load->view('admin/konfirmasi_akun/edit', $data);
	    } else {
	    	$this->session->set_flashdata("warning", "Akun Alumni tidak Ditemukan !!");
	    	echo "<script>window.history.back(); </script>";
	    }
	}

	public function postUpdateData() 
	{
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

		$post = $this->input->post();

    	$result = $this->RegistrasiAlumniM->updateAkun(
    			  	$post["txtID"], $post["txtNama"], $this->session->userdata('user_nama'), $post["txtTahunLulus"], $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Data Akun berhasil Diubah !!");
        } else {
        	$this->session->set_flashdata("error", "Data Akun gagal Diubah !!");
        }

        redirect(site_url('KonfirmasiAkun'));
	}
}
