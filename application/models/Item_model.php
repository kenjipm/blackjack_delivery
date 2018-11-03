<?php

class Item_model extends CI_Model {
	
	public $id;
	public $name;
	public $sub_name_1;
	public $sub_name_2;
	public $description_long;
	public $stock;
	public $price;
	
	public function __construct()
	{
		parent::__construct();
		$id = 0;
		$name = "";
		$sub_name_1 = "";
		$sub_name_2 = "";
		$description_long = "";
		$stock = 0;
		$price = 0;
	}
	
	public function get_all($include_deleted=false)
	{
		$query_str = "
			SELECT id, name, sub_name_1, sub_name_2, description_long, stock, price
			FROM ".TABLE_ITEM."
			WHERE ".(!$include_deleted?"is_deleted = 0 AND":"")."
				1 = 1
		";
		
		$query = $this->db->query($query_str);
		
		$result = $query->result();
		
		return $result;
	}
	
	public function get($id, $include_deleted=false)
	{
		$query_str = "
			SELECT id, name, sub_name_1, sub_name_2, description_long, stock, price
			FROM ".TABLE_ITEM."
			WHERE ".(!$include_deleted?"is_deleted = 0 AND":"")."
				id = $id
		";
		
		$query = $this->db->query($query_str);
		
		$result = $query->row();
		
		return $result;
	}
	
	public function insert($db_object)
	{
		$db_object['created_by'] = $this->session->username;
		$db_object['updated_by'] = $this->session->username;
		$this->db->insert(TABLE_ITEM, $db_object);
		
		return $this->db->insert_id();
	}
	
	public function update($db_object)
	{
		$db_object['updated_by'] = $this->session->username;
		$this->db->where('id', $db_object['id']);
		$this->db->update(TABLE_ITEM, $db_object);
		
		return ($this->db->affected_rows() > 0) ? true : false;
	}
	
	public function delete($id)
	{
		$this->db->set('is_deleted', 1);
		$this->db->where('id', $id);
		$this->db->update(TABLE_ITEM);
		
		return ($this->db->affected_rows() > 0) ? true : false;
	}
	
}

?>