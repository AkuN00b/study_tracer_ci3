<?php defined('BASEPATH') or exit('No direct script access allowed');

class PertanyaanKuesionerM extends CI_Model
{
	private $_table = "ts_pertanyaankuesioner";

    public function get()
    {
        return $this->db->query("SELECT pku.id_pku, pku.kode, pku.deskripsiPertanyaan, dp.jenis_kuesioner, dp.periode
                                 FROM ts_pertanyaanKuesioner pku
                                 INNER JOIN ts_detailJenisPeriode dp ON dp.id_detailPeriode = pku.id_detailPeriode
                                 WHERE pku.status = 'Aktif' AND (pku.jenis = 'Combo Box' OR pku.jenis = 'Radio Button' OR pku.jenis = 'Check Box')");
    }

    public function getUtama($id)
    {
        return $this->db->query("SELECT pku.id_pku, pku.kode, pku.deskripsiPertanyaan, pku.jenis
                                 FROM ts_pertanyaanKuesioner pku
                                 INNER JOIN ts_detailJenisPeriode dp ON dp.id_detailPeriode = pku.id_detailPeriode
                                 WHERE pku.status = 'Aktif' AND pku.id_detailPeriode = $id");
    }

    public function getCountID()
    {
        return $this->db->query("SELECT * FROM ts_pertanyaanKuesioner");
    }

    public function getCountAktif()
    {
      return $this->db->query("SELECT pku.id_pku, pku.kode, pku.deskripsiPertanyaan, pku.jenis
                                 FROM ts_pertanyaanKuesioner pku
                                 INNER JOIN ts_detailJenisPeriode dp ON dp.id_detailPeriode = pku.id_detailPeriode
                                 WHERE pku.status = 'Aktif'");
    }

    public function getTurunan()
    {
        return $this->db->query("SELECT pku.id_pku, pku.kode, pku.deskripsiPertanyaan, dp.jenis_kuesioner, dp.periode
                                 FROM ts_pertanyaanKuesioner pku
                                 INNER JOIN ts_detailJenisPeriode dp ON dp.id_detailPeriode = pku.id_detailPeriode
                                 WHERE pku.pertanyaan_utama = 'Tidak' AND pku.status = 'Aktif'");
    }

    public function getUtamaCopy($id)
    {
      return $this->db->query("SELECT pku.id_pku
                                 FROM ts_pertanyaanKuesioner pku
                                 WHERE pku.status = 'Aktif' AND pku.pertanyaan_utama = 'Ya' AND pku.id_detailPeriode = $id
                                 ORDER BY pku.id_pku");
    }

    public function getTurunanCopy($id)
    {
      return $this->db->query("SELECT pku.id_pku
                                 FROM ts_pertanyaanKuesioner pku
                                 WHERE pku.status = 'Aktif' AND pku.pertanyaan_utama = 'Tidak' AND pku.id_detailPeriode = $id
                                 ORDER BY pku.id_pku");
    }

	public function getAll()
    {
        return $this->db->query("CALL ts_getDataPertanyaanKuesioner");
    }

    public function get_id($id) 
    {
      	return $this->db->get_where($this->_table, array('id_pku' => $id));
    }

    public function findPK($kode, $id_detailPeriode)
    {
      $query = $this->db->query("SELECT * FROM ts_pertanyaankuesioner WHERE status = 'Aktif' AND id_detailPeriode = '$id_detailPeriode' AND kode = '$kode'");

      if ($query->result()) {
        return true;
      } else {
        return false;
      }
    }

    public function save($nama, $id_pku, $deskripsiPertanyaan, $jenis, $kode, $id_detailPeriode, $pertanyaan_utama, $tanggal_sekarang)
    {
      	$sp = "CALL ts_InsertPertanyaanKuesioner(?, ?, ?, ?, ?, ?, ?, ?)";
		$data = array('Pid_pku' => $id_pku, 'PdeskripsiPertanyaan' => $deskripsiPertanyaan, 'Pjenis' => $jenis,
					  'Pkode' => $kode, 'Pid_detailPeriode' => $id_detailPeriode,
					  'Ppertanyaan_utama' => $pertanyaan_utama, 'Pnama' => $nama, 'Ptanggal_sekarang' => $tanggal_sekarang);

        $result = $this->db->query($sp, $data);

        if ($result) {
            return $result;
        } else {
        	return false;
        }
    }

    public function update($id, $nama, $deskripsiPertanyaan, $jenis, $kode, $id_detailPeriode, $pertanyaan_utama, $tanggal_sekarang)
    {
      $result = $this->db->query("UPDATE ts_pertanyaankuesioner
                                    SET deskripsiPertanyaan = '$deskripsiPertanyaan',
                                        jenis = '$jenis',
                                        kode = '$kode',
                                        id_detailPeriode = '$id_detailPeriode',
                                        pertanyaan_utama = '$pertanyaan_utama',
                                        modified_by = '$nama',
                                        modified_date = '$tanggal_sekarang'
                                    WHERE id_pku = '$id'");

        if ($result) {
            return $result;
        } else {
        	return false;
        }
    }

    public function delete($id, $nama, $tanggal_sekarang) 
    {
		$sp = "CALL ts_DeletePertanyaanKuesioner(?, ?, ?)";
    	$data = array('Pid' => $id, 'Pnama' => $nama, 'Ptanggal_sekarang' => $tanggal_sekarang);

      	return $this->db->query($sp, $data);
    }

    public function postCopy($id_detailPeriodeAsal, $id_detailPeriodeKe, $nama, $tanggal_sekarang)
    {
      $result = $this->db->query("INSERT INTO ts_pertanyaankuesioner (deskripsiPertanyaan, kode, id_detailPeriode, 
                                  pertanyaan_utama, jenis, created_by, created_date, modified_by, modified_date, status)
                                  SELECT deskripsiPertanyaan, kode, '$id_detailPeriodeKe', pertanyaan_utama, jenis, '$nama', '$tanggal_sekarang', '$nama', '$tanggal_sekarang', 'Aktif'
                                  FROM ts_pertanyaankuesioner
                                  WHERE id_detailPeriode = $id_detailPeriodeAsal AND status = 'Aktif' AND pertanyaan_utama = 'Ya';
                                ");

      if ($result) {
          return $result;
      } else {
          return false;
      }
    }

    public function postCopyTurunan($id_pku, $id_detailPeriodeKe, $nama, $tanggal_sekarang)
    {
      $result = $this->db->query("INSERT INTO ts_pertanyaankuesioner (deskripsiPertanyaan, kode, id_detailPeriode, 
                                  pertanyaan_utama, jenis, created_by, created_date, modified_by, modified_date, status)
                                  SELECT deskripsiPertanyaan, kode, '$id_detailPeriodeKe', pertanyaan_utama, jenis, '$nama', '$tanggal_sekarang', '$nama', '$tanggal_sekarang', 'Aktif'
                                  FROM ts_pertanyaankuesioner
                                  WHERE id_pku = '$id_pku' AND status = 'Aktif';
                                ");

      if ($result) {
          return $result;
      } else {
          return false;
      }
    }

    public function getIDCopy($deskripsiPertanyaan, $id_detailPeriodeKe) 
    {
      return $this->db->query("SELECT pk.id_pku FROM ts_pertanyaanKuesioner pk
                        WHERE pk.id_detailPeriode = '$id_detailPeriodeKe' AND pk.deskripsiPertanyaan = '$deskripsiPertanyaan'");
    }
}

?>