<?php defined('BASEPATH') or exit('No direct script access allowed');

class KabKotaM extends CI_Model
{
	private $_table = "ts_kabkota";

	public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getID($id)
    {
        return $this->db->get_where($this->_table, array("kabkota_provinsi_id" => $id))->result();
    }
}

?>