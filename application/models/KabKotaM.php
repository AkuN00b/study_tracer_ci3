<?php defined('BASEPATH') or exit('No direct script access allowed');

class KabKotaM extends CI_Model
{
	private $_table = "ts_kabkota";

	public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
}

?>