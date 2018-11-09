<?php

class Variables_model extends CI_Model {
	
	public function get($field)
	{
		$query_str = "
			SELECT $field
			FROM ".TABLE_VARIABLES."
		";
		
		$query = $this->db->query($query_str);
		
		$result = $query->row();
		
		return $result;
	}
	
	public function update($db_object)
	{
		return $this->db->update(TABLE_VARIABLES, $db_object);
	}
	
}

?>