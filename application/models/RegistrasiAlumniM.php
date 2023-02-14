<?php defined('BASEPATH') or exit('No direct script access allowed');

class RegistrasiAlumniM extends CI_Model
{
	private $_table = "ts_registrasialumni";

	public function get()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getAllCount()
    {
        return $this->db->query("SELECT * FROM ts_registrasialumni");
    }

	public function getAll()
    {
        return $this->db->query("CALL ts_getDataAlumni");
    }

    public function getTOP5()
    {
        return $this->db->query("SELECT * FROM ts_registrasialumni
                                WHERE status = 'Belum Diverifikasi'
                                ORDER BY id ASC
                                LIMIT 5;");
    }

    public function getForUpdate($id)
    {
        return $this->db->query("CALL ts_getDataForUpdateAlumni(?)", array('Pid' => $id));
    }

    public function getByUsernamePasswordAlumni($username) {
	    $data = $this->db->get_where($this->_table, array('nim' => $username))->row();
	    return $data;
	}

    public function findRA($nim, $nik, $email, $telepon)
    {
      $query = $this->db->query("SELECT * FROM ts_registrasialumni WHERE (status = 'Belum Diverifikasi' OR status = 'Diterima') AND (nim = '$nim' OR nik = '$nik' OR email = '$email' OR telepon = '$telepon')");

      if ($query->result()) {
        return true;
      } else {
        return false;
      }
    }

    public function findNPWP($npwp)
    {
      $query = $this->db->query("SELECT * FROM ts_registrasialumni WHERE (status = 'Diterima') AND (npwp = '$npwp')");

      if ($query->result()) {
        return true;
      } else {
        return false;
      }
    }

    public function saveNPWP($nama, $id, $npwp, $tanggalSekarang) {
        return $this->db->query("
            UPDATE ts_registrasialumni
            SET npwp = $npwp,
            modified_by = '$nama',
            modified_date = '$tanggalSekarang'
            WHERE id = $id
        ");
    }

    public function chartBar()
    {
        return $this->db->query("SELECT tahun_lulus, count(tahun_lulus) AS hitung FROM ts_registrasialumni GROUP BY tahun_lulus")->result();
    }

    public function chartDoughnut()
    {
        return $this->db->query("SELECT status, count(status) AS hitung FROM ts_registrasialumni GROUP BY status")->result();
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