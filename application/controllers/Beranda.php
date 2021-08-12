<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct(){
		parent::__construct();		
		// if($this->session->userdata('status') != "login"){
		// 	redirect(base_url(""));
		// }
	}

	public function index()
	{
        $data = array(
            'beranda' => 'active'
        );

		$this->load->view('page/header_frontend', $data);
		$this->load->view('frontend/beranda');
		$this->load->view('page/javascript_frontend');
	}

	public function tentang()
	{
        $data = array(
            'tentang' => 'active'
        );

		$this->load->view('page/header_frontend', $data);
		$this->load->view('frontend/tentang');
		$this->load->view('page/javascript_frontend');
	}
}
