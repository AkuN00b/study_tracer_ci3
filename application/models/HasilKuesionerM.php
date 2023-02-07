<?php defined('BASEPATH') or exit('No direct script access allowed');

class HasilKuesionerM extends CI_Model
{
	private $_table = "ts_hasilkuesioner";

	public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getCountID()
    {
        return $this->db->get($this->_table);
    }

    public function getDataHKBaseUser($nim)
    {
        $this->db->select('*');
        $this->db->where("nim = $nim");
        $this->db->group_start();
        $this->db->like('tanggal_pengisian', date("Y"));
        $this->db->group_end();
        $this->db->order_by('id_detailPeriode', 'ASC');

        $query = $this->db->get('ts_hasilkuesioner');
        // echo $this->db->last_query();
        return $query;

        // return $this->db->get_where($this->_table, array('nim' => $nim))->result();
    }

    public function chartPie()
    {
        return $this->db->query("SELECT djp.jenis_kuesioner, count(hk.id_detailPeriode) AS hitung FROM ts_hasilkuesioner hk INNER JOIN ts_detailjenisperiode djp ON djp.id_detailPeriode = hk.id_detailPeriode GROUP BY djp.jenis_kuesioner")->result();
    }

    public function saveJawaban($data)
    {
    	$result = $this->db->insert($this->_table, $data);

    	if ($result) {
            return $result;
        } else {
        	return false;
        }
    }
}

?>