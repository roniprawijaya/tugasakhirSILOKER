<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Model');
	}

	public function index()
	{
		$this->data['meta'] = [
			'title' => 'Lowongan Baru'
		];

		$this->data['berita']	= $this->Model->getData('berita', 'id', 'desc');
		$this->data['data']		= $this->Model->getDataLowongan();
		$this->data['subview']	= 'frontend/page/lowongan';
		$this->load->view('frontend/main', $this->data);
	}

	public function detail($id)
	{
		$this->data['meta'] = [
			'title' => 'Lowongan Baru'
		];

		$this->data['data']		= $this->Model->getDataLowongan($id);
		$this->data['subview']	= 'frontend/page/detail_lowongan';
		$this->load->view('frontend/main', $this->data);
	}
}
