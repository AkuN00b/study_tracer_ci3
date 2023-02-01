<?php defined('BASEPATH') or exit('No direct script access allowed');

class ProvinsiM extends CI_Model
{
	private $_table = "ts_provinsi";

	public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
}

?>