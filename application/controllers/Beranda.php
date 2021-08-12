<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct(){
		parent::__construct();	

		$this->load->library('session');
		if($this->session->userdata('status') != "login"){
			redirect(base_url());
		}
		
		$this->load->model('Beranda_model');
	}

	public function index()
	{
        $data = array(
			'desc'		=> $this->Beranda_model->get_desc(),
            'beranda'	=> 'active'
        );

		$this->load->view('page/header_frontend', $data);
		$this->load->view('frontend/beranda', $data);
		$this->load->view('page/javascript_frontend');
	}

	public function tentang()
	{
        $data = array(
			'desc'		=> $this->Beranda_model->get_desc(),
            'tentang'	=> 'active'
        );

		$this->load->view('page/header_frontend', $data);
		$this->load->view('frontend/tentang', $data);
		$this->load->view('page/javascript_frontend');
	}
}
