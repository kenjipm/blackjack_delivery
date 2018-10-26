<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	/********************
	    VIEWS
	 ********************/
	
	public function index()
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
		$this->load->view('Login', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	/********************
	    ACTIONS
	 ********************/
	 
	public function validate()
	{
		if (isset($this->session->blocked_until)) // kalau gagal login 5x
		{
			if (time() <= $this->session->blocked_until)
			{
				redirect('Login?err=5');
			}
		}
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$return_url = $this->input->post('return_url');
		
		$this->load->model('Customer_model');
		$user = $this->Customer_model->get_from_login($username, $password);
		
		if ($user !== null)
		{
			$this->session->fail_count = 0;
			if ($user->is_blocked())
			{
				redirect('login?err=6');
			}
			
			$id = $user->id;
			$name = $user->name;
			
			$userdata = array(
				'id' => $id,
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
		
		redirect('Login?err=1');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
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
		redirect('');
	}
}
