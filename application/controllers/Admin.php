<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function authorize()
	{
		// if ($this->session->admin_id == null) {
			// show_404();
		// }
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
		$result = array();
		
		$result['err'] = 0;
		
		$result['items'] = array();
		$result['items'][0] = array();
		$result['items'][0]['id'] = 1;
		$result['items'][0]['name'] = "Berrylicious, 3mg, 60ml";
		$result['items'][0]['price'] = "150000";
		$result['items'][0]['stock'] = "2";
		$result['items'][1] = array();
		$result['items'][1]['id'] = 2;
		$result['items'][1]['name'] = "Bananalicious, 3mg, 60ml";
		$result['items'][1]['price'] = "140000";
		$result['items'][1]['stock'] = "2";
		$result['items'][2] = array();
		$result['items'][2]['id'] = 3;
		$result['items'][2]['name'] = "Bananalicious, 3mg, 60ml";
		$result['items'][2]['price'] = "140000";
		$result['items'][2]['stock'] = "3";
		$result['items'][3] = array();
		$result['items'][3]['id'] = 4;
		$result['items'][3]['name'] = "Bananalicious, 3mg, 60ml";
		$result['items'][3]['price'] = "140000";
		$result['items'][3]['stock'] = "3";
		$result['items'][4] = array();
		$result['items'][4]['id'] = 5;
		$result['items'][4]['name'] = "Bananalicious, 3mg, 60ml";
		$result['items'][4]['price'] = "140000";
		$result['items'][4]['stock'] = "0";
		$result['items'][5] = array();
		$result['items'][5]['id'] = 6;
		$result['items'][5]['name'] = "Bananalicious, 3mg, 60ml";
		$result['items'][5]['price'] = "140000";
		$result['items'][5]['stock'] = "0";
		
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
		
		$result['item'] = array();
		$result['item']['id'] = $id;
		$result['item']['image'] = "";
		$result['item']['name'] = "Berrylicious, 3mg, 60ml";
		$result['item']['description_long'] = "Lorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal ametLorem ipsum dolor sit amet blablabla da ga apal amet";
		$result['item']['price'] = "150000";
		$result['item']['stock'] = "2";
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($result);
	}
	 
	
	/********************
	    ACTIONS
	 ********************/
	 
	public function validate()
	{redirect("admin");
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
		
		if ($user !== null)
		{
			$this->session->fail_count = 0;
			if ($user->is_blocked())
			{
				redirect('Admin/Login?err=6');
			}
			
			$id = $user->id;
			$name = $user->name;
			
			$userdata = array(
				'admin_id' => $id,
				'name' => $name,
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
