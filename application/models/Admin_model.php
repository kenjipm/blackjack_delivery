<?php

class Admin_model extends CI_Model {
	
	public function get_from_login($username, $password, $include_deleted=false)
	{
		$query_str = "
			SELECT id, name, username, email, password
			FROM ".TABLE_ADMIN."
			WHERE ".(!$include_deleted?"is_deleted = 0 AND":"")."
				username = '$username'
		";
		
		$query = $this->db->query($query_str);
		
		$result = $query->row();
		
		if ($result != null)
		{
			if (password_verify($password, $result->password))
			{
				return $result;
			}
		}
		return null;
	}
	
	public function create_password($username, $password)
	{
		$query_str = "
			UPDATE ".TABLE_ADMIN."
			SET password = '".password_hash($password, PASSWORD_DEFAULT)."'
			WHERE is_deleted = 0
				AND username = '$username'
				AND password = ''
		";
		
		$query = $this->db->query($query_str);
		
		return ($this->db->affected_rows() > 0) ? true : false;
	}
	
}

?>