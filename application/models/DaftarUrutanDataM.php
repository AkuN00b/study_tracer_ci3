<?php defined('BASEPATH') or exit('No direct script access allowed');

class DaftarUrutanDataM extends CI_Model
{
	private $_table = "ts_daftarurutandata";

    public function get($id)
    {
        return $this->db->query("SELECT * FROM ts_daftarurutandata WHERE status = 'Aktif' AND id_detailPeriode = $id
                                 ORDER BY id ASC");
    }

    public function getHeaderLaporan($id)
    {
        return $this->db->query("SELECT * FROM ts_daftarurutandata WHERE status = 'Aktif' AND id_detailPeriode = $id
                                 ORDER BY id ASC");
    }

	public function getAll()
    {
        return $this->db->query("SELECT dud.id, dud.kode, dud.alias, dud.status, djp.jenis_kuesioner, djp.periode
                                 FROM ts_daftarurutandata dud
                                 INNER JOIN ts_detailjenisperiode djp ON dud.id_detailPeriode = djp.id_detailPeriode
                                 WHERE dud.status = 'Aktif'
                                 ORDER BY dud.id ASC");
    }

    public function get_id($id) 
    {
    	return $this->db->get_where($this->_table, array('id' => $id));
    }

    public function findDUD($kode, $id_detailPeriode)
    {
      $query = $this->db->query("SELECT * FROM ts_daftarurutandata WHERE status = 'Aktif' AND kode = '$kode' AND id_detailPeriode = '$id_detailPeriode'");

      if ($query->result()) {
        return true;
      } else {
        return false;
      }
    }

    public function save($nama, $kode, $alias, $id_detailPeriode, $tanggal_sekarang)
    {
      	$sp = "CALL ts_InsertDaftarUrutanData(?, ?, ?, ?, ?)";
		$data = array('Pnama' => $nama, 'Pkode' => $kode, 'Pid_detailPeriode' => $id_detailPeriode,
					  'Ptanggal_sekarang' => $tanggal_sekarang, 'Palias' => $alias);

        $result = $this->db->query($sp, $data);

        if ($result) {
            return $result;
        } else {
        	return false;
        }
    }

    public function update($id, $nama, $kode, $alias, $id_detailPeriode, $tanggal_sekarang)
    {
        $result = $this->db->query("UPDATE ts_daftarurutandata
                                    SET kode = '$kode',
                                        alias = '$alias',
                                        id_detailPeriode = $id_detailPeriode,
                                        modified_by = '$nama',
                                        modified_date = '$tanggal_sekarang'
                                    WHERE id = $id");

        if ($result) {
            return $result;
        } else {
        	return false;
        }
    }

    public function delete($id, $nama, $tanggal_sekarang) 
    {
		$sp = "CALL ts_DeleteDaftarUrutanData(?, ?, ?)";
    	$data = array('Pid' => $id, 'Pnama' => $nama, 'Ptanggal_sekarang' => $tanggal_sekarang);

      	return $this->db->query($sp, $data);
    }

    public function postCopy($id_detailPeriodeAsal, $id_detailPeriodeKe, $nama, $tanggal_sekarang)
    {
        $result = $this->db->query("INSERT INTO ts_daftarurutandata (kode, alias, id_detailPeriode, created_by, created_date, modified_by, modified_date, status)
                                    SELECT kode, alias, '$id_detailPeriodeKe', '$nama', '$tanggal_sekarang', '$nama', '$tanggal_sekarang', 'Aktif'
                                    FROM ts_daftarurutandata
                                    WHERE id_detailPeriode = $id_detailPeriodeAsal AND status = 'Aktif'");

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}

?>