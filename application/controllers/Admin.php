<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function authorize()
	{
		if ($this->session->admin_id == null) {
			show_404();
		}
	}
	
	
	public function index()
	{
		$this->setting();
	}
	
	/********************
	    VIEWS
	 ********************/
	 
	public function setting()
	{
		$this->authorize();
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('Admin/setting');
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['return_url'] = $this->input->get('return_url') ?? "";
		$this->load->view('Admin/setting', $data);
		
		// Load View Templates
		$this->load->view('Admin/setting_item_list_template');
		$this->load->view('Admin/setting_item_detail_template');
		$this->load->view('Admin/setting_tambah_item_template');
		$this->load->view('Admin/setting_atur_ongkir_template');
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function login()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['message'] = "";
		if ($this->input->get('err') !== null)
		{
			$data['message'] = $this->get_error_message($this->input->get('err'));
		}
		$data['return_url'] = $this->input->get('return_url') ?? "";
		$data['model'] = new class{};
		$this->load->view('Admin/Login', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	/********************
	    VIEW LOADERS
	 ********************/
	 
	public function load_item_list()
	{
		$search_terms = $this->input->post('search_terms');
		
		$result = array();
		
		$result['err'] = 0;
		
		$this->load->model('item_model');
		$items = $this->item_model->get_all($search_terms);
		
		if ($items != null)
		{
			foreach ($items as $item)
			{
				$item->name = $item->name . ($item->sub_name_1?", ".$item->sub_name_1:"") . ($item->sub_name_2?", ".$item->sub_name_2:"");
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
	
	public function load_item_detail()
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
	
	public function load_atur_ongkir()
	{
		$result = array();
		
		$result['err'] = 0;
		
		$this->load->model('ongkir_setting_model');
		$ongkir = $this->ongkir_setting_model->get_last();
		
		if ($ongkir != null)
		{
			$result['ongkir'] = $ongkir;
		}
		else
		{
			// $result['err'] = 1;
			$result['ongkir'] = new ongkir_setting_model();
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($result);
	}
	 
	
	/********************
	    ACTIONS
	 ********************/
	
	public function create_item_do()
	{
		$result['err'] = 0;
		
		$item = array();
		$item['name'] = $this->input->post('item_name');
		$item['sub_name_1'] = $this->input->post('item_sub_name_1');
		$item['sub_name_2'] = $this->input->post('item_sub_name_2');
		$item['description_long'] = $this->input->post('item_description_long');
		$item['price'] = $this->input->post('item_price');
		$item['stock'] = $this->input->post('item_stock');
		
		$this->load->model('item_model');
		$item_id = $this->item_model->insert($item);
		
		if ($item_id) // proses fotonya
		{
			$this->load->library('uploader');
			$file_path = $this->uploader->upload_image_item($item_id, 'item_image_file'); // upload fotonya
			if ($file_path)
			{
				$item = array();
				$item['id'] = $item_id;
				$item['image_path'] = $file_path; // then set return value
				$query_result = $this->item_model->update($item);
			}
			else
			{
				$result['err'] = 2; // foto gagal di upload
			}
		}
		else //if (!$item_id)
		{
			$result['err'] = 1; // item gagal di insert
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($result);
	}
	
	public function update_item_do()
	{
		$result['err'] = 0;
			
		$item_image_file = $this->input->post('item_image_file');
		
		$item = array();
		$item['id'] = $this->input->post('item_id');
		$item['name'] = $this->input->post('item_name');
		$item['sub_name_1'] = $this->input->post('item_sub_name_1');
		$item['sub_name_2'] = $this->input->post('item_sub_name_2');
		$item['description_long'] = $this->input->post('item_description_long');
		$item['price'] = $this->input->post('item_price');
		$item['stock'] = $this->input->post('item_stock');
		
		$this->load->model('item_model');
		$query_result = $this->item_model->update($item);
		
		if ($query_result) // proses fotonya
		{
			$this->load->library('uploader');
			$file_path = $this->uploader->upload_image_item($item['id'], 'item_image_file'); // upload fotonya
			if ($file_path)
			{
				$item = array();
				$item['id'] = $this->input->post('item_id');
				$item['image_path'] = $file_path; // then set return value
				$query_result = $this->item_model->update($item);
			}
			else
			{
				//$result['err'] = 2; // foto gagal di upload
			}
		}
		else //if (!$query_result)
		{
			$result['err'] = 1;
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($result);
	}
	
	public function delete_item_do()
	{
		$result['err'] = 0;
		
		$item_id = $this->input->post('item_id');
		
		$this->load->model('item_model');
		$query_result = $this->item_model->delete($item_id);
		
		if (!$query_result)
		{
			$result['err'] = 1;
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($result);
	}
	
	public function create_ongkir_setting_do()
	{
		$result['err'] = 0;
		
		$ongkir_setting = array();
		$ongkir_setting['minimum_order'] = $this->input->post('minimum_order');
		$ongkir_setting['free_value'] = $this->input->post('free_value');
		$ongkir_setting['per_price'] = $this->input->post('per_price');
		$ongkir_setting['maximum_free'] = $this->input->post('maximum_free');
		
		$this->load->model('ongkir_setting_model');
		$ongkir_setting_id = $this->ongkir_setting_model->insert($ongkir_setting);
		
		if (!$ongkir_setting_id)
		{
			$result['err'] = 1;
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($result);
	}
	
	public function validate()
	{
		if (isset($this->session->blocked_until)) // kalau gagal login 5x
		{
			if (time() <= $this->session->blocked_until)
			{
				redirect('Admin/Login?err=5');
			}
		}
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$return_url = $this->input->post('return_url');
		
		$this->load->model('Admin_model');
		$user = $this->Admin_model->get_from_login($username, $password);
		
		if ($user == null) // kalau baru create password
		{
			$this->Admin_model->create_password($username, $password);
			$user = $this->Admin_model->get_from_login($username, $password);
		}
		
		if ($user !== null)
		{
			$this->session->fail_count = 0;
			// if ($user->is_blocked())
			// {
				// redirect('Admin/Login?err=6');
			// }
			
			$userdata = array(
				'admin_id' => $user->id,
				'name' => $user->name,
				'username' => $user->username,
			);
			
			$this->session->set_userdata($userdata);
			
			if ($return_url != "") redirect($return_url);
			
			$this->default_redirect($type);
		}
		
		if (isset($this->session->id)) $this->session->sess_destroy(); // kalau gagal login, session id dll dihapus
		
		if (isset($this->session->fail_count)) $this->session->fail_count++;
		else $this->session->fail_count = 1;
		
		if ($this->session->fail_count >= 5)
		{
			$this->session->blocked_until = time() + (5 * 60); // 5 menit dari sekarang
		}
		
		redirect('Admin/Login?err=1');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Admin/Login');
	}
	
	private function get_error_message($error_code)
	{
		if ($error_code == 1)
		{
			return "Username / Password salah";
		}
		else if ($error_code == 2)
		{
			return "Username / Password tidak cocok";
		}
		else if ($error_code == 5)
		{
			return "Anda telah gagal melakukan login beberapa kali, Anda dapat mencoba login kembali setelah 5 menit.";
		}
		else if ($error_code == 6)
		{
			return "Akun Anda di blokir. Silakan hubungi atasan untuk informasi lebih lanjut.";
		}
		else if ($error_code == 7)
		{
			return "Password gagal di reset, silakan coba beberapa saat lagi.";
		}
		else if ($error_code == 8)
		{
			return "Password telah di reset, silakan cek email.";
		}
		else
		{
			return "Unknown Error";
		}
	}
	
	public function default_redirect($type)
	{
		redirect('Admin');
	}
}
