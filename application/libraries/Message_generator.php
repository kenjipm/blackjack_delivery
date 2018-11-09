<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_generator {

	protected $CI;
	
	public function __construct()
	{
		// Assign the CodeIgniter super-object
		$this->CI =& get_instance();
		$this->CI->load->model('variables_model');
	}

    public function order_whatsapp($customer_name, $shipping_address, $shipping_method, $free_ongkir, $items)
	{
		$settings = $this->CI->variables_model->get('company_name, whatsapp_message');
		
		$message = str_replace(COMPANY_NAME_TEMPLATE, $settings->company_name, $settings->whatsapp_message);
		
		$message = urlencode($message);
		
        $order_message = "%0A";
		$order_message .= urlencode("*Nama:* ".$customer_name);
		$order_message .= "%0A";
		$order_message .= urlencode("*Alamat Kirim:* ".$shipping_address);
		$order_message .= "%0A";
		$order_message .= urlencode("*Metode Pengiriman:* ".$shipping_method);
		$order_message .= "%0A";
		$order_message .= urlencode("*Free Ongkir Didapat:* ".$free_ongkir);
		$order_message .= "%0A";
		$order_message .= urlencode("*Barang yang dipesan:*");
		$order_message .= "%0A";
		
		foreach ($items as $item)
		{
			$order_message .= urlencode(" - ".$item->name);
			$order_message .= ($item->sub_name_1 != "") ? urlencode(", ".$item->sub_name_1) : "";
			$order_message .= ($item->sub_name_2 != "") ? urlencode(", ".$item->sub_name_2) : "";
			$order_message .= urlencode(" = ".$item->quantity." pcs");
			$order_message .= "%0A";
		}
		
		$message = str_replace(urlencode(ORDERS_TEMPLATE), $order_message, $message);
		
		return $message;
	}

    public function order_line_at($customer_name, $shipping_address, $shipping_method, $free_ongkir, $items)
	{
		$settings = $this->CI->variables_model->get('company_name, line_at_message');
		
		$message = str_replace(COMPANY_NAME_TEMPLATE, $settings->company_name, $settings->line_at_message);
		
		$message = urlencode($message);
		
        $order_message = "%0A%0A";
		$order_message .= urlencode("Nama: ".$customer_name);
		$order_message .= "%0A";
		$order_message .= urlencode("Alamat Kirim: ".$shipping_address);
		$order_message .= "%0A";
		$order_message .= urlencode("Metode Pengiriman: ".$shipping_method);
		$order_message .= "%0A";
		$order_message .= urlencode("Free Ongkir Didapat: ".$free_ongkir);
		$order_message .= "%0A";
		$order_message .= urlencode("Barang yang dipesan:");
		$order_message .= "%0A";
		
		foreach ($items as $item)
		{
			$order_message .= urlencode(" - ".$item->name);
			$order_message .= ($item->sub_name_1 != "") ? urlencode(", ".$item->sub_name_1) : "";
			$order_message .= ($item->sub_name_2 != "") ? urlencode(", ".$item->sub_name_2) : "";
			$order_message .= urlencode(" = ".$item->quantity." pcs");
			$order_message .= "%0A";
		}
		
		$order_message .= "%0A";
		
		$message = str_replace(urlencode(ORDERS_TEMPLATE), $order_message, $message);
		
		return $message;
	}
}