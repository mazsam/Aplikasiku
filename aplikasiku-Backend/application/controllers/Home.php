<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->model('ModelDataPelanggan');
        $data = $this->ModelDataPelanggan->getPelanggan('data_pelanggan');
        $data = array('data' => $data);
        $this->load->view('home', $data);
	}

	public function create(){
		$this->load->view('add');
	}

	public function edit(){
		$this->load->model('ModelDataPelanggan');
		$id = $this->input->get('id');

		$where = array('id' => $id);
		$data['data'] = $this->ModelDataPelanggan->getPelangganEdit('data_pelanggan',$where)->result();
		$this->load->view('edit',$data);
	}

	public function hapus(){
		$this->load->model('ModelDataPelanggan');
		$id = $this->input->get('id');
        $where = array('id' => $id);
		$this->ModelDataPelanggan->deletePelanggan('data_pelanggan',$where);
		redirect(base_url(),'refresh');
	}

	public function insert(){
		$this->load->model('ModelDataPelanggan');
		$data = array(
				'code' => $this->input->post('kode'),
				'nama_lengkap' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'no_telp' => $this->input->post('phone'),
				'lat' => $this->input->post('latitude'),
				'lng' => $this->input->post('longitude')
			 );
		$data = $this->ModelDataPelanggan->insertPelanggan('data_pelanggan', $data);
		redirect(base_url(),'refresh');
	}

	public function update(){
		$this->load->model('ModelDataPelanggan');
		$id = $this->input->post('id');
		$data = array(
				'code' => $this->input->post('kode'),
				'nama_lengkap' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'no_telp' => $this->input->post('phone'),
				'lat' => $this->input->post('latitude'),
				'lng' => $this->input->post('longitude')
			 );
		
		$where = array(
			'id' => $id
		);

		$data = $this->ModelDataPelanggan->updatePelanggan('data_pelanggan', $data, $where);
		redirect(base_url(),'refresh');
	}
}
