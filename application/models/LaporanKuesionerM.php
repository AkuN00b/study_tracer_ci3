<?php defined('BASEPATH') or exit('No direct script access allowed');

class LaporanKuesionerM extends CI_Model
{
	private $_table = "ts_laporankuesioner";

	public function getAll($id)
    {
        $query = $this->db->query("SELECT * FROM ts_laporankuesioner lk
        						   INNER JOIN ts_hasilkuesioner hk ON lk.id_hasilKuesioner = hk.id_hasilKuesioner
        						   WHERE hk.id_detailPeriode = $id
        						   ORDER BY lk.id_hasilKuesioner");
        $result = $query->num_rows();
    	$query->free_result();

    	return $result;
    }

    public function getLaporan($id) {
    	$this->db->select("hk.id_hasilKuesioner");

		$unique_codes = $this->db->query("
		  SELECT DISTINCT lk.kode
		  FROM ts_laporankuesioner lk
		  INNER JOIN ts_hasilkuesioner hk ON hk.id_hasilKuesioner = lk.id_hasilKuesioner
		  WHERE hk.id_detailPeriode = $id
		")->result_array();

		foreach ($unique_codes as $code) {
		  $this->db->select("MAX(IF(kode = '{$code['kode']}', jawabanKuesioner, NULL)) AS '{$code['kode']}'");
		}

		$this->db->from("ts_laporankuesioner lk");
		$this->db->join('ts_hasilKuesioner hk', 'lk.id_hasilKuesioner = hk.id_hasilKuesioner');
		$this->db->where('hk.id_detailPeriode', $id);
		$this->db->group_by("lk.id_hasilKuesioner");
		$query = $this->db->get();

		return $query->result_array();
    }

    public function getHeaderLaporan($id) {
    	$unique_codes = $this->db->query("
		  SELECT DISTINCT lk.kode
		  FROM ts_laporankuesioner lk
		  INNER JOIN ts_hasilkuesioner hk ON hk.id_hasilKuesioner = lk.id_hasilKuesioner
		  WHERE hk.id_detailPeriode = $id
		");

		return $unique_codes->result_array();
    }

    public function saveJawaban($jawabanKuesioner, $kode, $idHK, $nama, $tanggal)
    {
    	$result = array();
    	$i = 0;

    	foreach($jawabanKuesioner AS $key => $val){
			$result[] = array(
		        'id_hasilKuesioner'    => $idHK,
		        'jawabanKuesioner'   	=> $_POST['jawabanKuesioner'][$key],
		        'kode'					=> $_POST['kode'][$key],
		        'created_by'			=> $nama,
		        'created_date'			=> $tanggal,
		        'modified_by'			=> $nama,
		        'modified_date'			=> $tanggal,
	        );
	    }      

	    //MULTIPLE INSERT TO DETAIL TABLE                  
	    $query = $this->db->insert_batch('ts_laporankuesioner', $result);

	    if ($query) {
            return $query;
        } else {
        	return false;
        }
    }
}

?>