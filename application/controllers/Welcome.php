<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->model("AdminM");
		$this->load->model("RegistrasiAlumniM");

		$this->load->library("encryption");

		if ($this->session->userdata('logged_in')) {
			if ($this->session->userdata('user_role') == 'Admin') {
				$this->session->set_flashdata('warning', 'Logout terlebih dahulu !!');
	     		redirect('admin');
			} else if ($this->session->userdata('user_role') == 'Alumni') {
				$this->session->set_flashdata('warning', 'Logout terlebih dahulu !!');
	     		redirect('Alumni');
			}
	    }
	}

	public function index()
	{
		$data['title'] = "Login";
		$this->load->view('welcome_message', $data);
	}

	public function cek_login()
	{
		$post = $this->input->post();
		if ((isset($post["txtUsername"]) && isset($post["txtPassword"])) && ($post["txtUsername"] != null && $post["txtPassword"] != null))
		{
			// cek user
			$user = $this->AdminM;
			$data = $user->getByUsernamePassword($post['txtUsername']);
			$logged_in = false;

			if ($data != null) {
				if ($post["txtPassword"] == $this->encryption->decrypt($data->password)) {
					$id_admin 	= $data->id_admin;
					$username 	= $data->username;
					$nama 	 	= $data->nama;
					$logged_in = true;

					// adding data to session
					$newdata = array (
						'user_id' 		=> $id_admin,	
						'user_username' => $username,	
						'user_nama'		=> $nama,
						'user_role'		=> 'Admin',
						'logged_in'		=> $logged_in
					);

					$this->session->set_userdata($newdata);
					$this->session->set_flashdata("success", "Login Berhasil anda adalah " . $nama . " sebagai Admin !!");

					redirect(site_url('Admin'));
				} else {
					$this->session->set_flashdata('error', 'Password anda salah !!');
					redirect(site_url('Welcome'));
				}				
			} else if (!$logged_in) {
				$user = $this->RegistrasiAlumniM;
				$data = $user->getByUsernamePasswordAlumni($post['txtUsername']);

				if ($data != null) {
					if ($post["txtPassword"] == $this->encryption->decrypt($data->password)) {
						if ($data->status == 'Diterima') {
							$id	 			= $data->id;
							$nim 			= $data->nim;
							$nik 	 		= $data->nik;
							$nama 	 		= $data->nama;
							$alamat 	 	= $data->alamat;
							$tanggal_lahir 	= $data->tanggal_lahir;
							$tahun_lulus 	= $data->tahun_lulus;
							$email 	 		= $data->email;
							$telepon 	 	= $data->telepon;
							$logged_in 		= TRUE;

							// adding data to session
							$newdata = array (
								'user_id' 				=> $id,	
								'user_nim'				=> $nim,	
								'user_nik'				=> $nik,
								'user_nama'				=> $nama,
								'user_alamat'			=> $alamat,
								'user_tanggal_lahir'	=> $tanggal_lahir,
								'user_tahun_lulus'		=> $tahun_lulus,
								'user_email'			=> $email,
								'user_telepon'			=> $telepon,
								'user_role'				=> 'Alumni',
								'logged_in'				=> $logged_in
							);

							$this->session->set_userdata($newdata);
							$this->session->set_flashdata("success", "Login Berhasil anda adalah " . $nama . " sebagai Alumni !!");

							redirect(site_url('Alumni'));
						} else if ($data->status == 'Ditolak') {
							$this->session->set_flashdata('error', 'Akun anda sudah tidak aktif !!');
							redirect(site_url('Welcome'));
						} else if ($data->status == 'Belum Diverifikasi') {
							$this->session->set_flashdata('error', 'Akun anda belum diaktivasi !!');
							redirect(site_url('Welcome'));
						}
					} else {
						$this->session->set_flashdata('error', 'Password anda salah !!');
						redirect(site_url('Welcome'));
					}			
				} else {
					$this->session->set_flashdata('error', 'Username dan Password anda salah !!');
					redirect(site_url('Welcome'));
				}
			}
		} else {
			$this->session->set_flashdata('error', 'Pastikan form login di-lengkapi semua !!');
			redirect(site_url('Welcome'));
		}
	}

	public function register() 
	{	
		// $tes = "591d7c7c6396f4d1a877cf13b1fb36fe26f4634457fa30ced80b621e8a49e6d214e1adcc0425349d0d1af5795fd00437e9b5746a20f1a7adb9388c14b02d3852+tZEPzbTzx07FHkIUx+wsXciS8MpON74T5Y2xEsGa9o=";
		// echo($this->encryption->decrypt($tes));
		
		$data['title'] = "Register";
		$this->load->view('register', $data);
	}

	public function inputRegister() 
	{
		$post = $this->input->post();

    	$findRA = $this->RegistrasiAlumniM->findRA($post["txtNIM"], $post["txtNIK"], $post["txtEmail"], $post["txtTelepon"]);

    	if ($findRA) {
    		$this->session->set_flashdata("error", "Akun Alumni sudah ada, tidak boleh sama !!");
	        redirect(site_url('Welcome/register'));
    	} else {
			$result = $this->RegistrasiAlumniM->inputRegisterM($post["txtNIM"], $post["txtNIK"], $post["txtNama"], $post["txtAlamat"],
															   $post["txtTanggalLahir"], $post["txtTahunLulus"], $post["txtEmail"],
															   $this->encryption->encrypt($post["txtPassword"]), $post["txtTelepon"],
															   "Belum Diverifikasi", date('Y-m-d H:i:s'));
	        
	        if ($result) {
	        	$this->session->set_flashdata("success", "Berhasil Mendaftar, Tunggu Info Selanjutnya untuk Mengakses Tracer Study !!");
	        } else {
	        	$this->session->set_flashdata("error", "Pendaftaran Gagal, Data yang Dimasukan tidak sesuai !!");
	        }

	        redirect(site_url('Welcome/register'));
	    }
	}
}
