<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Model');
	}

	public function index()
	{
		$this->data['meta'] = [
			'title' => 'Home'
		];

		$this->data['berita']	= $this->Model->getData('berita', 'id', 'desc');
		$this->data['subview']	= 'frontend/page/home';
		$this->load->view('frontend/main', $this->data);
	}
}
