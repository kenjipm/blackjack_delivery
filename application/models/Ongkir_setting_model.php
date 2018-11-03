<?php

class Ongkir_setting_model extends CI_Model {
	
	public $id;
	public $minimum_order;
	public $free_value;
	public $per_price;
	public $maximum_free;
	public $description;
	
	public function __construct()
	{
		parent::__construct();
		$id = 0;
		$minimum_order = 0;
		$free_value = 0;
		$per_price = 0;
		$maximum_free = 0;
		$description = "";
	}
	
	public function get_last($include_deleted=false)
	{
		$query_str = "
			SELECT id, minimum_order, free_value, per_price, maximum_free, description
			FROM ".TABLE_ONGKIR_SETTING."
			ORDER BY created_date DESC
		";
		
		$query = $this->db->query($query_str);
		
		$result = $query->row();
		
		return $result;
	}
	
	public function calculate_free_value($ongkir_setting, $order_value)
	{
		if ($order_value < $ongkir_setting->minimum_order)
		{
			return 0;
		}
		else
		{
			$free_value = floor($order_value / $ongkir_setting->per_price) * $ongkir_setting->free_value;
			return min($free_value, $ongkir_setting->maximum_free);
		}
	}
	
	public function insert($db_object)
	{
		$db_object['created_by'] = $this->session->username;
		$this->db->insert(TABLE_ONGKIR_SETTING, $db_object);
		return $this->db->insert_id();
	}
	
}

?>