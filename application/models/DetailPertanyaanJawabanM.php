<?php defined('BASEPATH') or exit('No direct script access allowed');

class DetailPertanyaanJawabanM extends CI_Model
{
	private $_table = "ts_detailpertanyaanjawaban";

    public function get()
    {
        return $this->db->get($this->_table)->result();
    }

	public function getAll()
    {
        return $this->db->query("CALL ts_getDataDetailPertanyaanJawaban");
    }

    public function get_id($id) 
    {
        return $this->db->get_where($this->_table, array('id_detailPertanyaanJawaban' => $id));
    }

    public function save($nama, $id_jawabanKuesioner, $id_pku_answer, $tanggal_sekarang)
    {
      	$sp = "CALL ts_InsertDetailPertanyaanJawaban(?, ?, ?, ?)";
		$data = array('Pnama' => $nama, 'Pid_jawabanKuesioner' => $id_jawabanKuesioner, 'Pid_pku_answer' => $id_pku_answer,
					  'Ptanggal_sekarang' => $tanggal_sekarang);

        $result = $this->db->query($sp, $data);

        if ($result) {
            return $result;
        } else {
        	return false;
        }
    }

    public function update($id, $nama, $id_jawabanKuesioner, $id_pku_answer, $tanggal_sekarang)
    {
		$sp = "CALL ts_UpdateDetailPertanyaanJawaban(?, ?, ?, ?, ?)";
		$data = array('Pid' => $id, 'Pnama' => $nama, 'Pid_jawabanKuesioner' => $id_jawabanKuesioner, 
					  'Pid_pku_answer' => $id_pku_answer, 'Ptanggal_sekarang' => $tanggal_sekarang);

        $result = $this->db->query($sp, $data);

        if ($result) {
            return $result;
        } else {
        	return false;
        }
    }

    public function delete($id, $nama, $tanggal_sekarang) 
    {
		$sp = "CALL ts_DeleteDetailPertanyaanJawaban(?, ?, ?)";
    	$data = array('Pid' => $id, 'Pnama' => $nama, 'Ptanggal_sekarang' => $tanggal_sekarang);

      	return $this->db->query($sp, $data);
    }
}

?>