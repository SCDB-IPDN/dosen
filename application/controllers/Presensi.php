<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->load->library('session');
		if ($this->session->userdata('status') != "login") {
			redirect(base_url());
		}

		$this->load->model('presensi_model');
		$this->load->model('Beranda_model');
	}

	public function index()
	{
		$data = array(
			'get_profile'				=> $this->Beranda_model->get_profile($this->session->userdata('username')),
			'get_current_prodi'			=> $this->presensi_model->get_count_monitoring_prodi(),
			'get_current_dosen'			=> $this->presensi_model->get_count_monitoring_dosen(),
			'get_count_status_monitoring'	=> $this->presensi_model->get_count_status_monitoring(),
			'get_count_sudah_upload'	=> $this->presensi_model->get_count_sudah_upload(),
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
			if ($this->session->userdata('role') == 1) {
				$posts = $this->presensi_model->get_entries('admin');
			} else {
				$posts = $this->presensi_model->get_entries(base64_decode($username));
			}
			$data = array('responce' => 'success', 'posts' => $posts);
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function fetch_detail_monitoring()
	{
		if ($this->input->is_ajax_request()) {
				$posts = $this->presensi_model->get_detail_monitoring();

				$data = array('responce' => 'success', 'posts' => $posts);
				echo json_encode($data);
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
			$this->form_validation->set_rules('edit_keterangan', 'Keterangan', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {
				$id = $this->input->post('edit_id');
				$ajax_data['keterangan'] = $this->input->post('edit_keterangan');
				$ajax_data['waktu_upload'] = $this->input->post('edit_waktu');

				if ($this->presensi_model->update_entry($id, $ajax_data)) {
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

	public function update2()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('edit_media', 'Media', 'required');
			// $this->form_validation->set_rules('edit_img', 'Gambar', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {
				if (isset($_FILES["edit_img"]["name"])) {
					$config['upload_path'] = APPPATH . '../assets/upload/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']     = '99999';
					// $config['max_width'] = '1024';
					// $config['max_height'] = '768';
					$this->load->library('upload', $config);

					if (!$this->upload->do_upload("edit_img")) {
						$data = array('responce' => "error", 'message' => $this->upload->display_errors());
					} else {
						$edit_id = $this->input->post('edit_id');
						if ($post = $this->presensi_model->single_entry($edit_id)) {
							unlink(APPPATH . '../assets/upload/' . $post->upload);
							$ajax_data['upload'] = $this->upload->data('file_name');
						}
					}
				}

				$id = $this->input->post('edit_id');
				$ajax_data['media_pembelajaran'] = $this->input->post('edit_media');
				$ajax_data['waktu_upload'] = $this->input->post('edit_waktu');

				if ($this->presensi_model->update_entry($id, $ajax_data)) {
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

	public function absen()
	{
		if ($this->session->userdata('role') == 1) {
			$posts = $this->presensi_model->get_absen('admin');
		} else {
			$posts = $this->presensi_model->get_absen($this->session->userdata('username'));
		}

		$data = array(
			'get_profile'				=> $this->Beranda_model->get_profile($this->session->userdata('username')),
			'get_absen_masuk_chart'		=> $this->presensi_model->get_absen_masuk_chart(),
			'get_absen_pulang_chart'	=> $this->presensi_model->get_absen_pulang_chart(),
			'get_validate'				=> $posts,
			'profile'					=> 'active'
		);
		$this->load->view('page/header_frontend', $data);
		$this->load->view('frontend/absen');
	}

	public function fetch_absen($username)
	{
		if ($this->input->is_ajax_request()) {
			if ($this->session->userdata('role') == 1) {
				$posts = $this->presensi_model->get_absen('admin');
			} else {
				$posts = $this->presensi_model->get_absen(base64_decode($username));
			}
			$data = array('responce' => 'success', 'posts' => $posts);
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function insert_absen()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('tgl', 'Tanggal', 'required');
			$this->form_validation->set_rules('waktu', 'Waktu', 'required');
			$this->form_validation->set_rules('via', 'Via', 'required');
			$this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				if ($this->presensi_model->insert_entry_absen($ajax_data)) {
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

	public function absen_pulang($username)
	{
		$data_update['waktu_pulang'] = date("H:i:s");
		$data_update['status'] = "Pulang";
		$this->presensi_model->update_entry_absen(base64_decode($username), $data_update);
		redirect(base_url("absen"));
	}
}
