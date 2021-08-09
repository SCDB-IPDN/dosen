<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function index()
	{
		$this->load->view('page/header_frontend');
		$this->load->view('frontend/beranda');
		$this->load->view('page/javascript_frontend');
		$this->load->view('page/footer_frontend');
	}
}
