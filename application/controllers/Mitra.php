<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Model');
	}

	public function index()
	{
		$this->data['meta'] = [
			'title' => 'Daftar Mitra'
		];

		$this->data['berita']	= $this->Model->getData('berita', 'id', 'desc');
		$this->data['data']		= $this->Model->getDataMitra();
		$this->data['subview']	= 'frontend/page/mitra';
		$this->load->view('frontend/main', $this->data);
	}

	public function daftar()
	{
		$this->data['meta'] = [
			'title' => 'Daftar Mitra Baru'
		];

		$this->data['bidangUsaha']	= $this->Model->getData('bidang_usaha', 'id', 'desc');
		$this->data['sektorUsaha']	= $this->Model->getData('sektor_usaha', 'id', 'desc');
		$this->data['subview']	= 'frontend/page/daftar_mitra';
		$this->load->view('frontend/main', $this->data);
	}

	public function save() {
        $data = [
            'nama'				=> $this->input->post('nama'),
            'alamat' 			=> $this->input->post('alamat'),
            'kontak' 			=> $this->input->post('kontak'),
            'telpon' 			=> $this->input->post('telpon'),
            'email' 			=> $this->input->post('email'),
            'web' 				=> $this->input->post('web'),
            'bidang_usaha_id' 	=> $this->input->post('bidang_usaha_id'),
            'sektor_usaha_id' 	=> $this->input->post('sektor_usaha_id'),
			'id_user'			=> $this->session->userdata('id')
        ];
        $this->Model->inserdata('mitra', $data);
        redirect(base_url('/mitra'));
	}
}
