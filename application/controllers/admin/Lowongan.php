<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan extends CI_Controller {

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
			'title'			=> 'Lowongan',
			'breadcrumb'	=> [
				'Dashboard' => "/admin",
				'Lowongan'	=> null
			]
		];
		$this->data['data']		= $this->Model->getDataLowongan();
		$this->data['subview']	= 'dashboard/lowongan/index';
		$this->load->view('dashboard/main', $this->data);
	}

	public function add() {
		$this->data['meta'] = [
			'title'			=> 'Add Lowongan',
			'breadcrumb'	=> [
				'Dashboard' 	=> "/admin",
				'Lowongan'		=> "/admin/lowongan",
				'Add Lowongan'	=> null
			]
		];
		$this->data['mitra']		= $this->Model->getData('mitra', 'id', 'desc');
		$this->data['keahlian']		= $this->Model->getData('keahlian', 'id', 'desc');
		$this->data['subview']		= 'dashboard/lowongan/add';
		$this->load->view('dashboard/main', $this->data);
	}

	public function edit($id) {
		$data = $this->Model->getDataLowongan($id)[0];
		$this->data['meta'] = [
			'title'			=> 'Edit Lowongan '.$data->nama_perusahaan,
			'breadcrumb'	=> [
				'Dashboard' 			    => "/admin",
				'Lowongan'				    => "/admin/lowongan",
				'Edit Lowongan '.$data->nama_perusahaan	=> null
			]
		];
		
		$lowonganKeahlian	= $this->Model->getDataWhere('lowongan_keahlian', ['lowongan_id' => $id], 'result');

		$keahlian = [];

		foreach ($lowonganKeahlian as $value) {
			array_push($keahlian, $value->keahlian_id);
		}
		
		$this->data['data']				= $data;
		$this->data['mitra']			= $this->Model->getData('mitra', 'id', 'desc');
		$this->data['keahlian']			= $this->Model->getData('keahlian', 'id', 'desc');
		$this->data['lowonganKeahlian']	= $keahlian;
		$this->data['subview']			= 'dashboard/lowongan/edit';
		$this->load->view('dashboard/main', $this->data);
	}

	public function save() {
        $data = [
            'mitra_id'							=> $this->input->post('mitra_id'),
            'deskripsi_pekerjaan'				=> $this->input->post('deskripsi_lowongan'),
            'deskripsi_kualifikasi_pekerjaan'	=> $this->input->post('deskripsi_kualifikasi_lowongan'),
            'tanggal_akhir' 					=> $this->input->post('tanggal_akhir'),
            'email' 							=> $this->input->post('email'),
        ];
        $lastId = $this->Model->inserdata('lowongan', $data);

		foreach ($this->input->post('kategori_lowongan') as $value) {
			$dataKeahlian = [
				'keahlian_id' => $value,
				'lowongan_id' => $lastId,
			];
			$this->Model->inserdata('lowongan_keahlian', $dataKeahlian);
		}
        redirect(base_url('/admin/lowongan'));
	}

	public function update() {
		if ($this->input->post('id')) {
			$data = [
				'mitra_id'							=> $this->input->post('mitra_id'),
				'deskripsi_pekerjaan'				=> $this->input->post('deskripsi_lowongan'),
				'deskripsi_kualifikasi_pekerjaan'	=> $this->input->post('deskripsi_kualifikasi_lowongan'),
				'tanggal_akhir' 					=> $this->input->post('tanggal_akhir'),
				'email' 							=> $this->input->post('email'),
			];
            $this->Model->updateData('lowongan', $this->input->post('id'), $data);
		
			$lowonganKeahlian = $this->Model->getDataWhere('lowongan_keahlian', ['lowongan_id' => $this->input->post('id')], 'result');
	
			$keahlian = [];
	
			foreach ($lowonganKeahlian as $value) {
				array_push($keahlian, $value->keahlian_id);
			}

			foreach ($keahlian as $value) {
				if (!in_array($value, $this->input->post('kategori_lowongan'))) {
					$this->Model->deleteData('lowongan_keahlian', ['keahlian_id' => $value, 'lowongan_id' => $this->input->post('id')]);
				}
			}
			
			foreach ($this->input->post('kategori_lowongan') as $value) {
				if (!in_array($value, $keahlian)) {
					$dataKeahlian = [
						'keahlian_id' => $value,
						'lowongan_id' => $this->input->post('id'),
					];
					$this->Model->inserdata('lowongan_keahlian', $dataKeahlian);
				}
			}
			
            redirect(base_url('/admin/lowongan'));
		} else {
			redirect(base_url('/admin/lowongan'));
		}
	}

	public function delete($id) {
		$this->Model->deleteData('lowongan_keahlian', ['lowongan_id' => $id]);
		$this->Model->deleteData('lowongan', ['id' => $id]);
		redirect(base_url('/admin/lowongan'));
	}

}
