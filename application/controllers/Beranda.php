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
		// $this->load->view('page/footer_frontend');
		// $this->load->view('page/javascript_frontend');
	}

	function profile($username)
	{
        $data = array(
			'get_profile'	=> $this->Beranda_model->get_profile(base64_decode($username)),
            'profile'		=> 'active'
        );

		$this->load->view('page/header_frontend', $data);
		$this->load->view('frontend/profile', $data);
		// $this->load->view('page/javascript_frontend');
	}

	public function edit()
	{
		if ($this->input->is_ajax_request()) {
			$edit_id = $this->input->post('edit_id');

			if ($post = $this->Beranda_model->edit_password($edit_id)) {
				$data = array('responce' => 'success', 'post' => $post);
			} else {
				$data = array('responce' => 'error', 'message' => 'failed to fetch record');
			}
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}

	}

	public function update()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('edit_nip', 'NIP', 'required');
			$this->form_validation->set_rules('edit_password', 'Password', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {
				// $data['username'] = $this->input->post('edit_record_id');
				$data['username'] = $this->input->post('edit_nip');
				$data['password'] = md5($this->input->post('edit_password'));

				if ($this->Beranda_model->update_password($data)) {
					$data = array('responce' => 'success', 'message' => 'Record update Successfully');
				} else {
					$data = array('responce' => 'error', 'message' => 'Failed to update record');
				}
			}

			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}
}
