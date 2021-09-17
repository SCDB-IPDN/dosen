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
		$this->load->model('Presensi_model');
		
		
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
			'get_all_total_kelas'						=> $this->Dashboard_model->get_all_total_kelas(),
			'get_summary_fakultas'				=> $this->Dashboard_model->get_summary_fakultas(),
			'get_all_total_done'				=> $this->Dashboard_model->get_all_total_done(),
			'get_summary_fakultas_done'			=> $this->Dashboard_model->get_summary_fakultas_done(),
			'get_count_status_monitoring'		=> $this->Presensi_model->get_count_status_monitoring(),
			'get_absen_perkampus_thl_ta'		=> $this->Dashboard_model->get_absen_perkampus_thl_ta(),
			'count_get_absen_perkampus_thl_ta'	=> $this->Dashboard_model->count_get_absen_perkampus_thl_ta(),
			'get_absen_perkampus_dosen'			=> $this->Dashboard_model->get_absen_perkampus_dosen(),
			'count_get_absen_perkampus_dosen'	=> $this->Dashboard_model->count_get_absen_perkampus_dosen(),
			'get_absen_perkampus_pns'			=> $this->Dashboard_model->get_absen_perkampus_pns(),
			'count_get_absen_perkampus_pns'		=> $this->Dashboard_model->count_get_absen_perkampus_pns(),
			'get_absen_perkampus_pns_dosen'		=> $this->Dashboard_model->get_absen_perkampus_pns_dosen(),
			'count_get_absen_perkampus_pns_dosen'		=> $this->Dashboard_model->count_get_absen_perkampus_pns_dosen(),
			'get_absen_perkampus_thl_ta_masuk'		=> $this->Dashboard_model->get_absen_perkampus_thl_ta_masuk(),
			'get_absen_perkampus_dosen_masuk'		=> $this->Dashboard_model->get_absen_perkampus_dosen_masuk(),
			'get_absen_perkampus_pns_masuk'		=> $this->Dashboard_model->get_absen_perkampus_pns_masuk(),
			'get_absen_perkampus_pns_dosen_masuk'		=> $this->Dashboard_model->get_absen_perkampus_pns_dosen_masuk(),
			'dashboard'							=> 'active'
		);

		$this->load->view('page/header_frontend', $data);
		$this->load->view('frontend/dashboard');
		
	}

	public function fetch_detail_monitoring()
	{
		if ($this->input->is_ajax_request()) {
			$posts = $this->Presensi_model->get_detail_monitoring();

			$data = array('responce' => 'success', 'posts' => $posts);
			echo json_encode($data);
		}
	}

	public function fetch_status_belum_dimulai()
	{
		if ($this->input->is_ajax_request()) {
			$posts = $this->Presensi_model->get_status_belum_dimulai();

			$data = array('responce' => 'success', 'posts' => $posts);
			echo json_encode($data);
		}
	}
	public function fetch_status_sedang_berlangsung()
	{
		if ($this->input->is_ajax_request()) {
			$posts = $this->Presensi_model->get_status_sedang_berlangsung();

			$data = array('responce' => 'success', 'posts' => $posts);
			echo json_encode($data);
		}
	}
	public function fetch_status_telah_selesai()
	{
		if ($this->input->is_ajax_request()) {
			$posts = $this->Presensi_model->get_status_telah_selesai();

			$data = array('responce' => 'success', 'posts' => $posts);
			echo json_encode($data);
		}
		
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
