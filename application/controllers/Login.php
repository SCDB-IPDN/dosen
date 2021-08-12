<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('frontend/login');
	}

	public function cek_login()
	{
		$this->load->library('form_validation');

		$usernama = $this->input->post('username');
		$ktsandi  = md5($this->input->post('password'));
		
		$where = array(
			'username'=> $usernama,
			'password'=> $ktsandi
		);
		
		$cek = $this->LoginModel->cekLogin("user", $where);

		if ($cek>0) 
		{
			$dataSession = array(
				'nama' => $usernama,
				'status' => "login" 
			);

			$this->session->set_userdata($dataSession);
			
			redirect(base_url("home"));

			//echo "$cek";
		} 
		else 
		{
			echo
			"
			<script>
				alert('Username dan Password anda salah');
				window.location='Login';
			</script>
			";

			//redirect("Login");
		}
		
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url("login"));
	}
}
