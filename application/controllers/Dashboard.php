<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		if ($this->session->userdata('status') != "login") {
			redirect(base_url());
		}

		$this->load->model('Dashboard_model');
	}

	public function index()
	{
		$data = array(
			'get_absen_all'						=> $this->Dashboard_model->get_absen_all(),
			'get_absen_pulang_perbulan_chart'	=> $this->Dashboard_model->get_absen_pulang_perbulan_chart(),
			'get_absen_pulang_perbulan_chart_perhari'	=> $this->Dashboard_model->get_absen_pulang_perbulan_chart_perhari(),
			'get_absen_masuk_perbulan_chart'	=> $this->Dashboard_model->get_absen_masuk_perbulan_chart(),
			'get_absen_masuk_perbulan_chart_perhari'	=> $this->Dashboard_model->get_absen_masuk_perbulan_chart_perhari(),
			'get_count_fakultas'				=> $this->Dashboard_model->get_count_fakultas(),
			'get_all_total'						=> $this->Dashboard_model->get_all_total(),
			'get_summary_fakultas'				=> $this->Dashboard_model->get_summary_fakultas(),
			'get_all_total_done'				=> $this->Dashboard_model->get_all_total_done(),
			'get_summary_fakultas_done'			=> $this->Dashboard_model->get_summary_fakultas_done(),
			'dashboard'							=> 'active'
		);

		$this->load->view('page/header_frontend', $data);
		$this->load->view('frontend/dashboard');
		$this->load->view('page/js_datatable_frontend');
	}

	public function fakultas_detail($fakultas)
	{
		$data = array(
			'get_prodi'		=> $this->Dashboard_model->get_prodi_perfakultas($fakultas),
			'dashboard'		=> 'active'
		);

		$this->load->view('page/header_frontend', $data);
		$this->load->view('frontend/dashboard_detail');
		$this->load->view('page/js_datatable_frontend');
	}
}
