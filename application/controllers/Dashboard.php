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
			'get_all_total'									=> $this->Dashboard_model->get_all_total(),
			'get_all_total_kelas'							=> $this->Dashboard_model->get_all_total_kelas(),
			'get_all_kelas_belum_mulai'						=> $this->Dashboard_model->get_kelas_belum_mulai(),
			'get_all_kelas_berlangsung'						=> $this->Dashboard_model->get_kelas_berlangsung(),
			'get_all_kelas_selesai'							=> $this->Dashboard_model->get_kelas_selesai(),
			'get_summary_fakultas'							=> $this->Dashboard_model->get_summary_fakultas(),
			'get_all_total_belum_mulai'						=> $this->Dashboard_model->get_all_total_belum_mulai(),
			'get_all_total_berlangsung'						=> $this->Dashboard_model->get_all_total_berlangsung(),
			'get_all_total_done'							=> $this->Dashboard_model->get_all_total_done(),
			'get_count_status_monitoring'					=> $this->Presensi_model->get_count_status_monitoring(),
			'count_get_absen_perkampus_ta'					=> $this->Dashboard_model->count_get_absen_perkampus_ta(),
			'count_get_absen_perkampus_ta_masuk'			=> $this->Dashboard_model->count_get_absen_perkampus_ta_masuk(),
			'count_get_absen_perkampus_ta_pulang'			=> $this->Dashboard_model->count_get_absen_perkampus_ta_pulang(),
			'count_get_absen_perkampus_thl'					=> $this->Dashboard_model->count_get_absen_perkampus_thl(),
			'count_get_absen_perkampus_thl_masuk'			=> $this->Dashboard_model->count_get_absen_perkampus_thl_masuk(),
			'count_get_absen_perkampus_thl_pulang'			=> $this->Dashboard_model->count_get_absen_perkampus_thl_pulang(),
			'count_get_absen_perkampus_dosen'				=> $this->Dashboard_model->count_get_absen_perkampus_dosen(),
			'count_get_absen_perkampus_dosen_masuk'			=> $this->Dashboard_model->count_get_absen_perkampus_dosen_masuk(),
			'count_get_absen_perkampus_dosen_pulang'		=> $this->Dashboard_model->count_get_absen_perkampus_dosen_pulang(),
			'count_get_absen_perkampus_pns'					=> $this->Dashboard_model->count_get_absen_perkampus_pns(),
			'count_get_absen_perkampus_pns_masuk'			=> $this->Dashboard_model->count_get_absen_perkampus_pns_masuk(),
			'count_get_absen_perkampus_pns_pulang'			=> $this->Dashboard_model->count_get_absen_perkampus_pns_pulang(),
			'get_count_status_prodi'						=> $this->Dashboard_model->get_count_status_prodi(),
			'dashboard'										=> 'active'
		);

		$this->load->view('page/header_frontend', $data);
		$this->load->view('frontend/dashboard');
	}

	public function new_dashboard()
	{
		$this->load->view('page/header_frontend');
		$this->load->view('frontend/new_dashboard');
	}

	// public function fetch_detail_monitoring()
	// {
	// 	if ($this->input->is_ajax_request()) {
	// 		$posts = $this->Presensi_model->get_detail_monitoring();

	// 		$data = array('responce' => 'success', 'posts' => $posts);
	// 		echo json_encode($data);
	// 	}
	// }

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

	public function fetchkelastotal()
	{
		if ($this->input->is_ajax_request()) {
			$posts = $this->Dashboard_model->fetchkelastotal();
			$data = array('responce' => 'success', 'posts' => $posts);
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function fetchkelas_belum_mulai()
	{
		if ($this->input->is_ajax_request()) {
			$posts = $this->Dashboard_model->fetchkelas_belum_mulai();
			$data = array('responce' => 'success', 'posts' => $posts);
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function fetchkelas_berlangsung()
	{
		if ($this->input->is_ajax_request()) {
			$posts = $this->Dashboard_model->fetchkelas_berlangsung();
			$data = array('responce' => 'success', 'posts' => $posts);
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function fetchkelas_selesai()
	{
		if ($this->input->is_ajax_request()) {
			$posts = $this->Dashboard_model->fetchkelas_selesai();
			$data = array('responce' => 'success', 'posts' => $posts);
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}
}
