<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jayapura');

class Web extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		check_admin();
	}

	public function index()
	{
		$this->template->load('web', 'front-end/web_user');
	}

	public function video()
	{
		$this->template->load('web', 'front-end/video');
	}

	public function modul()
	{
		$this->template->load('web', 'front-end/modul');
	}

	public function saran()
	{
		$this->template->load('web', 'front-end/saran');
	}
}
