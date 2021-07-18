<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loker extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Model');
	}

	public function index()
	{
		$this->data['meta'] = [
			'title' => 'Isi Loker'
		];
		$this->data['data']		= $this->Model->getDataWhere("mitra", ['id_user' => $this->session->userdata('id')]);
		$this->data['keahlian']	= $this->Model->getData('keahlian', 'id', 'desc');
		$this->data['subview']	= 'frontend/page/isi_loker';
		$this->load->view('frontend/main', $this->data);
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
        redirect(base_url('/lowongan'));
	}

	public function detail($id)
	{
		$this->data['meta'] = [
			'title' => 'Lowongan Baru'
		];

		$this->data['data']		= $this->Model->getDataLowongan($id);
		$this->data['subview']	= 'frontend/page/detail_lowongan';
		$this->load->view('frontend/main', $this->data);
	}
}
