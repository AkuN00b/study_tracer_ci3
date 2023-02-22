<?php defined('BASEPATH') or exit('No direct script access allowed');

class AdminM extends CI_Model
{
	private $_table = "ts_admin";

	public function getAll()
    {
        return $this->db->get($this->_table);
    }
	
	public function getByUsernamePassword($username) {
	    $data = $this->db->get_where($this->_table, array('username' => $username))->row();
	    return $data;
	}

	public function saveKodePT($kodePT) 
	{
		return $this->db->query("UPDATE ts_admin
								 SET kodePT = '$kodePT'");
	}
}

?>