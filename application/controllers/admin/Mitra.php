<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model');
		
        if (!$this->session->userdata('logIn')) {
			redirect(base_url('/auth'));
		}
		if (!isAdmin()) {
			redirect(base_url());
		}
	}

	public function index() {
		$this->data['meta'] = [
			'title'			=> 'Mitra',
			'breadcrumb'	=> [
				'Dashboard' => "/admin",
				'Mitra'	=> null
			]
		];
		$this->data['data']		= $this->Model->getDataMitra();
		$this->data['subview']	= 'dashboard/mitra/index';
		$this->load->view('dashboard/main', $this->data);
	}

	public function add() {
		$this->data['meta'] = [
			'title'			=> 'Add Mitra',
			'breadcrumb'	=> [
				'Dashboard' => "/admin",
				'Mitra'	    => "/admin/mitra",
				'Add Mitra'	=> null
			]
		];
		$this->data['bidangUsaha']	= $this->Model->getData('bidang_usaha', 'id', 'desc');
		$this->data['sektorUsaha']	= $this->Model->getData('sektor_usaha', 'id', 'desc');
		$this->data['subview']		= 'dashboard/mitra/add';
		$this->load->view('dashboard/main', $this->data);
	}

	public function edit($id) {
		$data = $this->Model->getDataWhere('mitra', ['id' => $id]);
		$this->data['meta'] = [
			'title'			=> 'Edit Mitra '.$data->nama,
			'breadcrumb'	=> [
				'Dashboard' 			    => "/admin",
				'Mitra'				    	=> "/admin/mitra",
				'Edit Mitra'.$data->nama	=> null
			]
		];
		$this->data['data']			= $data;
		$this->data['bidangUsaha']	= $this->Model->getData('bidang_usaha', 'id', 'desc');
		$this->data['sektorUsaha']	= $this->Model->getData('sektor_usaha', 'id', 'desc');
		$this->data['subview']		= 'dashboard/mitra/edit';
		$this->load->view('dashboard/main', $this->data);
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
        ];
        $this->Model->inserdata('mitra', $data);
        redirect(base_url('/admin/mitra'));
	}

	public function update() {
		if ($this->input->post('id')) {
			$data = [
				'nama'				=> $this->input->post('nama'),
				'alamat' 			=> $this->input->post('alamat'),
				'kontak' 			=> $this->input->post('kontak'),
				'telpon' 			=> $this->input->post('telpon'),
				'email' 			=> $this->input->post('email'),
				'web' 				=> $this->input->post('web'),
				'bidang_usaha_id' 	=> $this->input->post('bidang_usaha_id'),
				'sektor_usaha_id' 	=> $this->input->post('sektor_usaha_id'),
			];
            $this->Model->updateData('mitra', $this->input->post('id'), $data);
            redirect(base_url('/admin/mitra'));
		} else {
			redirect(base_url('/admin/mitra'));
		}
	}

	public function delete($id) {
		$this->Model->deleteData('mitra', ['id' => $id]);
		redirect(base_url('/admin/mitra'));
	}

}
