<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->load->model('presensi_model');
	}

	public function index()
	{
        $data = array(
            'profile'	=> 'active'
        );
		$this->load->view('page/header_frontend', $data);
		$this->load->view('frontend/presensi');
	}

	public function insert()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				if ($this->presensi_model->insert_entry($ajax_data)) {
					$data = array('responce' => 'success', 'message' => 'Record added Successfully');
				} else {
					$data = array('responce' => 'error', 'message' => 'Failed to add record');
				}
			}

			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function fetch($username)
	{
		if ($this->input->is_ajax_request()) {
			// if ($posts = $this->crud_model->get_entries()) {
			// 	$data = array('responce' => 'success', 'posts' => $posts);
			// }else{
			// 	$data = array('responce' => 'error', 'message' => 'Failed to fetch data');
			// }
			if($this->session->userdata('role') == 1){
				$posts = $this->presensi_model->get_entries('admin');
			}else{
				$posts = $this->presensi_model->get_entries(base64_decode($username));
			}
			$data = array('responce' => 'success', 'posts' => $posts);
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function delete()
	{
		if ($this->input->is_ajax_request()) {
			$del_id = $this->input->post('del_id');

			if ($this->presensi_model->delete_entry($del_id)) {
				$data = array('responce' => 'success');
			} else {
				$data = array('responce' => 'error');
			}

			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function edit()
	{
		if ($this->input->is_ajax_request()) {
			$edit_id = $this->input->post('edit_id');

			if ($post = $this->presensi_model->edit_entry($edit_id)) {
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

			// $config['upload_path']="./upload";
        	// $config['allowed_types']='gif|jpg|png';
        	// $this->load->library('upload',$config);

		      	$this->form_validation->set_rules('edit_media', 'Media', 'required');
		 	   $this->form_validation->set_rules('edit_keterangan', 'Keterangan', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {

				// if($this->upload->do_upload("file")){
				// 	$data1 = array('upload_data' => $this->upload->data());
				// 	$data = array(
				// 	'id_plot' => $this->input->post('edit_id'),
				// 	'media_pembelajaran' => $this->input->post('edit_media'),
				// 	'keterangan' => $this->input->post('edit_keterangan'),
				// 	'waktu_upload' => $this->input->post('edit_waktu'),
				// 	'upload' => $data1['upload_data']['file_name']
				// 	);  
					

				$data['id_plot'] = $this->input->post('edit_id');
				$data['media_pembelajaran'] = $this->input->post('edit_media');
				$data['keterangan'] = $this->input->post('edit_keterangan');
				$data['waktu_upload'] = $this->input->post('edit_waktu');

				if ($this->presensi_model->update_entry($data)) {
					$data = array('responce' => 'success', 'message' => 'Record update Successfully');
					} else {
					$data = array('responce' => 'error', 'message' => 'Failed to update record');
					}
				// }
			}

			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}
}