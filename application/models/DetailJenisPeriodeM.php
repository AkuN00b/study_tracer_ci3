<?php defined('BASEPATH') or exit('No direct script access allowed');

class DetailJenisPeriodeM extends CI_Model
{
	private $_table = "ts_detailjenisperiode";

    public function get()
    {
        $yNow = date('Y');

        return $this->db->query("SELECT * FROM ts_detailjenisperiode WHERE status = 'Aktif'
                                 ORDER BY id_detailPeriode ASC");
    }

    public function getComboBox()
    {
        return $this->db->query("SELECT * FROM ts_detailjenisperiode WHERE status = 'Aktif'");
    }

	public function getAll()
    {
        return $this->db->query("CALL ts_getDataDetailJenisPeriode");
    }

    public function getCountAktif() 
    {
        return $this->db->get_where($this->_table, array('status' => 'Aktif'));
    }

    public function get_id($id) 
    {
    	return $this->db->get_where($this->_table, array('id_detailPeriode' => $id));
    }

    public function findDJP($jenis_kuesioner, $periode)
    {
      $query = $this->db->query("SELECT * FROM ts_detailjenisperiode WHERE status = 'Aktif' AND jenis_kuesioner = '$jenis_kuesioner' AND periode = '$periode'");

      if ($query->result()) {
        return true;
      } else {
        return false;
      }
    }

    public function save($nama, $jenis_kuesioner, $periode, $tanggal_sekarang)
    {
      	$sp = "CALL ts_InsertDetailJenisPeriode(?, ?, ?, ?)";
		$data = array('Pnama' => $nama, 'Pjenis_kuesioner' => $jenis_kuesioner, 'Pperiode' => $periode,
					  'Ptanggal_sekarang' => $tanggal_sekarang);

        $result = $this->db->query($sp, $data);

        if ($result) {
            return $result;
        } else {
        	return false;
        }
    }

    public function update($id, $nama, $jenis_kuesioner, $periode, $tanggal_sekarang)
    {
		$sp = "CALL ts_UpdateDetailJenisPeriode(?, ?, ?, ?, ?)";
		$data = array('Pid' => $id, 'Pnama' => $nama, 'Pjenis_kuesioner' => $jenis_kuesioner, 'Pperiode' => $periode,
					  'Ptanggal_sekarang' => $tanggal_sekarang);

        $result = $this->db->query($sp, $data);

        if ($result) {
            return $result;
        } else {
        	return false;
        }
    }

    public function delete($id, $nama, $tanggal_sekarang) 
    {
		$sp = "CALL ts_DeleteDetailJenisPeriode(?, ?, ?)";
    	$data = array('Pid' => $id, 'Pnama' => $nama, 'Ptanggal_sekarang' => $tanggal_sekarang);

      	return $this->db->query($sp, $data);
    }
}

?>