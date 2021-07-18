<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usaha extends CI_Controller {

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

	public function bidang() {
		$this->data['meta'] = [
			'title'			=> 'Bidang Usaha',
			'breadcrumb'	=> [
				'Dashboard' 	=> "/admin",
				'Bidang Usaha'	=> null
			]
		];
		$this->data['type'] = 'bidang';
		$this->data['data'] = $this->Model->getData('bidang_usaha', 'id', 'desc');
		$this->data['subview'] = 'dashboard/usaha/index';
		$this->load->view('dashboard/main', $this->data);
	}

	public function sektor() {
		$this->data['meta'] = [
			'title'			=> 'Sektor Usaha',
			'breadcrumb'	=> [
				'Dashboard' 	=> "/admin",
				'Sektor Usaha'	=> null
			]
		];
		$this->data['type'] = 'sektor';
		$this->data['data'] = $this->Model->getData('sektor_usaha', 'id', 'desc');
		$this->data['subview'] = 'dashboard/usaha/index';
		$this->load->view('dashboard/main', $this->data);
	}

	public function add($type) {
		$this->data['meta'] = [
			'title'			=> "Add $type Usaha",
			'breadcrumb'	=> [
				"Dashboard"     	=> "/admin",
				"$type Usaha"	    => "/admin/$type",
				"Add $type Usaha" 	=> null
			]
		];
		$this->data['type'] = $type;
		$this->data['subview'] = 'dashboard/usaha/add';
		$this->load->view('dashboard/main', $this->data);
	}

	public function edit($type, $id) {
		$data = $this->Model->getDataWhere($type."_usaha", ['id' => $id]);
		$this->data['meta'] = [
			'title'			=> "Edit $type Usaha ".$data->nama,
			'breadcrumb'	=> [
				'Dashboard' 			    	=> "/admin",
				"$type Usaha"				    => "/admin/$type",
				"Edit $type Usaha".$data->nama	=> null
			]
		];

		$this->data['data']		= $data;
		$this->data['type']		= $type;
		$this->data['subview']	= 'dashboard/usaha/edit';
		$this->load->view('dashboard/main', $this->data);
	}

	public function save($type) {
        $data = [
            'nama' => $this->input->post('nama'),
        ];
        $this->Model->inserdata($type."_usaha", $data);
        redirect(base_url("/admin/usaha/$type"));
	}

	public function update($type) {
		if ($this->input->post('id')) {
			$data = [
                'nama' => $this->input->post('nama'),
            ];
            $this->Model->updateData($type."_usaha", $this->input->post('id'), $data);
            redirect(base_url("/admin/usaha/$type"));
		} else {
			redirect(base_url("/admin/usaha/$type"));
		}
	}

	public function delete($type, $id) {
		$this->Model->deleteData($type.'_usaha', ['id' => $id]);
		redirect(base_url("/admin/usaha/$type"));
	}

}
