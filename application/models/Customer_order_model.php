<?php

class Customer_order_model extends CI_Model {
	
	public function insert($db_object)
	{
		$this->db->insert(TABLE_CUSTOMER_ORDER, $db_object);
		return $this->db->insert_id();
	}
	
}

?>