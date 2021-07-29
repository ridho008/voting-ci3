<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
		// $this->cekLogin = new AuthModel();
		$this->Auth_model->cekLogin($this->session->userdata('username'));
	}

	public function index()
	{
		// var_dump($this->session->userdata());
		$petugas = $this->db->get('petugas')->num_rows();
		$kandidat = $this->db->get('kandidat')->num_rows();
		$pemilih = $this->db->get('pemilih')->num_rows();
		$suaraMasuk = $this->db->get('pilih')->num_rows();
		$voting = $this->db->get('kandidat')->result();
		$data = [
			'title' => 'Dashboard',
			'petugas' => $petugas,
			'kandidat' => $kandidat,
			'pemilih' => $pemilih,
			'suaraMasuk' => $suaraMasuk,
			'voting' => $voting,
		];
		$this->load->view('partials/navbar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('partials/sidebar', $data);
	}
}
