<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

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
			'title'			=> 'Berita',
			'breadcrumb'	=> [
				'Dashboard' => "/admin",
				'Berita'	=> null
			]
		];
		$this->data['data'] = $this->Model->getData('berita', 'id', 'desc');
		$this->data['subview'] = 'dashboard/berita/index';
		$this->load->view('dashboard/main', $this->data);
	}

	public function add() {
		$this->data['meta'] = [
			'title'			=> 'Add Berita',
			'breadcrumb'	=> [
				'Dashboard'     => "/admin",
				'Berita'	    => "/admin/berita",
				'Add Berita'  	=> null
			]
		];

		$this->data['subview'] = 'dashboard/berita/add';
		$this->load->view('dashboard/main', $this->data);
	}

	public function edit($id) {
		$data = $this->Model->getDataWhere('berita', ['id' => $id]);
		$this->data['meta'] = [
			'title'			=> 'Edit Berita '.$data->judul,
			'breadcrumb'	=> [
				'Dashboard' 			    => "/admin",
				'Berita'				    => "/admin/berita",
				'Edit Berita'.$data->judul	=> null
			]
		];

		$this->data['data']		= $data;
		$this->data['subview']	= 'dashboard/berita/edit';
		$this->load->view('dashboard/main', $this->data);
	}

	public function save() {
		$foto = $this->uploadFoto();
        $data = [
            'judul'	=> $this->input->post('judul'),
            'isi' 	=> $this->input->post('isi'),
			'foto' 	=> "uploads/berita/$foto"
        ];
        $this->Model->inserdata('berita', $data);
        redirect(base_url('/admin/berita'));
	}

	public function update() {
		if ($this->input->post('id')) {
			$data = $this->Model->getDataWhere('berita', ['id' => $this->input->post('id')]);
			if ($_FILES['foto']['name'] != '') {
				$foto = $this->uploadFoto();
				
				if (file_exists($data->foto)) {
					unlink($data->foto);
				}
				
				$data = [
					'judul'	=> $this->input->post('judul'),
					'isi' 	=> $this->input->post('isi'),
					'foto' 	=> "uploads/berita/$foto"
				];
			} else {
				$data = [
					'judul'	=> $this->input->post('judul'),
					'isi' 	=> $this->input->post('isi')
				];
			}
            $this->Model->updateData('berita', $this->input->post('id'), $data);
            redirect(base_url('/admin/berita'));
		} else {
			redirect(base_url('/admin/berita'));
		}
	}

	public function delete($id) {
		$this->Model->deleteData('berita', ['id' => $id]);
		redirect(base_url('/admin/berita'));
	}

	public function uploadFoto() {
		$config['upload_path']      = './uploads/berita';
		$config['allowed_types']    = 'gif|jpg|jpeg|png';
		$config['max_size']    		= '20000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('foto')) {
			$error = array('error' => $this->upload->display_errors());
			$error2 = $error["error"];
			echo '<script>alert("'.$error2.'");window.history.back();</script>';
			exit;
		} else {
			$foto		= $this->upload->data();
			$fotoname	= $foto["file_name"];
			return $fotoname;
		}
	}

}
