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
	
	public function get_all($search_terms="", $include_no_stock=true, $include_deleted=false)
	{
		$query_str = "
			SELECT id, name, image_path, sub_name_1, sub_name_2, description_long, stock, price, is_new, is_best_seller
			FROM ".TABLE_ITEM."
			WHERE ".(!$include_deleted?"is_deleted = 0 AND":"")."
				1 = 1
		";
		
		if ($search_terms != "")
		{
			$search_terms = explode(" ", $search_terms);
			foreach ($search_terms as $search_term)
			{
				$search_term = $this->db->escape_like_str($search_term);
				$query_str .= " AND (
					name LIKE '%$search_term%' OR
					sub_name_1 LIKE '%$search_term%' OR
					sub_name_2 LIKE '%$search_term%' OR
					description_long LIKE '%$search_term%'
				) ";
			}
		}
		
		$query_str .= " ORDER BY
							(CASE WHEN stock <= 0 THEN 1 ELSE 0 END) ASC,
							updated_date DESC";
		
		$query = $this->db->query($query_str);
		
		$result = $query->result();
		
		return $result;
	}
	
	public function get($id, $include_deleted=false)
	{
		$query_str = "
			SELECT id, name, image_path, sub_name_1, sub_name_2, description_long, stock, price, is_new, is_best_seller
			FROM ".TABLE_ITEM."
			WHERE ".(!$include_deleted?"is_deleted = 0 AND":"")."
				id = $id
		";
		
		$query = $this->db->query($query_str);
		
		$result = $query->row();
		
		return $result;
	}
	
	public function add_stock($id, $value)
	{
		$this->db->set('stock', 'stock + '.$value, FALSE);
		$this->db->where('id', $id);
		return $this->db->update(TABLE_ITEM);
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
		$db_object['updated_date'] = date("Y-m-d H:i:s");
		$db_object['updated_by'] = $this->session->username;
		$this->db->where('id', $db_object['id']);
		return $this->db->update(TABLE_ITEM, $db_object);
		
		// return ($this->db->affected_rows() > 0) ? true : false;
	}
	
	public function delete($id)
	{
		$this->db->set('is_deleted', 1);
		$this->db->where('id', $id);
		return $this->db->update(TABLE_ITEM);
		
		// return ($this->db->affected_rows() > 0) ? true : false;
	}
	
}

?>