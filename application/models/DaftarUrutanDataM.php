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
        return $this->db->query("SELECT dud.id, dud.kode, dud.status, djp.jenis_kuesioner, djp.periode
                                 FROM ts_daftarurutandata dud
                                 INNER JOIN ts_detailjenisperiode djp ON dud.id_detailPeriode = djp.id_detailPeriode");
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

    public function save($nama, $kode, $id_detailPeriode, $tanggal_sekarang)
    {
      	$sp = "CALL ts_InsertDaftarUrutanData(?, ?, ?, ?)";
		$data = array('Pnama' => $nama, 'Pkode' => $kode, 'Pid_detailPeriode' => $id_detailPeriode,
					  'Ptanggal_sekarang' => $tanggal_sekarang);

        $result = $this->db->query($sp, $data);

        if ($result) {
            return $result;
        } else {
        	return false;
        }
    }

    public function update($id, $nama, $kode, $id_detailPeriode, $tanggal_sekarang)
    {
        $result = $this->db->query("UPDATE ts_daftarurutandata
                                    SET kode = '$kode',
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
}

?>