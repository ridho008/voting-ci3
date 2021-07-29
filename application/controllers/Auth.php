<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->cekHalLogin();
		$this->load->view('auth/login');
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required',
               array('required' => 'You must provide a %s.')
      );
		if ($this->form_validation->run() == FALSE) {
		   $this->load->view('auth/login');
      } else {
         $username = $this->input->post('username');
         $password = md5($this->input->post('password'));

         $petugas = $this->db->get_where('petugas', ['username' => $username, 'password' => $password])->row_array();
         $pemilih = $this->db->get_where('pemilih', ['username' => $username, 'password' => $password])->row_array();
         if($petugas != null) {
         	$data = [
					'id_petugas' => $petugas['id_petugas'],
					'username' => $petugas['username'],
					'nama_petugas' => $petugas['nama_petugas'],
				];
				$this->session->set_userdata($data);
				redirect('admin/dashboard');
         } else if($pemilih != null) {
         	$data = [
					'id_pemilih' => $pemilih['id_pemilih'],
					'username' => $pemilih['username'],
					'nama_pemilih' => $pemilih['nama_pemilih'],
				];
				$this->session->set_userdata($data);
				redirect('utama');
         } else {
         	$this->session->set_flashdata('danger', '<div class="alert-danger">Username/Password Salah!.</div>');
				redirect('masuk');
         }
      }
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('success', 'Berhasil Logout.');
		redirect('masuk');
	}

	public function cekHalLogin()
	{
		if($this->session->userdata('username')) {
			redirect('admin/dashboard');
		}
	}
}
