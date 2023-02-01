<?php defined('BASEPATH') or exit('No direct script access allowed');

class JawabanKuesionerM extends CI_Model
{
	private $_table = "ts_jawabankuesioner";

    public function get()
    {
        return $this->db->query("SELECT jk.id_jawabanKuesioner, pku.kode, jk.nilaiJawaban, jk.deskripsiJawaban
                                 FROM ts_jawabanKuesioner jk
                                 INNER JOIN ts_pertanyaanKuesioner pku ON jk.id_pku = pku.id_pku
                                 WHERE jk.status = 'Aktif'");
    }

    public function getJawaban($id)
    {
        return $this->db->query("SELECT jk.id_jawabanKuesioner, jk.nilaiJawaban, jk.deskripsiJawaban, jk.textbox, jk.kode
                                 FROM ts_jawabanKuesioner jk
                                 INNER JOIN ts_pertanyaanKuesioner pku ON jk.id_pku = pku.id_pku
                                 WHERE jk.status = 'Aktif' AND pku.id_pku = '$id'");
    }

    public function getCountID()
    {
        return $this->db->query("SELECT jk.id_jawabanKuesioner, pku.kode, jk.nilaiJawaban, jk.deskripsiJawaban
                                 FROM ts_jawabanKuesioner jk
                                 INNER JOIN ts_pertanyaanKuesioner pku ON jk.id_pku = pku.id_pku");
    }

	public function getAll()
    {
        return $this->db->query("CALL ts_getDataJawabanKuesioner");
    }

    public function get_id($id) 
    {
    	return $this->db->get_where($this->_table, array('id_jawabanKuesioner' => $id));
    }

    public function save($nama, $id_jawabanKuesioner, $id_pku, $deskripsiJawaban, $kode, $nilaiJawaban, $textbox, $tanggal_sekarang)
    {
      	$sp = "CALL ts_InsertJawabanKuesioner(?, ?, ?, ?, ?, ?, ?, ?)";
		$data = array('Pid_jawabanKuesioner' => $id_jawabanKuesioner, 'Pid_pku' => $id_pku, 'PdeskripsiJawaban' => $deskripsiJawaban,
                      'Pkode' => $kode, 'PnilaiJawaban' => $nilaiJawaban,
					  'Ptextbox' => $textbox, 'Pnama' => $nama, 'Ptanggal_sekarang' => $tanggal_sekarang);

        $result = $this->db->query($sp, $data);

        if ($result) {
            return $result;
        } else {
        	return false;
        }
    }

    public function update($id, $nama, $id_pku, $deskripsiJawaban, $kode, $nilaiJawaban, $textbox, $tanggal_sekarang)
    {
		$sp = "CALL ts_UpdateJawabanKuesioner(?, ?, ?, ?, ?, ?, ?, ?)";
		$data = array('Pid' => $id, 'Pid_pku' => $id_pku, 
					  'PdeskripsiJawaban' => $deskripsiJawaban, 'Pkode' => $kode, 'PnilaiJawaban' => $nilaiJawaban,
					  'Ptextbox' => $textbox, 'Pnama' => $nama, 'Ptanggal_sekarang' => $tanggal_sekarang);

        $result = $this->db->query($sp, $data);

        if ($result) {
            return $result;
        } else {
        	return false;
        }
    }

    public function delete($id, $nama, $tanggal_sekarang) 
    {
		$sp = "CALL ts_DeleteJawabanKuesioner(?, ?, ?)";
    	$data = array('Pid' => $id, 'Pnama' => $nama, 'Ptanggal_sekarang' => $tanggal_sekarang);

      	return $this->db->query($sp, $data);
    }
}

?>