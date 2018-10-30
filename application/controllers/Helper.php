<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helper extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function to_rupiah($value)
	{
		$this->load->library('text_renderer');
		$result = array();
		
		$result['err'] = 0;
		
		$result['value'] = $this->text_renderer->to_rupiah($value);
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($result);
	}
}
