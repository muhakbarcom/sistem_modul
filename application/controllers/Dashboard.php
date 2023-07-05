<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['subtitle'] = '';
		$data['crumb'] = [
			'Dashboard' => '',
		];

		$date = date('Y-m');

		$data['page'] = $this->config->item('template') . 'dashboard/Index';
		$this->load->view($this->config->item('template') . 'template/backend', $data);
	}
}
