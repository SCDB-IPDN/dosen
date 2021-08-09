<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('frontend/login');
		$this->load->view('page/javascript_frontend');
		$this->load->view('page/footer_frontend');
	}
}
