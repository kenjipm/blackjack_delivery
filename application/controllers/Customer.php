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
		
		// Load Footer
		$this->load->view('footer');
	}
	
	/********************
	    VIEW LOADERS
	 ********************/
	
	public function load_order_item_list()
	{
		$result = array();
		
		$result['err'] = 0;
		
		$result['items'] = array();
		$result['items'][0] = array();
		$result['items'][0]['id'] = 1;
		$result['items'][0]['image'] = "";
		$result['items'][0]['name'] = "Berrylicious, 3mg, 60ml";
		$result['items'][0]['description_long'] = "Lorem ipsum dolor sit amet";
		$result['items'][0]['price'] = "150000";
		$result['items'][0]['price_str'] = "Rp 150.000";
		$result['items'][0]['stock'] = "2";
		$result['items'][1] = array();
		$result['items'][1]['id'] = 2;
		$result['items'][1]['image'] = "";
		$result['items'][1]['name'] = "Bananalicious, 3mg, 60ml";
		$result['items'][1]['description_long'] = "Lorem ipsum dolor sit amet...";
		$result['items'][1]['price'] = "140000";
		$result['items'][1]['price_str'] = "Rp 140.000";
		$result['items'][1]['stock'] = "2";
		$result['items'][2] = array();
		$result['items'][2]['id'] = 3;
		$result['items'][2]['image'] = "";
		$result['items'][2]['name'] = "Bananalicious, 3mg, 60ml";
		$result['items'][2]['description_long'] = "Lorem ipsum dolor sit amet...";
		$result['items'][2]['price'] = "140000";
		$result['items'][2]['price_str'] = "Rp 140.000";
		$result['items'][2]['stock'] = "3";
		$result['items'][3] = array();
		$result['items'][3]['id'] = 4;
		$result['items'][3]['image'] = "";
		$result['items'][3]['name'] = "Bananalicious, 3mg, 60ml";
		$result['items'][3]['description_long'] = "Lorem ipsum dolor sit amet...";
		$result['items'][3]['price'] = "140000";
		$result['items'][3]['price_str'] = "Rp 140.000";
		$result['items'][3]['stock'] = "3";
		$result['items'][4] = array();
		$result['items'][4]['id'] = 5;
		$result['items'][4]['image'] = "";
		$result['items'][4]['name'] = "Bananalicious, 3mg, 60ml";
		$result['items'][4]['description_long'] = "Lorem ipsum dolor sit amet...";
		$result['items'][4]['price'] = "140000";
		$result['items'][4]['price_str'] = "Rp 140.000";
		$result['items'][4]['stock'] = "0";
		$result['items'][5] = array();
		$result['items'][5]['id'] = 6;
		$result['items'][5]['image'] = "";
		$result['items'][5]['name'] = "Bananalicious, 3mg, 60ml";
		$result['items'][5]['description_long'] = "Lorem ipsum dolor sit amet...";
		$result['items'][5]['price'] = "140000";
		$result['items'][5]['price_str'] = "Rp 140.000";
		$result['items'][5]['stock'] = "0";
		
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
		
		$result['item'] = array();
		$result['item']['id'] = $id;
		$result['item']['image'] = "";
		$result['item']['name'] = "Berrylicious, 3mg, 60ml";
		$result['item']['description_long'] = "Lorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal amet";
		$result['item']['price'] = "150000";
		$result['item']['price_str'] = "Rp 150.000";
		$result['item']['stock'] = "0";
		
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
}
