<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();	

		$this->load->library('session');
		if($this->session->userdata('status') != "login"){
			redirect(base_url());
		}
		
		$this->load->model('Dashboard_model');
	}

	public function index()
	{
        $data = array(
			'get_absen_pulang_perbulan_chart'	=> $this->Dashboard_model->get_absen_pulang_perbulan_chart(),
			'get_absen_masuk_perbulan_chart'	=> $this->Dashboard_model->get_absen_masuk_perbulan_chart(),
            'dashboard'							=> 'active'
        );

		$this->load->view('page/header_frontend', $data);
		$this->load->view('frontend/dashboard');
		$this->load->view('page/javascript_frontend');
	}
}