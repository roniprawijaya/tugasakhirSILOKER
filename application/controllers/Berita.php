<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Model');
		$this->data['berita']	= $this->Model->getData('berita', 'id', 'desc');
	}

	public function index()
	{
		$this->data['meta'] = [
			'title' => 'Berita'
		];

		$this->data['subview']	= 'frontend/page/berita';
		$this->load->view('frontend/main', $this->data);
	}

	public function detail($id)
	{
		$data = $this->Model->getDataWhere('berita', ['id' => $id]);
		$this->data['meta'] = [
			'title' => $data->judul
		];

		$this->data['data']		= $data;
		$this->data['subview']	= 'frontend/page/detail_berita';
		$this->load->view('frontend/main', $this->data);
	}
}
