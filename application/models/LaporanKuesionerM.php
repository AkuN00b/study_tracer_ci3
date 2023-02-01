<?php defined('BASEPATH') or exit('No direct script access allowed');

class LaporanKuesionerM extends CI_Model
{
	private $_table = "ts_laporankuesioner";

	public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
}

?>