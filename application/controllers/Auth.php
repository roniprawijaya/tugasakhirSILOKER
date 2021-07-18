<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model');		
	}
	
	public function index() {
		if ($this->session->userdata('logIn')) {
			redirect(base_url('/admin'));
		}
		$this->load->view('dashboard/login');
	}

	public function validate() {
		$data = $this->Model->getDataWhere('users', ['email' => $this->input->post('email'), 'active' => 1]);

		if ($data) {
            if (password_verify($this->input->post('password'), $data->password)) {
				$data = [
					'username'	=> $data->name,
					'email'		=> $data->email,
					'id'		=> $data->id,
                    'role'      => $data->role,
					'logIn' 	=> true
				];
				$this->session->set_userdata($data);
				redirect(base_url('/admin'));
			} else {
				$this->session->set_flashdata('error', 'Password tidak cocok !!');
				$this->session->set_flashdata('email', $this->input->post('email'));
            	redirect(base_url('/auth'));
			}
		} else {
			$this->session->set_flashdata('error', 'Email tidak terdaftar !!');
            redirect(base_url('/auth'));
		}
	}
	
	public function signup() {
		if ($this->session->userdata('logIn')) {
			redirect(base_url('/admin'));
		}
		$this->load->view('dashboard/register');
	}

    public function register()
    {
        $this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', ['is_unique' => 'Email sudah Terdaftar.']);

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('dashboard/register');
		} else {
			$data = [
				'password'		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'name'		    => $this->input->post('nama'),
				'email' 		=> $this->input->post('email'),
				'role' 			=> 'user',
			];
			$this->Model->inserdata('users', $data);
            $this->session->set_flashdata('success', 'Registrasi berhasil silahkan login.');
			redirect(base_url('/auth'));
		}
    }

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url('/auth'));
	}
}
