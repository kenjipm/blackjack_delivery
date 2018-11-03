<?php

class Order_item_model extends CI_Model {
	
	public function insert_batch($db_objects)
	{
		$this->db->insert_batch(TABLE_ORDER_ITEM, $db_objects);
		return ($this->db->affected_rows() == count($db_objects)) ? true : false;
	}
	
}

?>