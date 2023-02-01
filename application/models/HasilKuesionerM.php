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
}

?>