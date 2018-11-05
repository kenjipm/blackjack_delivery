<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	/********************
	    VIEWS
	 ********************/
	
	public function index()
	{
		$this->order(); // default nya ke order_view
	}
	
	public function order()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('Customer/order');
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['return_url'] = $this->input->get('return_url') ?? "";
		$this->load->view('Customer/order', $data);
		
		// Load View Templates
		$this->load->view('Customer/order_item_list_template');
		$this->load->view('Customer/order_item_detail_template');
		$this->load->view('Customer/order_checkout_template');
		
		// Load Footer
		$this->load->view('footer');
	}
	
	/********************
	    VIEW LOADERS
	 ********************/
	
	public function load_order_item_list()
	{
		$search_terms = $this->input->post('search_terms');
		
		$result = array();
		
		$result['err'] = 0;
		
		$this->load->model('item_model');
		$items = $this->item_model->get_all($search_terms);
		
		if ($items != null)
		{
			$this->load->library('uploader');
			$this->load->library('text_renderer');
			foreach ($items as $item)
			{
				$item->name = $item->name . ($item->sub_name_1?", ".$item->sub_name_1:"") . ($item->sub_name_2?", ".$item->sub_name_2:"");
				$item->price_str = $this->text_renderer->to_rupiah($item->price);
				if (count($item->description_long) > DESCRIPTION_CHAR_LIMIT)
				{
					$item->description_long = substr($item->description_long, 0, DESCRIPTION_CHAR_LIMIT - 2)."...";					
				}
				$item->image_path = $this->uploader->get_thumbnail_file($item->image_path);
			}
			$result['items'] = $items;
		}
		else
		{
			// $result['err'] = 1;
			$result['items'] = array();
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($result);
	}
	
	public function load_order_item_detail()
	{
		$id = $this->input->post('id');
		
		$result = array();
		
		$result['err'] = 0;
		
		$this->load->model('item_model');
		$item = $this->item_model->get($id);
		
		if ($item != null)
		{
			$result['item'] = $item;
		}
		else
		{
			$result['err'] = 1;
			$result['item'] = new item_model();
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($result);
	}
	
	public function load_checkout_summary()
	{
		$checkout_items = $this->input->post('items');
		
		$result = array();
		
		$result['err'] = 0;
		
		$this->load->model('item_model');
		$this->load->library('text_renderer');
		$result['summary'] = array();
		$result['summary']['subtotal'] = 0;
		$result['summary']['items'] = array();
		foreach($checkout_items as $i => $checkout_item)
		{
			$item = $this->item_model->get($checkout_item['id']);
			
			if ($item != null)
			{
				$item->name = $item->name . ($item->sub_name_1?", ".$item->sub_name_1:"") . ($item->sub_name_2?", ".$item->sub_name_2:"");
				$item->price_str = $this->text_renderer->to_rupiah($item->price);
				$item->quantity = $checkout_item['quantity'];
				$item->total = $checkout_item['quantity'] * $item->price;
				$item->total_str = $this->text_renderer->to_rupiah($item->total);
				$result['summary']['items'][] = $item;
			}
			else
			{
				$result['err'] = 1;
				$result['summary']['items'] = array();
				break;
			}
			
			$result['summary']['subtotal'] += $item->total;
		}
		
		if ($result['err'] == 0)
		{
			$this->load->model('ongkir_setting_model');
			$ongkir_setting = $this->ongkir_setting_model->get_last();
			$free_ongkir = $this->ongkir_setting_model->calculate_free_value($ongkir_setting, $result['summary']['subtotal']);
			$result['summary']['free_ongkir'] = $free_ongkir;
			$result['summary']['free_ongkir_str'] = $this->text_renderer->to_rupiah($free_ongkir);
			
			$result['summary']['subtotal_str'] = $this->text_renderer->to_rupiah($result['summary']['subtotal']);
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($result);
	}
	
	public function load_order_item_list_template()
	{
		$this->load->view('Customer/order_item_list_template');
	}
	
	/********************
	    ACTIONS
	 ********************/
	 
	public function order_do()
	{
		$customer_name = $this->input->post('customer_name');
		$shipping_address = $this->input->post('shipping_address');
		$shipping_method = $this->input->post('shipping_method');
		$checkout_items = $this->input->post('items');
		
		$result = array();
		
		$result['err'] = 0;
		
		$this->load->model('ongkir_setting_model');
		$this->load->model('customer_order_model');
		
		$ongkir_setting = $this->ongkir_setting_model->get_last();
		$customer_order = array();
		$customer_order['ongkir_setting_id'] = $ongkir_setting->id;
		$customer_order['customer_name'] = $customer_name;
		$customer_order['shipping_address'] = $shipping_address;
		$customer_order['shipping_method'] = $shipping_method;
		$customer_order_id = $this->customer_order_model->insert($customer_order);
		
		if (!$customer_order_id)
		{
			$result['err'] = 1;
			$result['whatsapp_message'] = "";
		}
		else
		{
			$this->load->model('order_item_model');
			$this->load->model('item_model');
			$order_items = array();
			$items = array();
			$order_value = 0;
			foreach ($checkout_items as $i => $checkout_item)
			{
				$item = $this->item_model->get($checkout_item['id']);
				$item->quantity = $checkout_item['quantity'];
				$items[$i] = $item;
				
				$order_items[$i]['customer_order_id'] = $customer_order_id;
				$order_items[$i]['item_id'] = $checkout_item['id'];
				$order_items[$i]['quantity'] = $checkout_item['quantity'];
				$order_items[$i]['price'] = $item->price;
				
				$order_value += $checkout_item['quantity'] * $item->price;
			}
			$query_result = $this->order_item_model->insert_batch($order_items);
			
			if ($query_result)
			{
				$this->load->library('text_renderer');
				$this->load->library('message_generator');
				
				$free_ongkir = $this->ongkir_setting_model->calculate_free_value($ongkir_setting, $order_value);
				$free_ongkir = $this->text_renderer->to_rupiah($free_ongkir);
				$whatsapp_message = $this->message_generator->order_whatsapp($customer_name, $shipping_address, $shipping_method, $free_ongkir, $items);
				$result['whatsapp_message'] = $whatsapp_message;
			}
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($result);
	}
	
	public function send_to_whatsapp()
	{
		$message = $this->input->post('message');
		redirect('https://wa.me/'.WHATSAPP_NUMBER.'?text='.$message);
	}
}
