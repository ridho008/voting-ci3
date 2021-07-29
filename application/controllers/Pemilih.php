<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilih extends CI_Controller {
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
			'title' => 'Pemilih',
			'pemilih' => $this->db->get('pemilih')->result(),
		];
		$this->load->view('partials/navbar', $data);
		$this->load->view('admin/pemilih/index', $data);
		$this->load->view('partials/sidebar', $data);
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Data Pemilih',
		];

		$this->form_validation->set_rules('nama_pemilih', 'Nama Pemilih', 'required');
		$this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[pemilih.username]|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/pemilih/create', $data);
		} else {
			$this->store();
		}
		$this->load->view('partials/navbar', $data);
		$this->load->view('admin/pemilih/create', $data);
		$this->load->view('partials/sidebar', $data);
	}

	public function store()
	{
		$data = [
			'nama_pemilih' => $this->input->post('nama_pemilih'),
			'jenkel' => $this->input->post('jenkel'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		];

		$this->db->insert('pemilih', $data);
   	$this->session->set_flashdata('success', '<div class="alert alert-success">Data Pemilih Berhasil Ditambahkan.</div>');
		redirect('admin/pemilih');
	}

	public function delete($id)
	{
		$this->db->delete('pemilih', ['id_pemilih' => $id]);
   	$this->session->set_flashdata('success', '<div class="alert alert-success">Data Pemilih Berhasil Dihapus.</div>');
		redirect('admin/pemilih');
	}

	public function edit($id)
	{
		$pemilih = $this->db->get_where('pemilih' , ['id_pemilih' => $id])->row();
		$data = [
			'title' => 'Edit Data Pemilih - ' . $pemilih->nama_pemilih,
			'pemilih' => $pemilih
		];

		// cek username
		if($pemilih->username == $this->input->post('username')) {
			$rules = 'required|min_length[5]|max_length[12]';
		} else {
			$rules = 'required|min_length[5]|max_length[12]|is_unique[pemilih.username]';
		}

		$this->form_validation->set_rules('nama_pemilih', 'Nama Pemilih', 'required');
		$this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('username', 'Username', $rules);
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/pemilih/edit', $data);
		} else {
			$this->update($id);
		}

		$this->load->view('partials/navbar', $data);
		$this->load->view('admin/pemilih/edit', $data);
		$this->load->view('partials/sidebar', $data);
	}

	public function update($id)
	{
		$data = [
			'nama_pemilih' => $this->input->post('nama_pemilih'),
			'jenkel' => $this->input->post('jenkel'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		];

		$this->db->where('id_pemilih', $id);
		$this->db->update('pemilih', $data);
   	$this->session->set_flashdata('success', '<div class="alert alert-success">Data Pemilih Berhasil Diedit.</div>');
		redirect('admin/pemilih');
	}
}
