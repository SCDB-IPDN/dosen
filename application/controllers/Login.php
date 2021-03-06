<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->library('form_validation');

		$this->load->model('LoginModel');
		$this->load->model('Presensi_model');
	}

	public function index()
	{
		$this->load->view('frontend/login');
		// $this->load->view('page/header_frontend');
		// $this->load->view('page/javascript_frontend');
	}

	public function cek_login()
	{
		$username	= $this->input->post('username');
		$password	= md5($this->input->post('password'));

		$where = array(
			'username' => $username,
			'password' => $password
		);
		$cek = $this->LoginModel->cekLogin("tbl_login", $where);

		if ($cek > 0) {
			$this->Presensi_model->insert_entry_absen_auto();

			$data = $this->LoginModel->get_user($where);
			$dataSession = array(
				'username'	=> $data[0]->username,
				'password'	=> $data[0]->password,
				'image_url'	=> $data[0]->image_url,
				'role'		=> $data[0]->role,
				'status'	=> "login"
			);
			$this->session->set_userdata($dataSession);
			redirect(base_url("beranda"));
		} else {
			$this->session->set_flashdata('error', $cek);
			redirect(site_url("login"));
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url("login"));
	}
}

?>