<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jayapura');

class Web extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Pengunjung_model');
	}

	public function index()
	{
		$this->template->load('web', 'front-end/web_user');
	}

	public function video()
	{
		$user_session = $this->session->userdata('user_web');
		if (!$user_session) {
			$this->session->set_flashdata('error', 'Silahkan login terlebih dahulu untuk melihat halaman');
			redirect('web');
		} else {
			$this->template->load('web', 'front-end/video');
		}
	}

	public function modul()
	{
		$user_session = $this->session->userdata('user_web');
		if (!$user_session) {
			$this->session->set_flashdata('error', 'Silahkan login terlebih dahulu untuk melihat halaman');
			redirect('web');
		} else {
			$this->template->load('web', 'front-end/modul');
		}
	}

	public function login()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->Pengunjung_model->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'user_web' => $row->username,
					'nama_user_web' => $row->nama
				);
				$this->session->set_userdata($params);
				$this->session->set_flashdata('message', 'Login Berhasil');
				redirect(site_url('web'));
			} else {
				$this->session->set_flashdata('error', 'Login gagal, username atau password salah');
				redirect(site_url('web'));
			}
		}
	}

	public function logout()
	{
		$params = array('user_web', 'nama_user_web');
		$this->session->unset_userdata($params);
		$this->session->set_flashdata('message', 'Logout Berhasil');
		redirect(site_url('web'));
	}
}
