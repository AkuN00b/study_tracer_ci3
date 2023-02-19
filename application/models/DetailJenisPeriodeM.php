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
        return $this->db->query("SELECT * FROM ts_detailjenisperiode WHERE status = 'Aktif' ORDER BY id_detailPeriode ASC");
    }

    public function getAllAda()
    {
        return $this->db->query("SELECT djp.id_detailPeriode, djp.jenis_kuesioner, djp.periode FROM ts_detailjenisperiode djp INNER JOIN ts_pertanyaankuesioner pk ON pk.id_detailPeriode = djp.id_detailPeriode WHERE djp.status = 'Aktif' AND pk.status = 'Aktif' GROUP BY djp.id_detailPeriode");
    }

    public function getAllKosong()
    {
        return $this->db->query("SELECT * FROM ts_detailjenisperiode 
WHERE NOT EXISTS (SELECT * FROM ts_pertanyaankuesioner WHERE ts_detailjenisperiode.id_detailPeriode = ts_pertanyaankuesioner.id_detailPeriode AND ts_pertanyaankuesioner.status = 'Aktif') AND ts_detailjenisperiode.status = 'Aktif'");
    }

    public function getCountAktif() 
    {
        return $this->db->get_where($this->_table, array('status' => 'Aktif'));
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

    public function get_id($id) 
    {
        return $this->db->get_where($this->_table, array('id_detailPeriode' => $id));
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