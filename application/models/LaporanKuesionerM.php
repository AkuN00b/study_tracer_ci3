<?php defined('BASEPATH') or exit('No direct script access allowed');

class LaporanKuesionerM extends CI_Model
{
	private $_table = "ts_laporankuesioner";

	public function getAll()
    {
        return $this->db->query("SELECT * FROM ts_laporankuesioner ORDER BY id_hasilKuesioner");
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