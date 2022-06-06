<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		check_admin();
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$user = $this->User_model->get_all();
		$data = array(
			'user_data' => $user,
		);
		$this->template->load('template', 'user/user_list', $data);
	}

	public function read($id)
	{
		$row = $this->User_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'user_id' => $row->user_id,
				'username' => $row->username,
				'password' => $row->password,
				'level_id' => $row->level_id,
			);
			$this->template->load('template', 'user/user_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('user'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('user/create_action'),
			'user_id' => set_value('user_id'),
			'username' => set_value('username'),
			'password' => set_value('password'),
			'level_id' => set_value('level_id'),
		);
		$this->template->load('template', 'user/user_form', $data);
	}

	public function create_action()
	{
		$this->_rules(null);

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'username' => $this->input->post('username', TRUE),
				'password' => sha1($this->input->post('password', TRUE)),
				'level_id' => 1,
			);

			$this->User_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('user'));
		}
	}

	public function update($id)
	{
		$row = $this->User_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('user/update_action'),
				'user_id' => set_value('user_id', $row->user_id),
				'username' => set_value('username', $row->username),
				'password' => set_value('password', $row->password),
				'level_id' => set_value('level_id', $row->level_id),
			);
			$this->template->load('template', 'user/user_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('user'));
		}
	}

	public function update_action()
	{
		$this->_rules('update');

		if ($this->form_validation->run() == FALSE) {
			$this->update(encrypt_url($this->input->post('user_id')));
		} else {
			if ($this->input->post('password') == '' || $this->input->post('password') == null) {
				$data = array(
					'username' => $this->input->post('username', TRUE),
				);
			} else {
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'password' => sha1($this->input->post('password', TRUE)),
				);
			}

			$this->User_model->update($this->input->post('user_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('user'));
		}
	}

	public function delete($id)
	{
		$row = $this->User_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->User_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('user'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('user'));
		}
	}

	public function _rules($type)
	{
		if ($type == null) {
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
		}
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('user_id', 'user_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function edit_profile()
	{
		$row = $this->User_model->get_by_id($this->session->userdata('userid'));
		if ($row) {
			$data = array(
				'user_id' => $row->user_id,
				'sett_apps' => $this->App_setting_model->get_by_id(1),
				'username' => $row->username,
				'password' => $row->password,
				'level_id' => $row->level_id,
			);
			$this->template->load('template', 'user/edit_profile', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('dashboard'));
		}
	}
}
