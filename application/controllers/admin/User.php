<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
			'title'			=> 'User',
			'breadcrumb'	=> [
				'Dashboard' => "/admin",
				'User'		=> null
			]
		];
		$this->data['data'] = $this->Model->getData('users', 'id', 'desc');
		$this->data['subview'] = 'dashboard/user/index';
		$this->load->view('dashboard/main', $this->data);
	}

	public function add() {
		$this->data['meta'] = [
			'title'			=> 'Add User',
			'breadcrumb'	=> [
				'Dashboard' => "/admin",
				'User'		=> "/admin/user",
				'Add User'	=> null
			]
		];

		$this->data['subview'] = 'dashboard/user/add';
		$this->load->view('dashboard/main', $this->data);
	}

	public function edit($id) {
		$data = $this->Model->getDataWhere('users', ['id' => $id]);
		$this->data['meta'] = [
			'title'			=> 'Edit User '.$data->name,
			'breadcrumb'	=> [
				'Dashboard' 			=> "/",
				'User'					=> "/admin/user",
				'Edit User'.$data->name	=> null
			]
		];

		$this->data['data']		= $data;
		$this->data['subview']	= 'dashboard/user/edit';
		$this->load->view('dashboard/main', $this->data);
	}

	public function save() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', ['is_unique' => 'Email sudah Terdaftar.']);

		if ($this->form_validation->run() === FALSE) {
			$this->data['meta'] = [
				'title'			=> 'Add User',
				'breadcrumb'	=> [
					'Dashboard' => "/admin",
					'User'		=> "/admin/user",
					'Add User'	=> null
				]
			];
			$this->data['subview'] = 'dashboard/user/add';
			$this->load->view('dashboard/main', $this->data);
		} else {
			$data = [
				'active'		=> ($this->input->post('active') == 'on' ? 1 : 0 ),
				'password'		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'name'		    => $this->input->post('nama'),
				'email' 		=> $this->input->post('email'),
				'role' 		    => $this->input->post('role'),
			];
			$this->Model->inserdata('users', $data);
			redirect(base_url('/admin/user'));
		}
		
	}

	public function update() {
		if ($this->input->post('id')) {
			$this->load->library('form_validation');

			$data = $this->Model->getDataWhere('users', ['id' => $this->input->post('id')]);

			if ($this->input->post('email') != $data->email) {
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', ['is_unique' => 'Email sudah Terdaftar.']);
			}
			
			$this->form_validation->set_rules('id', 'id', 'required');

			if ($this->form_validation->run() === FALSE) {
				$this->data['meta'] = [
					'title'			=> 'Edit User '.$data->name,
					'breadcrumb'	=> [
						'Dashboard' 			=> "/",
						'User'					=> "/admin/user",
						'Edit User'.$data->name	=> null
					]
				];
				$this->data['data']		= $data;
				$this->data['subview']	= 'dashboard/user/edit';
				$this->load->view('dashboard/main', $this->data);
			} else {
				$dataForm = [
					'active'		=> ($this->input->post('active') == 'on' ? 1 : 0 ),
                    'name'		    => $this->input->post('nama'),
                    'email' 		=> $this->input->post('email'),
                    'role' 		    => $this->input->post('role'),
				];
				if ($this->input->post('password')) {
					$dataForm['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				}
				$this->Model->updateData('users', $this->input->post('id'), $dataForm);
				redirect(base_url('/admin/user'));
			}
		} else {
			redirect(base_url('/admin/user'));
		}
	}

	public function delete($id) {
		$this->Model->deleteData('users', ['id' => $id]);
		redirect(base_url('/admin/user'));
	}

}
