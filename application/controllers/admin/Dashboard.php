<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Model');

		if (!$this->session->userdata('logIn')) {
			redirect(base_url('auth'));
		}
		if (!isAdmin()) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$this->data['meta'] = [
			'title'			=> 'Dashboard',
			'breadcrumb'	=> [
				'Dashboard' => null
			]
		];
		$this->data['subview'] = 'dashboard/dashboard/index';
		$this->load->view('dashboard/main', $this->data);
	}
}