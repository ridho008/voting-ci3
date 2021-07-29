<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->Auth_model->cekLogin($this->session->userdata('username'));
	}

	public function index()
	{
		$data = [
			'title' => 'Petugas',
			'petugas' => $this->db->get('petugas')->result(),
		];
		$this->load->view('partials/navbar', $data);
		$this->load->view('admin/petugas/index', $data);
		$this->load->view('partials/sidebar', $data);
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Data Petugas',
		];

		$this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[petugas.username]|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/petugas/create', $data);
		} else {
			$this->store();
		}
		$this->load->view('partials/navbar', $data);
		$this->load->view('admin/petugas/create', $data);
		$this->load->view('partials/sidebar', $data);
	}

	public function store()
	{
		$data = [
			'nama_petugas' => $this->input->post('nama_petugas'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		];

		$this->db->insert('petugas', $data);
   	$this->session->set_flashdata('success', '<div class="alert alert-success">Data Petugas Berhasil Ditambahkan.</div>');
		redirect('admin/petugas');
	}

	public function delete($id)
	{
		$this->db->delete('petugas', ['id_petugas' => $id]);
   	$this->session->set_flashdata('success', '<div class="alert alert-success">Data Petugas Berhasil Dihapus.</div>');
		redirect('admin/petugas');
	}

	public function edit($id)
	{
		$petugas = $this->db->get_where('petugas' , ['id_petugas' => $id])->row();
		$data = [
			'title' => 'Edit Data Petugas - ' . $petugas->nama_petugas,
			'petugas' => $petugas
		];

		// cek username
		if($petugas->username == $this->input->post('username')) {
			$rules = 'required|min_length[5]|max_length[12]';
		} else {
			$rules = 'required|min_length[5]|max_length[12]|is_unique[petugas.username]';
		}

		$this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required');
		$this->form_validation->set_rules('username', 'Username', $rules);
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/petugas/edit', $data);
		} else {
			$this->update($id);
		}

		$this->load->view('partials/navbar', $data);
		$this->load->view('admin/petugas/edit', $data);
		$this->load->view('partials/sidebar', $data);
	}

	public function update($id)
	{
		$data = [
			'nama_petugas' => $this->input->post('nama_petugas'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		];

		$this->db->where('id_petugas', $id);
		$this->db->update('petugas', $data);
   	$this->session->set_flashdata('success', '<div class="alert alert-success">Data Petugas Berhasil Diedit.</div>');
		redirect('admin/petugas');
	}

	public function laporan()
	{
		$data = [
			'title' => 'Laporan Petugas',
			'petugas' => $this->db->get('petugas')->result(),
		];
		$this->load->view('partials/navbar', $data);
		$this->load->view('admin/petugas/laporan', $data);
		$this->load->view('partials/sidebar', $data);
	}

	public function cetak()
	{
		$data = [
			'petugas' => $this->db->get('petugas')->result(),
		];
		$this->load->view('admin/petugas/cetak', $data);
	}
}
