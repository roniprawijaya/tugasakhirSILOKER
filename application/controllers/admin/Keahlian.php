<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keahlian extends CI_Controller {

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
			'title'			=> 'Keahlian',
			'breadcrumb'	=> [
				'Dashboard' => "/admin",
				'Keahlian'	=> null
			]
		];
		$this->data['data'] = $this->Model->getData('keahlian', 'id', 'desc');
		$this->data['subview'] = 'dashboard/keahlian/index';
		$this->load->view('dashboard/main', $this->data);
	}

	public function add() {
		$this->data['meta'] = [
			'title'			=> 'Add Keahlian',
			'breadcrumb'	=> [
				'Dashboard'     => "/admin",
				'Keahlian'	    => "/admin/keahlian",
				'Add Keahlian'  => null
			]
		];

		$this->data['subview'] = 'dashboard/keahlian/add';
		$this->load->view('dashboard/main', $this->data);
	}

	public function edit($id) {
		$data = $this->Model->getDataWhere('keahlian', ['id' => $id]);
		$this->data['meta'] = [
			'title'			=> 'Edit Keahlian '.$data->nama,
			'breadcrumb'	=> [
				'Dashboard' 			    => "/admin",
				'Keahlian'				    => "/admin/keahlian",
				'Edit Keahlian'.$data->nama	=> null
			]
		];

		$this->data['data']		= $data;
		$this->data['subview']	= 'dashboard/keahlian/edit';
		$this->load->view('dashboard/main', $this->data);
	}

	public function save() {
        $data = [
            'nama' => $this->input->post('nama'),
        ];
        $this->Model->inserdata('keahlian', $data);
        redirect(base_url('/admin/keahlian'));
	}

	public function update() {
		if ($this->input->post('id')) {
			$data = [
                'nama' => $this->input->post('nama'),
            ];
            $this->Model->updateData('keahlian', $this->input->post('id'), $data);
            redirect(base_url('/admin/keahlian'));
		} else {
			redirect(base_url('/admin/keahlian'));
		}
	}

	public function delete($id) {
		$this->Model->deleteData('keahlian', ['id' => $id]);
		redirect(base_url('/admin/keahlian'));
	}

}
