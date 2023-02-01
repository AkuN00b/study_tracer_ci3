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
    	$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

    	$post = $this->input->post();

    	$result = $this->DetailJenisPeriodeM->save(
    			  	$this->session->userdata('user_nama'), $post["txtJenisKuesioner"], 
					$post["txtPeriode"], $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Data Jenis Periode berhasil Ditambahkan !!");
        } else {
        	$this->session->set_flashdata("error", "Data Jenis Periode gagal Ditambahkan !!");
        }

        redirect(site_url('DetailJenisPeriode'));
    }

	public function getEdit()
	{
		$id = $this->uri->segment(3);
	    $result = $this->DetailJenisPeriodeM->get_id($id);

	    if ($result->num_rows() > 0) {
	        $i = $result->row_array();

	        if ($i['status'] == 'Tidak Aktif') {
	        	$this->session->set_flashdata("warning", "Data Jenis Periode sudah tidak aktif !!");
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
	    	$this->session->set_flashdata("warning", "Data Jenis Periode tidak Ditemukan !!");
	    	echo "<script>window.history.back(); </script>";
	    }
	}

	public function postUpdate() {
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);

		$post = $this->input->post();

    	$result = $this->DetailJenisPeriodeM->update(
    			  	$post["txtID"], $this->session->userdata('user_nama'), $post["txtJenisKuesioner"], 
					$post["txtPeriode"], $dt->format('Y-m-d H:i:s'));
        
        if ($result) {
        	$this->session->set_flashdata("success", "Data Jenis Periode berhasil Diubah !!");
        } else {
        	$this->session->set_flashdata("error", "Data Jenis Periode gagal Diubah !!");
        }

        redirect(site_url('DetailJenisPeriode'));
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
        	$this->session->set_flashdata("success", "Data Jenis Periode berhasil Dihapus !!");
        } else {
        	$this->session->set_flashdata("error", "Data Jenis Periode gagal Dihapus !!");
        }

        redirect(site_url('DetailJenisPeriode'));
	}
}