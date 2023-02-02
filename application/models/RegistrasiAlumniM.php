<?php defined('BASEPATH') or exit('No direct script access allowed');

class RegistrasiAlumniM extends CI_Model
{
	private $_table = "ts_registrasialumni";

	public function get()
    {
        return $this->db->get($this->_table)->result();
    }

	public function getAll()
    {
        return $this->db->query("CALL ts_getDataAlumni");
    }

    public function getForUpdate($id)
    {
        return $this->db->query("CALL ts_getDataForUpdateAlumni(?)", array('Pid' => $id));
    }

    public function getByUsernamePasswordAlumni($username) {
	    $data = $this->db->get_where($this->_table, array('nim' => $username))->row();
	    return $data;
	}

	public function inputRegisterM($nim, $nik, $nama, $alamat, $tanggalLahir, $tahunLulus, $email, $password, $telepon, $status, $tanggalSekarang) {
		$sp_inputRegisterM = "CALL ts_InsertRegistrasiAlumni(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$data = array('Pnim' => $nim, 'Pnik' => $nik, 'Pnama' => $nama, 'Palamat' => $alamat,
					  'Ptanggal_lahir' => $tanggalLahir, 'Ptahun_lulus' => $tahunLulus, 'Pemail' => $email, 'Ppassword' => $password,
					  'Ptelepon' => $telepon, 'Pstatus' => $status, 'Ptanggal_sekarang' => $tanggalSekarang);

        $result = $this->db->query($sp_inputRegisterM, $data);

        if ($result) {
            return $result;
        } else {
        	return false;
        }
	}

    public function updateDiterimaM($id, $nama, $tanggal_sekarang) 
    {
        $sp = "CALL ts_UpdateAlumniDiterima(?, ?, ?)";
        $data = array('Pid' => $id, 'PnamaAdmin' => $nama, 'Ptanggal_sekarang' => $tanggal_sekarang);

        return $this->db->query($sp, $data);
    }

    public function updateDitolakM($id, $nama, $tanggal_sekarang) 
    {
        $sp = "CALL ts_UpdateAlumniDitolak(?, ?, ?)";
        $data = array('Pid' => $id, 'PnamaAdmin' => $nama, 'Ptanggal_sekarang' => $tanggal_sekarang);

        return $this->db->query($sp, $data);
    }

    public function updatePassword($id, $password, $nama, $tanggal_sekarang) 
    {
        $sp = "CALL ts_UpdateAlumniResetPassword(?, ?, ?, ?)";
        $data = array('Pid' => $id, 'Ppassword' => $password, 'PnamaAdmin' => $nama, 'Ptanggal_sekarang' => $tanggal_sekarang);

        return $this->db->query($sp, $data);
    }

    public function updateAkun($id, $namaAlumni, $nama, $tahunLulus, $tanggal_sekarang) 
    {
        return $this->db->query("UPDATE ts_registrasialumni
                                 SET nama = '$namaAlumni',
                                 tahun_lulus = '$tahunLulus',
                                 modified_by = '$nama',
                                 modified_date = '$tanggal_sekarang'
                                 WHERE id = $id;");
    }
}

?>